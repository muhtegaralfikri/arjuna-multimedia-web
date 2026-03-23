<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';

    protected static ?string $navigationLabel = 'Kontak';

    protected static ?string $modelLabel = 'Informasi Kontak';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Kontak')
                    ->description('Informasi kontak akan ditampilkan di halaman Kontak')
                    ->schema([
                        Forms\Components\TextInput::make('whatsapp_number')
                            ->label('Nomor WhatsApp')
                            ->placeholder('6281234567890')
                            ->helperText('Format: 628xxxxxxxx (tanpa + atau 0 di depan)')
                            ->required()
                            ->tel()
                            ->maxLength(50),

                        Forms\Components\TextInput::make('phone_number')
                            ->label('Nomor Telepon')
                            ->placeholder('02112345678')
                            ->required()
                            ->tel()
                            ->maxLength(50),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('address')
                            ->label('Alamat')
                            ->required()
                            ->rows(3),

                        Forms\Components\TextInput::make('google_maps_link')
                            ->label('Link Google Maps')
                            ->url()
                            ->maxLength(500),

                        Forms\Components\Textarea::make('google_maps_embed')
                            ->label('Google Maps Embed (HTML)')
                            ->helperText('Copy dari Google Maps > Share > Embed a map')
                            ->rows(3),

                        Forms\Components\Textarea::make('operating_hours')
                            ->label('Jam Operasional')
                            ->placeholder('Senin - Minggu: 08:00 - 20:00')
                            ->rows(2),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Social Media')
                    ->schema([
                        Forms\Components\TextInput::make('instagram_url')
                            ->label('Instagram')
                            ->url()
                            ->prefix('instagram.com/'),

                        Forms\Components\TextInput::make('facebook_url')
                            ->label('Facebook')
                            ->url()
                            ->prefix('facebook.com/'),

                        Forms\Components\TextInput::make('tiktok_url')
                            ->label('TikTok')
                            ->url()
                            ->prefix('tiktok.com/@'),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('whatsapp_number')
                    ->label('WhatsApp')
                    ->copyable(),

                Tables\Columns\TextColumn::make('phone_number')
                    ->label('Telefon')
                    ->copyable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->copyable(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->hidden(fn () => Contact::count() >= 1), // Hanya boleh 1 record
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->paginated(false);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageContact::route('/'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
