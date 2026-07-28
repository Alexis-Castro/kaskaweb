<?php

namespace App\Filament\Resources\Proyectos\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;


class ProyectoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                        // Solo autogenera el slug si el usuario no lo cambió a mano antes
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

                Select::make('categoria_id')
                    ->relationship('categoria', 'nombre', fn($query) => $query->where('tipo', 'proyecto'))
                    ->required()
                    ->searchable()
                    ->preload(),

                FileUpload::make('imagen_previa')
                    ->image()
                    ->directory('proyectos')
                    ->required(),

                TextInput::make('link_video')
                    ->label('Link de video (opcional)')
                    ->url()
                    ->maxLength(500),

                Toggle::make('destacado')
                    ->label('Mostrar como destacado en el home'),

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
