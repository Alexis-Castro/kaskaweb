<?php

namespace App\Filament\Resources\Usuarios\Schemas;

// use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UsuarioForm
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
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                TextInput::make('password')
                    ->password()
                    ->required(fn(string $context): bool => $context === 'create')
                    ->minLength(8)
                    ->dehydrateStateUsing(fn(?string $state) => filled($state) ? Hash::make($state) : null)
                    ->dehydrated(fn(?string $state) => filled($state))
                    ->helperText('Deja este campo vacío si no quieres cambiar la contraseña actual.'),

                Select::make('rol_id')
                    ->label('Rol')
                    ->relationship('rol', 'nombre')
                    ->required()
                    ->searchable()
                    ->preload(),

                Toggle::make('confirmado')
                    ->label('Cuenta confirmada'),
                // DateTimePicker::make('ultimo_login'),
            ]);
    }
}
