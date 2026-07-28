<?php

namespace App\Filament\Resources\PreguntaFrecuentes\Pages;

use App\Filament\Resources\PreguntaFrecuentes\PreguntaFrecuenteResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPreguntaFrecuente extends EditRecord
{
    protected static string $resource = PreguntaFrecuenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
