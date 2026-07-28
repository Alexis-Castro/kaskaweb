<?php

namespace App\Filament\Pages;

use App\Models\Configuracion;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Support\Icons\Heroicon;
use UnitEnum;
use Filament\Schemas\Schema;


class Ajustes extends Page
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string | UnitEnum | null $navigationGroup = 'Configuración';

    protected static ?string $navigationLabel = 'Ajustes del sitio';

    protected static ?string $title = 'Ajustes del sitio';

    protected string $view = 'filament.pages.ajustes';

    public ?array $data = [];

    public function mount(): void
    {
        // Carga todas las filas de configuraciones como [clave => valor]
        // y las usa para llenar el formulario, agrupado visualmente por 'grupo'.
        $valores = Configuracion::pluck('valor', 'clave')->toArray();

        $this->form->fill($valores);
        // $this->data = [];
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Datos generales')
                    ->schema([
                        TextInput::make('nombre_empresa')->required(),
                        TextInput::make('eslogan'),
                    ])
                    ->columns(2),

                Section::make('Contacto')
                    ->schema([
                        TextInput::make('telefono')->tel(),
                        TextInput::make('email_contacto')->email(),
                        TextInput::make('direccion'),
                        TextInput::make('ciudad'),
                    ])
                    ->columns(2),

                Section::make('Portada (hero)')
                    ->schema([
                        FileUpload::make('imagen_inicio')
                            ->image()
                            ->directory('empresa'),
                        TextInput::make('video_inicio')
                            ->label('Link de video (opcional)')
                            ->url(),
                    ])
                    ->columns(2),

                Section::make('Contadores del home')
                    ->schema([
                        TextInput::make('stat_1_label')->label('Etiqueta 1'),
                        TextInput::make('stat_1_valor')->label('Valor 1')->numeric(),
                        TextInput::make('stat_2_label')->label('Etiqueta 2'),
                        TextInput::make('stat_2_valor')->label('Valor 2')->numeric(),
                        TextInput::make('stat_3_label')->label('Etiqueta 3'),
                        TextInput::make('stat_3_valor')->label('Valor 3')->numeric(),
                    ])
                    ->columns(3),
            ])
            ->statePath('data');
    }

    public function guardar(): void
    {
        $state = $this->form->getState();

        foreach ($state as $clave => $valor) {
            Configuracion::updateOrCreate(
                ['clave' => $clave],
                ['valor' => $valor]
            );
        }

        Notification::make()
            ->title('Ajustes guardados correctamente')
            ->success()
            ->send();
    }
}
