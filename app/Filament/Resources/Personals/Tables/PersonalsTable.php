<?php

namespace App\Filament\Resources\Personals\Tables;

// use Filament\Actions\BulkActionGroup;
// use Filament\Actions\DeleteBulkAction;
// use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class PersonalsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagen')
                    ->circular(),

                TextColumn::make('nombre')
                    ->formatStateUsing(fn($record) => "{$record->nombre} {$record->apellido}")
                    ->searchable(['nombre', 'apellido'])
                    ->sortable(),

                TextColumn::make('cargo.nombre')
                    ->label('Cargo')
                    ->badge(),

                ToggleColumn::make('activo'),

                TextColumn::make('orden')
                    ->sortable(),
            ])
            ->defaultSort('orden')
        ;
        // ->filters([
        //     //
        // ])
        // ->recordActions([
        //     EditAction::make(),
        // ])
        // ->toolbarActions([
        //     BulkActionGroup::make([
        //         DeleteBulkAction::make(),
        //     ]),
        // ]);
    }
}
