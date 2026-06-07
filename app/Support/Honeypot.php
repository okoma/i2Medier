<?php

namespace App\Support;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class Honeypot
{
    public const FIELD_NAME = 'company_website';

    public const TIME_FIELD_NAME = 'form_started_at';

    public const MIN_SUBMIT_SECONDS = 3;

    public static function fieldName(): string
    {
        return self::FIELD_NAME;
    }

    public static function timeFieldName(): string
    {
        return self::TIME_FIELD_NAME;
    }

    public static function startedAt(): int
    {
        return now()->timestamp;
    }

    public static function ensureValid(Request $request): void
    {
        $trapValue = trim((string) $request->input(self::FIELD_NAME, ''));
        $startedAt = (int) $request->input(self::TIME_FIELD_NAME, 0);

        if ($trapValue !== '') {
            throw ValidationException::withMessages([
                'form' => 'Unable to submit the form right now.',
            ]);
        }

        if ($startedAt <= 0 || (now()->timestamp - $startedAt) < self::MIN_SUBMIT_SECONDS) {
            throw ValidationException::withMessages([
                'form' => 'Please wait a moment and try again.',
            ]);
        }
    }
}
