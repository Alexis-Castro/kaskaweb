<?php

namespace App\Filament\Resources\Cotizacions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CotizacionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
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
}
