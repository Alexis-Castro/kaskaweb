<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombres
 * @property string $email
 * @property string $telefono
 * @property int|null $servicio_id
 * @property string $descripcion
 * @property string $estado
 * @property string $created_at
 * @property-read \App\Models\Servicio|null $servicio
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cotizacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cotizacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cotizacion query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cotizacion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cotizacion whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cotizacion whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cotizacion whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cotizacion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cotizacion whereNombres($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cotizacion whereServicioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cotizacion whereTelefono($value)
 * @mixin \Eloquent
 */
class Cotizacion extends Model
{
    protected $table = 'cotizaciones';
    public $timestamps = false;
    protected $fillable = ['nombres', 'email', 'telefono', 'servicio_id', 'descripcion', 'estado'];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }
}
