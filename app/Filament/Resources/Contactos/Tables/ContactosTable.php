<?php

namespace App\Filament\Resources\Contactos\Tables;

use App\Models\Contacto;
use Filament\Actions\Action;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ContactosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('leido')
                    ->boolean()
                    ->label(''),

                TextColumn::make('nombres')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->searchable(),

                TextColumn::make('telefono'),

                TextColumn::make('asunto')
                    ->limit(30),

                TextColumn::make('created_at')
                    ->label('Recibido')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                TernaryFilter::make('leido')
                    ->label('Estado'),
            ])
            ->recordActions([
                Action::make('marcarLeido')
                    ->label(fn(Contacto $record) => $record->leido ? 'Marcar como no leído' : 'Marcar como leído')
                    ->icon(fn(Contacto $record) => $record->leido ? Heroicon::OutlinedEnvelope : Heroicon::OutlinedEnvelopeOpen)
                    ->action(fn(Contacto $record) => $record->update(['leido' => ! $record->leido])),
            ]);
    }
}
