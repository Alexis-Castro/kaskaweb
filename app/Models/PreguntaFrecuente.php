<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $pregunta
 * @property string $respuesta
 * @property int $orden
 * @property bool $visible
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PreguntaFrecuente newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PreguntaFrecuente newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PreguntaFrecuente query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PreguntaFrecuente whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PreguntaFrecuente whereOrden($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PreguntaFrecuente wherePregunta($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PreguntaFrecuente whereRespuesta($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PreguntaFrecuente whereVisible($value)
 * @mixin \Eloquent
 */
class PreguntaFrecuente extends Model
{
    public $timestamps = false;
    protected $table = 'preguntas_frecuentes';
    protected $fillable = ['pregunta', 'respuesta', 'orden', 'visible'];
    protected $casts = ['visible' => 'boolean'];
}
