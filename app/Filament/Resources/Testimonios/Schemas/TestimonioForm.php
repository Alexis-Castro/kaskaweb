<?php

namespace App\Filament\Resources\Testimonios\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TestimonioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre_cliente')
                    ->required()
                    ->maxLength(150),

                TextInput::make('cargo_empresa')
                    ->label('Cargo / Empresa')
                    ->maxLength(150),

                FileUpload::make('imagen')
                    ->image()
                    ->directory('testimonios'),

                Textarea::make('contenido')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),

                Select::make('calificacion')
                    ->options([1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'])
                    ->default(5)
                    ->required(),

                Toggle::make('visible')
                    ->default(true),

                TextInput::make('orden')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
