<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceAreaResource\Pages;
use App\Models\ServiceArea;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ServiceAreaResource extends Resource
{
    protected static ?string $model = ServiceArea::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationLabel = 'Area Layanan';

    protected static ?string $modelLabel = 'Area';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Area')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Area')
                            ->placeholder('Contoh: Desa Sukamaju')
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

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(2),

                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'available' => 'Tersedia',
                                'coming_soon' => 'Segera Hadir',
                                'paused' => 'Ditunda',
                            ])
                            ->default('available')
                            ->required()
                            ->live(),

                        Forms\Components\TextInput::make('coverage_detail')
                            ->label('Detail Cakupan')
                            ->placeholder('Contoh: RT 01-10')
                            ->maxLength(255),

                        Forms\Components\DatePicker::make('estimated_available')
                            ->label('Perkiraan Tersedia')
                            ->visible(fn (callable $get) => $get('status') === 'coming_soon'),

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
                    ->label('Nama Area')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(30)
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'available' => 'Tersedia',
                        'coming_soon' => 'Segera Hadir',
                        'paused' => 'Ditunda',
                    })
                    ->badge()
                    ->color(fn (string $state): string => match($state) {
                        'available' => 'success',
                        'coming_soon' => 'warning',
                        'paused' => 'danger',
                    }),

                Tables\Columns\TextColumn::make('coverage_detail')
                    ->label('Cakupan')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('estimated_available')
                    ->label('Perkiraan Tersedia')
                    ->date()
                    ->toggleable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'available' => 'Tersedia',
                        'coming_soon' => 'Segera Hadir',
                        'paused' => 'Ditunda',
                    ]),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServiceAreas::route('/'),
            'create' => Pages\CreateServiceArea::route('/create'),
            'edit' => Pages\EditServiceArea::route('/{record}/edit'),
        ];
    }
}
