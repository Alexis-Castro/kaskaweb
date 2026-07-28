<?php

namespace App\Filament\Resources\BlogPosts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class BlogPostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagen_portada')
                    ->label('Portada'),

                TextColumn::make('titulo')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                TextColumn::make('categoria.nombre')
                    ->label('Categoría')
                    ->badge(),

                TextColumn::make('autor.nombre')
                    ->label('Autor'),

                IconColumn::make('publicado')
                    ->boolean(),

                TextColumn::make('publicado_at')
                    ->label('Publicado')
                    ->dateTime('d/m/Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
        // ->filters([
        //     TrashedFilter::make(),
        // ])
        // ->recordActions([
        //     EditAction::make(),
        // ])
        // ->toolbarActions([
        //     BulkActionGroup::make([
        //         DeleteBulkAction::make(),
        //         ForceDeleteBulkAction::make(),
        //         RestoreBulkAction::make(),
        //     ]),
        // ]);
    }
}
