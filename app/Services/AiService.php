<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class AiService
{
    private const PROVIDER_ORDER = ['anthropic', 'openai', 'gemini', 'mistral'];

    public function generateNames(array $config, array $input): array
    {
        return $this->runAcrossProviders($config, function (string $provider, string $apiKey) use ($input): array {
            $result = match ($provider) {
                'anthropic' => $this->generateWithAnthropic($apiKey, $this->buildBusinessNamePrompt($input)),
                'openai' => $this->generateWithOpenAi($apiKey, $this->buildBusinessNamePrompt($input)),
                'gemini' => $this->generateWithGemini($apiKey, $this->buildBusinessNamePrompt($input)),
                'mistral' => $this->generateWithMistral($apiKey, $this->buildBusinessNamePrompt($input)),
                default => throw new RuntimeException('Unsupported AI provider.'),
            };

            if (count($result) !== 12) {
                throw new RuntimeException('Returned an invalid business name set.');
            }

            return $result;
        });
    }

    public function generateVariations(array $config, string $name, string $tagline): array
    {
        return $this->runAcrossProviders($config, function (string $provider, string $apiKey) use ($name, $tagline): array {
            $prompt = $this->buildBusinessNameVariationPrompt($name, $tagline);

            $result = match ($provider) {
                'anthropic' => $this->generateWithAnthropic($apiKey, $prompt),
                'openai' => $this->generateWithOpenAi($apiKey, $prompt),
                'gemini' => $this->generateWithGemini($apiKey, $prompt),
                'mistral' => $this->generateWithMistral($apiKey, $prompt),
                default => throw new RuntimeException('Unsupported AI provider.'),
            };

            if (count($result) !== 5) {
                throw new RuntimeException('Returned an invalid variation set.');
            }

            return $result;
        });
    }

    public function generateSeoRecommendations(array $config, string $prompt): array
    {
        return $this->runAcrossProviders($config, function (string $provider, string $apiKey) use ($prompt): array {
            $result = match ($provider) {
                'anthropic' => $this->generateWithAnthropic($apiKey, $prompt),
                'openai' => $this->generateWithOpenAi($apiKey, $prompt),
                'gemini' => $this->generateWithGemini($apiKey, $prompt),
                'mistral' => $this->generateWithMistral($apiKey, $prompt),
                default => throw new RuntimeException('Unsupported AI provider.'),
            };

            if ($result === [] || count($result) > 6) {
                throw new RuntimeException('Returned an invalid SEO recommendation set.');
            }

            return $result;
        });
    }

    private function runAcrossProviders(array $config, callable $runner): array
    {
        $order = $this->providerOrder((string) ($config['preferred'] ?? 'auto'));
        $errors = [];

        foreach ($order as $provider) {
            $apiKey = trim((string) ($config[$provider] ?? ''));
            if ($apiKey === '') {
                continue;
            }

            try {
                return [
                    'provider' => $provider,
                    'data' => $runner($provider, $apiKey),
                ];
            } catch (\Throwable $exception) {
                $errors[] = strtoupper($provider) . ': ' . $exception->getMessage();
            }
        }

        if ($errors === []) {
            throw new RuntimeException('No AI provider is configured for the business name generator.');
        }

        throw new RuntimeException('All configured AI providers failed. ' . implode(' | ', $errors));
    }

    private function providerOrder(string $preferred): array
    {
        if ($preferred === 'auto' || ! in_array($preferred, self::PROVIDER_ORDER, true)) {
            return self::PROVIDER_ORDER;
        }

        return array_values(array_unique([$preferred, ...self::PROVIDER_ORDER]));
    }

    private function generateWithAnthropic(string $apiKey, string $prompt): array
    {
        $response = Http::withHeaders([
            'x-api-key' => $apiKey,
            'anthropic-version' => '2023-06-01',
            'content-type' => 'application/json',
        ])->timeout(65)->post('https://api.anthropic.com/v1/messages', [
            'model' => 'claude-haiku-4-5-20251001',
            'max_tokens' => 2200,
            'system' => 'You are a world-class brand naming expert. Return only valid JSON arrays that match the requested schema exactly.',
            'messages' => [['role' => 'user', 'content' => $prompt]],
        ]);

        if (! $response->successful()) {
            throw new RuntimeException('Anthropic did not return a successful response.');
        }

        return $this->decodeJsonArray($response->json('content.0.text', ''));
    }

    private function generateWithOpenAi(string $apiKey, string $prompt): array
    {
        $response = Http::withToken($apiKey)
            ->acceptJson()
            ->timeout(65)
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-4o-mini',
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a world-class brand naming expert. Return only JSON matching the requested schema.'],
                    ['role' => 'user', 'content' => $prompt . "\n\nWrap the final array in an object with a single key named items."],
                ],
            ]);

        if (! $response->successful()) {
            throw new RuntimeException('OpenAI did not return a successful response.');
        }

        $content = (string) $response->json('choices.0.message.content', '');
        $decoded = json_decode($content, true);

        if (is_array($decoded['items'] ?? null)) {
            return $decoded['items'];
        }

        return $this->decodeJsonArray($content);
    }

    private function generateWithGemini(string $apiKey, string $prompt): array
    {
        $response = Http::timeout(65)
            ->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=' . urlencode($apiKey), [
                'systemInstruction' => [
                    'parts' => [[
                        'text' => 'You are a world-class brand naming expert. Return only JSON matching the requested schema.',
                    ]],
                ],
                'contents' => [[
                    'parts' => [[
                        'text' => $prompt . "\n\nWrap the final array in an object with a single key named items.",
                    ]],
                ]],
                'generationConfig' => [
                    'responseMimeType' => 'application/json',
                ],
            ]);

        if (! $response->successful()) {
            throw new RuntimeException('Gemini did not return a successful response.');
        }

        $parts = $response->json('candidates.0.content.parts', []);
        $text = collect(is_array($parts) ? $parts : [])->pluck('text')->implode('');
        $decoded = json_decode($text, true);

        if (is_array($decoded['items'] ?? null)) {
            return $decoded['items'];
        }

        return $this->decodeJsonArray($text);
    }

    private function generateWithMistral(string $apiKey, string $prompt): array
    {
        $response = Http::withToken($apiKey)
            ->acceptJson()
            ->timeout(65)
            ->post('https://api.mistral.ai/v1/chat/completions', [
                'model' => 'mistral-small-latest',
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a world-class brand naming expert. Return only JSON matching the requested schema.'],
                    ['role' => 'user', 'content' => $prompt . "\n\nWrap the final array in an object with a single key named items."],
                ],
            ]);

        if (! $response->successful()) {
            throw new RuntimeException('Mistral did not return a successful response.');
        }

        $content = (string) $response->json('choices.0.message.content', '');
        $decoded = json_decode($content, true);

        if (is_array($decoded['items'] ?? null)) {
            return $decoded['items'];
        }

        return $this->decodeJsonArray($content);
    }

    private function buildBusinessNamePrompt(array $input): string
    {
        $lengthMap = [
            'single' => 'single-word names only (one word)',
            'compound' => 'compound or portmanteau names (merged words)',
            'phrase' => 'short two-to-three-word phrases',
            'any' => 'a mix of single words, compound words, and short phrases',
        ];

        $description = trim((string) ($input['description'] ?? ''));
        $keywords = trim((string) ($input['keywords'] ?? ''));
        $avoid = trim((string) ($input['avoid'] ?? ''));
        $length = trim((string) ($input['length'] ?? 'any'));
        $market = trim((string) ($input['market'] ?? 'Nigeria'));
        $styles = collect($input['styles'] ?? [])->map(fn ($style) => trim((string) $style))->filter()->values()->all();
        $stylesText = $styles !== [] ? implode(', ', $styles) : 'any style';
        $lengthText = $lengthMap[$length] ?? $lengthMap['any'];

        return <<<PROMPT
Generate exactly 12 creative business names for the following:

Business description: {$description}
Keywords/inspiration: {$keywords}
Words to avoid: {$avoid}
Brand styles requested: {$stylesText}
Name length preference: {$lengthText}
Target market: {$market}

Requirements:
- Names must be memorable, distinctive, and brandable
- Names should feel authentic and appropriate for the {$market} market
- Each name must have a unique style/personality
- Avoid generic startup cliches unless used in a genuinely creative way
- Domain suggestion should be the lowercase name with no spaces

Return ONLY a valid JSON array of exactly 12 objects. No markdown, no backticks, no commentary before or after. Each object must have these exact keys:
- "name": string
- "tagline": string (5-9 words)
- "explanation": string (2-3 sentences)
- "style": string (one of: Modern, Classic, Creative, Playful, Bold, Technical, Elegant, Professional)
- "personality": array of exactly 3 adjective strings
- "domain": string (suggested domain, e.g. "nexforge.com")
PROMPT;
    }

    private function buildBusinessNameVariationPrompt(string $name, string $tagline): string
    {
        return <<<PROMPT
Generate 5 creative variations and alternatives for the business name "{$name}".
Related tagline/context: "{$tagline}"

Return ONLY a valid JSON array of exactly 5 objects with these exact keys:
- "name": string
- "tagline": string (5-8 words)

No markdown, no commentary, no extra keys.
PROMPT;
    }

    private function decodeJsonArray(string $text): array
    {
        $clean = trim(str_replace(['```json', '```'], '', $text));
        $decoded = json_decode($clean, true);

        if (is_array($decoded)) {
            return array_is_list($decoded) ? $decoded : (is_array($decoded['items'] ?? null) ? $decoded['items'] : []);
        }

        if (preg_match('/\[[\s\S]*\]/', $clean, $matches) === 1) {
            $decoded = json_decode($matches[0], true);

            return is_array($decoded) ? $decoded : [];
        }

        return [];
    }
}
