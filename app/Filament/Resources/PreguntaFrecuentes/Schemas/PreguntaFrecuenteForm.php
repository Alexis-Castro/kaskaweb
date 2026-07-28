<?php

namespace App\Filament\Resources\PreguntaFrecuentes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PreguntaFrecuenteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('pregunta')
                    ->required()
                    ->maxLength(500)
                    ->columnSpanFull(),

                Textarea::make('respuesta')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),

                Toggle::make('visible')
                    ->default(true),

                TextInput::make('orden')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
