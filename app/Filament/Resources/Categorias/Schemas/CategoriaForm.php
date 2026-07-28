<?php

namespace App\Filament\Resources\Categorias\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class CategoriaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required()
                    ->maxLength(100)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                        if (($get('slug') ?? '') !== Str::slug($old)) {
                            return;
                        }
                        $set('slug', Str::slug($state));
                    }),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(100),

                Select::make('tipo')
                    ->options([
                        'proyecto' => 'Proyecto',
                        'servicio' => 'Servicio',
                        'blog' => 'Blog',
                    ])
                    ->required(),
                // TextInput::make('nombre')
                //     ->required(),
                // TextInput::make('slug')
                //     ->required(),
                // Select::make('tipo')
                //     ->options(['proyecto' => 'Proyecto', 'blog' => 'Blog', 'servicio' => 'Servicio'])
                //     ->default('proyecto')
                //     ->required(),
            ]);
    }
}
