<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageResource\Pages;
use App\Models\Package;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $navigationIcon = 'heroicon-o-wifi';

    protected static ?string $navigationLabel = 'Paket Internet';

    protected static ?string $modelLabel = 'Paket';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Paket')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Paket')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $state, callable $set) => $set('slug', Str::slug($state))),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->readonly(),

                        Forms\Components\TextInput::make('speed')
                            ->label('Kecepatan')
                            ->placeholder('Contoh: 10 Mbps')
                            ->required()
                            ->maxLength(50),

                        Forms\Components\TextInput::make('speed_value')
                            ->label('Kecepatan (Angka)')
                            ->helperText('Untuk sorting')
                            ->numeric()
                            ->default(0)
                            ->required(),

                        Forms\Components\TextInput::make('price_monthly')
                            ->label('Harga per Bulan (Rp)')
                            ->numeric()
                            ->required()
                            ->prefix('Rp'),

                        Forms\Components\TextInput::make('installation_fee')
                            ->label('Biaya Pemasangan (Rp)')
                            ->numeric()
                            ->default(0)
                            ->prefix('Rp'),

                        Forms\Components\TextInput::make('quota')
                            ->label('Kuota')
                            ->placeholder('Contoh: Unlimited, 100 GB FUP')
                            ->maxLength(255),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(3),

                        Forms\Components\TagsInput::make('features')
                            ->label('Fitur')
                            ->placeholder('Masukkan fitur dan tekan Enter')
                            ->reorderable(),

                        Forms\Components\Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'home' => 'Rumah',
                                'business' => 'Bisnis',
                            ])
                            ->default('home')
                            ->required(),

                        Forms\Components\Toggle::make('is_popular')
                            ->label('Paket Popular')
                            ->default(false),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),

                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan Tampilan')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Paket')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('speed')
                    ->label('Kecepatan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('price_monthly')
                    ->label('Harga/Bulan')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'home' => 'Rumah',
                        'business' => 'Bisnis',
                    })
                    ->badge()
                    ->color(fn (string $state): string => match($state) {
                        'home' => 'info',
                        'business' => 'warning',
                    }),

                Tables\Columns\IconColumn::make('is_popular')
                    ->label('Populer')
                    ->boolean()
                    ->trueIcon('heroicon-o-star')
                    ->falseIcon('heroicon-o-star'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Kategori')
                    ->options([
                        'home' => 'Rumah',
                        'business' => 'Bisnis',
                    ]),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status')
                    ->placeholder('Semua')
                    ->trueLabel('Aktif')
                    ->falseLabel('Nonaktif'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('sort_order')
            ->defaultSort('sort_order');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'edit' => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}
