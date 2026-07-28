<?php

namespace App\Filament\Resources\Contactos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ContactoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombres')
                    ->disabled(),

                TextInput::make('asunto')
                    ->disabled(),

                TextInput::make('email')
                    ->disabled(),

                TextInput::make('telefono')
                    ->disabled(),

                Textarea::make('mensaje')
                    ->disabled()
                    ->rows(5)
                    ->columnSpanFull(),

                // Este es el único campo que sí se puede editar desde el panel
                Toggle::make('leido')
                    ->label('Marcado como leído'),
            ]);
    }
}
