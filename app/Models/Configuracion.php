<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $clave
 * @property string|null $valor
 * @property string $tipo
 * @property string $grupo
 * @property string $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Configuracion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Configuracion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Configuracion query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Configuracion whereClave($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Configuracion whereGrupo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Configuracion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Configuracion whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Configuracion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Configuracion whereValor($value)
 * @mixin \Eloquent
 */
class Configuracion extends Model
{
    protected $table = 'configuraciones';
    public $timestamps = false;
    protected $fillable = ['clave', 'valor', 'tipo', 'grupo'];

    // Helper estático: Configuracion::obtener('nombre_empresa')
    public static function obtener(string $clave, $default = null)
    {
        return static::where('clave', $clave)->value('valor') ?? $default;
    }
}
