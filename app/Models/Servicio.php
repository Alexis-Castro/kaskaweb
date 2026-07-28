<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $titulo
 * @property string $descripcion
 * @property string $imagen
 * @property string $slug
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property int $orden
 * @property string $created_at
 * @property \Carbon\CarbonImmutable|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cotizacion> $cotizaciones
 * @property-read int|null $cotizaciones_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Medio> $medios
 * @property-read int|null $medios_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio whereImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio whereOrden($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Servicio withoutTrashed()
 * @mixin \Eloquent
 */
class Servicio extends Model
{
    use SoftDeletes;
    protected $table = 'servicios';
    public $timestamps = false;
    protected $fillable = ['titulo', 'descripcion', 'imagen', 'slug', 'meta_title', 'meta_description', 'orden'];

    protected static function booted()
    {
        static::creating(function ($servicio) {
            $servicio->slug = $servicio->slug ?: Str::slug($servicio->titulo);
        });
    }

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class, 'servicio_id');
    }

    public function medios()
    {
        return $this->hasMany(Medio::class, 'mediable_id')
            ->where('mediable_type', 'servicio');
    }
}
