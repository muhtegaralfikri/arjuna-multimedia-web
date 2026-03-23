<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $navigationLabel = 'Halaman';

    protected static ?string $modelLabel = 'Halaman';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Konten Halaman')
                    ->schema([
                        Forms\Components\Select::make('slug')
                            ->label('Halaman')
                            ->options([
                                'home' => 'Beranda',
                                'about' => 'Tentang Kami',
                                'package' => 'Paket Internet',
                                'area' => 'Area Layanan',
                                'contact' => 'Kontak',
                                'faq' => 'FAQ',
                            ])
                            ->required()
                            ->disabled(fn (string $context): bool => $context === 'edit')
                            ->live(),

                        Forms\Components\TextInput::make('title')
                            ->label('Judul Halaman')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('hero_title')
                            ->label('Hero Title')
                            ->maxLength(255),

                        Forms\Components\Textarea::make('hero_subtitle')
                            ->label('Hero Subtitle')
                            ->rows(2),

                        Forms\Components\RichEditor::make('content')
                            ->label('Konten')
                            ->columnSpanFull()
                            ->fileAttachmentsDisk('public'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('SEO')
                    ->schema([
                        Forms\Components\TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->helperText('50-60 karakter')
                            ->maxLength(60),

                        Forms\Components\Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->helperText('150-160 karakter')
                            ->rows(2)
                            ->maxLength(160),

                        Forms\Components\FileUpload::make('og_image')
                            ->label('OG Image')
                            ->image()
                            ->directory('og-images')
                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg', 'image/webp'])
                            ->maxSize(2048),

                        Forms\Components\TextInput::make('canonical_url')
                            ->label('Canonical URL')
                            ->url()
                            ->maxLength(500),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Halaman')
                    ->searchable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'home' => 'Beranda',
                        'about' => 'Tentang Kami',
                        'package' => 'Paket Internet',
                        'area' => 'Area Layanan',
                        'contact' => 'Kontak',
                        'faq' => 'FAQ',
                    })
                    ->badge(),

                Tables\Columns\TextColumn::make('meta_title')
                    ->label('Meta Title')
                    ->limit(30)
                    ->toggleable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->paginated(false);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
