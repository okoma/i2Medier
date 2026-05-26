<?php

namespace App\Filament\Admin\Resources\BlogPosts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\View;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(12)
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(1)
                            ->columnSpan(['default' => 12, 'xl' => 8])
                            ->schema([
                                Section::make('Write Post')
                                    ->description('A WordPress-style writing flow with your headline, permalink, summary, and main article body up front.')
                                    ->icon(Heroicon::OutlinedDocumentText)
                                    ->schema([
                                        TextInput::make('title')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->placeholder('Add title')
                                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state): void {
                                                $currentSlug = trim((string) $get('slug'));
                                                $oldSlug = Str::slug((string) $old);

                                                if (blank($currentSlug) || $currentSlug === $oldSlug) {
                                                    $set('slug', Str::slug((string) $state));
                                                }
                                            }),
                                        Placeholder::make('permalink_preview')
                                            ->label('Permalink')
                                            ->content(function (Get $get): string {
                                                $slug = trim((string) ($get('slug') ?: Str::slug((string) ($get('title') ?: 'blog-post'))));

                                                return url('/blog') . '/{category}/' . $slug;
                                            })
                                            ->helperText('The category is inserted in the final live URL automatically. Keep the slug short and descriptive.'),
                                        TextInput::make('slug')
                                            ->label('Permalink')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->unique(ignoreRecord: true)
                                            ->helperText('Auto-generated from the title, but fully editable. Keep it short, readable, and keyword-focused.'),
                                        Textarea::make('excerpt')
                                            ->label('Excerpt / Summary')
                                            ->rows(4)
                                            ->maxLength(500)
                                            ->helperText(fn (Get $get): string => str($get('excerpt') ?? '')->length() . '/500 characters. Aim for 140-200 for archive, social, and search previews.')
                                            ->live()
                                            ->columnSpanFull(),
                                        RichEditor::make('body')
                                            ->required()
                                            ->toolbarButtons([
                                                'attachFiles',
                                                'blockquote',
                                                'bold',
                                                'bulletList',
                                                'codeBlock',
                                                'h2',
                                                'h3',
                                                'italic',
                                                'link',
                                                'orderedList',
                                                'redo',
                                                'strike',
                                                'underline',
                                                'undo',
                                            ])
                                            ->helperText('Write naturally, use clear H2/H3 sections, and add internal links as you go.')
                                            ->columnSpanFull(),
                                    ]),
                                Section::make('SEO Metabox')
                                    ->description('Keep SEO directly under the editor, the way you would expect in WordPress.')
                                    ->icon(Heroicon::OutlinedMagnifyingGlassCircle)
                                    ->schema([
                                        Grid::make(1)
                                            ->schema([
                                                TextInput::make('seo_title')
                                                    ->label('SEO Title')
                                                    ->maxLength(255)
                                                    ->live()
                                                    ->helperText(fn (Get $get): string => str($get('seo_title') ?: ($get('title') ?? ''))->length() . '/60 recommended characters. Search engines usually cut titles after roughly 60.')
                                                    ->placeholder('Leave blank to fall back to the main post title.'),
                                                Textarea::make('seo_description')
                                                    ->label('Meta Description')
                                                    ->rows(4)
                                                    ->maxLength(500)
                                                    ->live()
                                                    ->helperText(fn (Get $get): string => str($get('seo_description') ?: ($get('excerpt') ?? ''))->length() . '/155 recommended characters. Aim for 120-155 with a clear promise.')
                                                    ->placeholder('Write a concise summary that earns the click from search results.'),
                                                TagsInput::make('seo_keywords')
                                                    ->label('Related Keywords')
                                                    ->separator(',')
                                                    ->splitKeys(['Tab', ','])
                                                    ->reorderable()
                                                    ->helperText('Add supporting variations and related phrases. Keep it focused, not stuffed.'),
                                                View::make('filament.admin.resources.blog-posts.seo-panel')
                                                    ->viewData(fn (Get $get): array => [
                                                        'title' => $get('title'),
                                                        'slug' => $get('slug'),
                                                        'excerpt' => $get('excerpt'),
                                                        'body' => $get('body'),
                                                        'seoTitle' => $get('seo_title'),
                                                        'seoDescription' => $get('seo_description'),
                                                        'focusKeyphrase' => $get('focus_keyphrase'),
                                                        'seoKeywords' => $get('seo_keywords'),
                                                    ]),
                                            ]),
                                    ]),
                                    ]),
                        Grid::make(1)
                            ->columnSpan(['default' => 12, 'xl' => 4])
                            ->schema([
                                Section::make('Publish')
                                    ->description('Treat this like the WordPress publish box.')
                                    ->icon(Heroicon::OutlinedRocketLaunch)
                                    ->schema([
                                        Select::make('status')
                                            ->options([
                                                'draft' => 'Draft',
                                                'published' => 'Published',
                                                'scheduled' => 'Scheduled',
                                                'archived' => 'Archived',
                                            ])
                                            ->default('draft')
                                            ->required(),
                                        DateTimePicker::make('published_at')
                                            ->helperText('Set a future date if this post should go live later.'),
                                        Toggle::make('is_featured')
                                            ->label('Feature this post')
                                            ->inline(false),
                                    ]),
                                Section::make('Taxonomy')
                                    ->icon(Heroicon::OutlinedQueueList)
                                    ->schema([
                                        Select::make('category_id')
                                            ->relationship('category', 'name')
                                            ->searchable()
                                            ->preload(),
                                    ]),
                                Section::make('SEO Focus')
                                    ->icon(Heroicon::OutlinedMagnifyingGlass)
                                    ->schema([
                                        TextInput::make('focus_keyphrase')
                                            ->label('Focus Keyphrase')
                                            ->maxLength(255)
                                            ->live()
                                            ->helperText('Use one primary search phrase you want this post to rank for. Keep it specific and natural.'),
                                    ]),
                                Section::make('Media & Metrics')
                                    ->icon(Heroicon::OutlinedPhoto)
                                    ->schema([
                                        TextInput::make('featured_image')
                                            ->url()
                                            ->maxLength(255)
                                            ->helperText('Paste the live image URL used for the card, hero, and social preview.'),
                                        TextInput::make('read_time')
                                            ->numeric()
                                            ->minValue(1)
                                            ->default(5),
                                        TextInput::make('view_count')
                                            ->numeric()
                                            ->default(0),
                                    ]),
                                Section::make('Editorial Checklist')
                                    ->icon(Heroicon::OutlinedClipboardDocumentCheck)
                                    ->schema([
                                        Placeholder::make('editorial_note')
                                            ->hiddenLabel()
                                            ->content('Before publishing, confirm the post has a strong opening paragraph, clear H2 sections, at least one internal link, one external citation where useful, and a clean meta description.'),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    private static function seoScoreLabel(Get $get): string
    {
        $score = self::seoScore($get);

        return match (true) {
            $score >= 80 => 'Strong',
            $score >= 55 => 'Okay',
            default => 'Needs work',
        };
    }

    private static function seoScore(Get $get): int
    {
        $title = trim((string) ($get('seo_title') ?: $get('title') ?: ''));
        $description = trim((string) ($get('seo_description') ?: $get('excerpt') ?: ''));
        $slug = trim((string) ($get('slug') ?: ''));
        $keywords = array_filter((array) ($get('seo_keywords') ?: []));
        $focusKeyphrase = trim((string) ($get('focus_keyphrase') ?: ($keywords[0] ?? '')));

        $score = 0;

        if (($titleLength = Str::length($title)) >= 30 && $titleLength <= 60) {
            $score += 25;
        } elseif ($titleLength > 0) {
            $score += 10;
        }

        if (($descriptionLength = Str::length($description)) >= 120 && $descriptionLength <= 155) {
            $score += 25;
        } elseif ($descriptionLength >= 70) {
            $score += 10;
        }

        if (filled($slug) && Str::length($slug) <= 75) {
            $score += 20;
        } elseif (filled($slug)) {
            $score += 10;
        }

        if (filled($focusKeyphrase)) {
            $score += 15;
        }

        if (filled($title) && filled($focusKeyphrase) && Str::contains(Str::lower($title), Str::lower($focusKeyphrase))) {
            $score += 15;
        }

        return min($score, 100);
    }
}
