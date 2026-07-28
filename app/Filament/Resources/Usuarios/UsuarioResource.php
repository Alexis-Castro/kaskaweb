<?php

namespace App\Filament\Resources\Usuarios;

use App\Filament\Resources\Usuarios\Pages\CreateUsuario;
use App\Filament\Resources\Usuarios\Pages\EditUsuario;
use App\Filament\Resources\Usuarios\Pages\ListUsuarios;
use App\Filament\Resources\Usuarios\Schemas\UsuarioForm;
use App\Filament\Resources\Usuarios\Tables\UsuariosTable;
use App\Models\Usuario;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class UsuarioResource extends Resource
{
    protected static ?string $model = Usuario::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;
    protected static string | UnitEnum | null $navigationGroup = 'Configuración';
    protected static ?string $navigationLabel = 'Usuarios';

    // ============================================
    // Restricción: solo superadmin ve y gestiona usuarios
    // ============================================
    public static function canViewAny(): bool
    {
        return Auth::user()?->esSuperadmin() ?? false;
    }

    public static function canCreate(): bool
    {
        return Auth::user()?->esSuperadmin() ?? false;
    }

    public static function canEdit($record): bool
    {
        return Auth::user()?->esSuperadmin() ?? false;
    }

    public static function canDelete($record): bool
    {
        // Nadie puede borrarse a sí mismo por accidente desde el panel
        return (Auth::user()?->esSuperadmin() ?? false) && Auth::id() !== $record->id;
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()?->esSuperadmin() ?? false;
    }

    public static function form(Schema $schema): Schema
    {
        return UsuarioForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsuariosTable::configure($table);
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
            'index' => ListUsuarios::route('/'),
            'create' => CreateUsuario::route('/create'),
            'edit' => EditUsuario::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
