<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class BlogPostForm
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

                Textarea::make('resumen')
                    ->label('Resumen (aparece en listados)')
                    ->rows(2)
                    ->maxLength(500)
                    ->columnSpanFull(),

                RichEditor::make('contenido')
                    ->required()
                    ->columnSpanFull(),

                FileUpload::make('imagen_portada')
                    ->image()
                    ->directory('blog'),

                Select::make('categoria_id')
                    ->label('Categoría')
                    ->relationship('categoria', 'nombre', fn($query) => $query->where('tipo', 'blog'))
                    ->searchable()
                    ->preload(),


                Toggle::make('publicado')
                    ->live()
                    ->afterStateUpdated(function (Set $set, bool $state) {
                        // Al publicar por primera vez, registra la fecha automáticamente
                        if ($state) {
                            $set('publicado_at', now());
                        }
                    }),

                DateTimePicker::make('publicado_at')
                    ->label('Fecha de publicación')
                    ->visible(fn(Get $get) => $get('publicado')),

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
