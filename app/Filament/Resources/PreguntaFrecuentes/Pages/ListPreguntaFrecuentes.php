<?php

namespace App\Filament\Resources\PreguntaFrecuentes\Pages;

use App\Filament\Resources\PreguntaFrecuentes\PreguntaFrecuenteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPreguntaFrecuentes extends ListRecords
{
    protected static string $resource = PreguntaFrecuenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
