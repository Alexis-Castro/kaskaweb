<?php

namespace App\Filament\Resources\PreguntaFrecuentes;

use App\Filament\Resources\PreguntaFrecuentes\Pages\CreatePreguntaFrecuente;
use App\Filament\Resources\PreguntaFrecuentes\Pages\EditPreguntaFrecuente;
use App\Filament\Resources\PreguntaFrecuentes\Pages\ListPreguntaFrecuentes;
use App\Filament\Resources\PreguntaFrecuentes\Schemas\PreguntaFrecuenteForm;
use App\Filament\Resources\PreguntaFrecuentes\Tables\PreguntaFrecuentesTable;
use App\Models\PreguntaFrecuente;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PreguntaFrecuenteResource extends Resource
{
    protected static ?string $model = PreguntaFrecuente::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedQuestionMarkCircle;
    protected static string | UnitEnum | null $navigationGroup = 'Contenido';
    protected static ?string $navigationLabel = 'Preguntas frecuentes';



    public static function form(Schema $schema): Schema
    {
        return PreguntaFrecuenteForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PreguntaFrecuentesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPreguntaFrecuentes::route('/'),
            'create' => CreatePreguntaFrecuente::route('/create'),
            'edit' => EditPreguntaFrecuente::route('/{record}/edit'),
        ];
    }
}
