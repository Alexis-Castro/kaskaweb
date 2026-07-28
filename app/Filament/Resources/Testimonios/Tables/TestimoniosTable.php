<?php

namespace App\Filament\Resources\Testimonios\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class TestimoniosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagen')
                    ->circular(),

                TextColumn::make('nombre_cliente')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('cargo_empresa')
                    ->label('Cargo / Empresa'),

                TextColumn::make('calificacion')
                    ->label('Calificación')
                    ->badge(),

                ToggleColumn::make('visible'),

                TextColumn::make('orden')
                    ->sortable(),
            ])
            ->defaultSort('orden')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
