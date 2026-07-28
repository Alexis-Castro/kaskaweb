<?php

namespace App\Filament\Resources\Personals\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PersonalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required()
                    ->maxLength(100),

                TextInput::make('apellido')
                    ->required()
                    ->maxLength(100),

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('telefono')
                    ->tel()
                    ->required()
                    ->maxLength(20),

                Select::make('cargo_id')
                    ->relationship('cargo', 'nombre')
                    ->required()
                    ->searchable()
                    ->preload(),

                FileUpload::make('imagen')
                    ->image()
                    ->directory('personal')
                    ->required(),

                TextInput::make('orden')
                    ->numeric()
                    ->default(0),

                Toggle::make('activo')
                    ->default(true),
            ]);
    }
}
