<?php

namespace App\Filament\Resources\Cotizacions\Tables;

use App\Models\Cotizacion;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
// use Filament\Actions\BulkActionGroup;
// use Filament\Actions\DeleteBulkAction;
// use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CotizacionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('estado')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
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
                        ->visible(fn(Cotizacion $record) => $record->estado !== 'contactado')
                        ->action(fn(Cotizacion $record) => $record->update(['estado' => 'contactado'])),

                    Action::make('marcarCerrado')
                        ->label('Marcar como cerrado')
                        ->icon('heroicon-o-check-circle')
                        ->visible(fn(Cotizacion $record) => $record->estado !== 'cerrado')
                        ->action(fn(Cotizacion $record) => $record->update(['estado' => 'cerrado'])),
                ]),
            ]);
    }
}
