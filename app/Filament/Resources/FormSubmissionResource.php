<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormSubmissionResource\Pages;
use App\Models\FormSubmission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;

class FormSubmissionResource extends Resource
{
    protected static ?string $model = FormSubmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static ?string $navigationLabel = 'Form Masuk';

    protected static ?string $modelLabel = 'Submission';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detail Submission')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama')
                            ->disabled(),

                        Forms\Components\TextInput::make('whatsapp')
                            ->label('WhatsApp')
                            ->disabled(),

                        Forms\Components\TextInput::make('package_interest')
                            ->label('Paket Diminati')
                            ->disabled(),

                        Forms\Components\Textarea::make('address')
                            ->label('Alamat')
                            ->disabled()
                            ->rows(2),

                        Forms\Components\Textarea::make('message')
                            ->label('Pesan')
                            ->disabled()
                            ->rows(3),

                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'new' => 'Baru',
                                'contacted' => 'Sudah Dihubungi',
                                'converted' => 'Berhasil',
                                'lost' => 'Batal',
                            ])
                            ->required()
                            ->live(),

                        Forms\Components\Textarea::make('notes')
                            ->label('Catatan')
                            ->rows(3),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Quick Actions')
                    ->schema([
                        Forms\Components\Actions::make([
                            Forms\Components\Action::make('open_whatsapp')
                                ->label('Buka WhatsApp')
                                ->icon('heroicon-o-chat-bubble-left-right')
                                ->url(fn (FormSubmission $record): string => 'https://wa.me/' . $record->whatsapp)
                                ->openUrlInNewTab()
                                ->color('success'),
                        ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->description(fn (FormSubmission $record): string => $record->name)
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('whatsapp')
                    ->label('WhatsApp')
                    ->copyable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('package_interest')
                    ->label('Paket')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'new' => 'Baru',
                        'contacted' => 'Dihubungi',
                        'converted' => 'Berhasil',
                        'lost' => 'Batal',
                    })
                    ->badge()
                    ->color(fn (string $state): string => match($state) {
                        'new' => 'info',
                        'contacted' => 'warning',
                        'converted' => 'success',
                        'lost' => 'danger',
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'new' => 'Baru',
                        'contacted' => 'Sudah Dihubungi',
                        'converted' => 'Berhasil',
                        'lost' => 'Batal',
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
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFormSubmissions::route('/'),
            'edit' => Pages\EditFormSubmission::route('/{record}/edit'),
        ];
    }
}
