<?php

namespace App\Filament\Resources;

use App\Models\Cotizacion;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CotizacionResource extends Resource
{
    protected static ?string $model = Cotizacion::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Leads';

    protected static ?string $navigationLabel = 'Cotizaciones';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('nombres')
                ->disabled(),

            TextInput::make('email')
                ->disabled(),

            TextInput::make('telefono')
                ->disabled(),

            TextInput::make('servicio.titulo')
                ->label('Servicio')
                ->disabled(),

            Textarea::make('descripcion')
                ->disabled()
                ->rows(5)
                ->columnSpanFull(),

            // Único campo editable desde el panel
            Select::make('estado')
                ->options([
                    'pendiente' => 'Pendiente',
                    'contactado' => 'Contactado',
                    'cerrado' => 'Cerrado',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pendiente' => 'warning',
                        'contactado' => 'info',
                        'cerrado' => 'success',
                    }),

                TextColumn::make('nombres')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->searchable(),

                TextColumn::make('telefono'),

                TextColumn::make('servicio.titulo')
                    ->label('Servicio')
                    ->badge(),

                TextColumn::make('created_at')
                    ->label('Recibido')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('estado')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'contactado' => 'Contactado',
                        'cerrado' => 'Cerrado',
                    ]),
            ])
            ->recordActions([
                ActionGroup::make([
                    Action::make('marcarContactado')
                        ->label('Marcar como contactado')
                        ->icon('heroicon-o-phone')
                        ->visible(fn (Cotizacion $record) => $record->estado !== 'contactado')
                        ->action(fn (Cotizacion $record) => $record->update(['estado' => 'contactado'])),

                    Action::make('marcarCerrado')
                        ->label('Marcar como cerrado')
                        ->icon('heroicon-o-check-circle')
                        ->visible(fn (Cotizacion $record) => $record->estado !== 'cerrado')
                        ->action(fn (Cotizacion $record) => $record->update(['estado' => 'cerrado'])),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCotizacions::route('/'),
            'edit' => Pages\EditCotizacion::route('/{record}/edit'),
        ];
    }
}
