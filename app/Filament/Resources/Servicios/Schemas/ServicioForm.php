<?php

namespace App\Filament\Resources\Servicios\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;


class ServicioForm
{

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                        if (($get('slug') ?? '') !== Str::slug($old)) {
                            return;
                        }
                        $set('slug', Str::slug($state));
                    }),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                Textarea::make('descripcion')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),

                FileUpload::make('imagen')
                    ->image()
                    ->directory('servicios')
                    ->required(),

                TextInput::make('orden')
                    ->numeric()
                    ->default(0)
                    ->helperText('Menor número aparece primero'),

                TextInput::make('meta_title')
                    ->label('SEO: título')
                    ->maxLength(255),

                Textarea::make('meta_description')
                    ->label('SEO: descripción')
                    ->rows(2)
                    ->maxLength(500),
            ]);
    }
}
