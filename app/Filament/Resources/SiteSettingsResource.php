<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingsResource\Pages;
use App\Models\SiteSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class SiteSettingsResource extends Resource
{
    protected static ?string $model = SiteSettings::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Pengaturan';

    protected static ?string $modelLabel = 'Pengaturan';

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Identitas Website')
                    ->schema([
                        Forms\Components\TextInput::make('site_name')
                            ->label('Nama Website')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('site_url')
                            ->label('URL Website')
                            ->url()
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Branding')
                    ->schema([
                        Forms\Components\FileUpload::make('logo_url')
                            ->label('Logo')
                            ->image()
                            ->directory('branding')
                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg', 'image/webp', 'image/svg+xml'])
                            ->maxSize(2048),

                        Forms\Components\FileUpload::make('favicon_url')
                            ->label('Favicon')
                            ->image()
                            ->directory('branding')
                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg', 'image/webp', 'image/x-icon'])
                            ->maxSize(512),

                        Forms\Components\ColorPicker::make('brand_color_primary')
                            ->label('Warna Utama')
                            ->required(),

                        Forms\Components\ColorPicker::make('brand_color_secondary')
                            ->label('Warna Sekunder')
                            ->required(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Analytics & Tracking')
                    ->schema([
                        Forms\Components\TextInput::make('google_analytics_id')
                            ->label('Google Analytics ID')
                            ->placeholder('G-XXXXXXXXXX')
                            ->maxLength(50),

                        Forms\Components\TextInput::make('gtm_id')
                            ->label('Google Tag Manager ID')
                            ->placeholder('GTM-XXXXXX')
                            ->maxLength(50),

                        Forms\Components\TextInput::make('google_business_profile_url')
                            ->label('Google Business Profile URL')
                            ->url()
                            ->maxLength(500),
                    ])
                    ->columns(3),

                Forms\Components\Section::make('Maintenance')
                    ->schema([
                        Forms\Components\Toggle::make('maintenance_mode')
                            ->label('Mode Maintenance')
                            ->helperText('Aktifkan untuk menampilkan halaman maintenance')
                            ->inline(false),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('site_name')
                    ->label('Nama Website'),

                Tables\Columns\ImageColumn::make('logo_url')
                    ->label('Logo')
                    ->circular()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\IconColumn::make('maintenance_mode')
                    ->label('Maintenance')
                    ->boolean(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->hidden(fn () => SiteSettings::count() >= 1), // Hanya boleh 1 record
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->paginated(false);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSiteSettings::route('/'),
            'edit' => Pages\EditSiteSettings::route('/{record}/edit'),
        ];
    }
}
