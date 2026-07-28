<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre_cliente
 * @property string|null $cargo_empresa
 * @property string|null $imagen
 * @property string $contenido
 * @property int $calificacion
 * @property bool $visible
 * @property int $orden
 * @property string $created_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonio query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonio whereCalificacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonio whereCargoEmpresa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonio whereContenido($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonio whereImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonio whereNombreCliente($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonio whereOrden($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonio whereVisible($value)
 * @mixin \Eloquent
 */
class Testimonio extends Model
{
    protected $table = 'testimonios';
    public $timestamps = false;
    protected $fillable = ['nombre_cliente', 'cargo_empresa', 'imagen', 'contenido', 'calificacion', 'visible', 'orden'];
    protected $casts = ['visible' => 'boolean'];
}
