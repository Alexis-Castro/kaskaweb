<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property string|null $link_video
 * @property string $imagen_previa
 * @property string $slug
 * @property int $categoria_id
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property bool $destacado
 * @property int $orden
 * @property string $created_at
 * @property \Carbon\CarbonImmutable|null $deleted_at
 * @property-read \App\Models\Categoria $categoria
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Medio> $medios
 * @property-read int|null $medios_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereCategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereDestacado($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereImagenPrevia($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereLinkVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereOrden($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proyecto withoutTrashed()
 * @mixin \Eloquent
 */
class Proyecto extends Model
{
    use SoftDeletes;
    protected $table = 'proyectos';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'descripcion',
        'link_video',
        'imagen_previa',
        'slug',
        'categoria_id',
        'meta_title',
        'meta_description',
        'destacado',
        'orden',
    ];
    protected $casts = ['destacado' => 'boolean'];

    protected static function booted()
    {
        static::creating(function ($proyecto) {
            $proyecto->slug = $proyecto->slug ?: Str::slug($proyecto->nombre);
        });
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function medios()
    {
        return $this->hasMany(Medio::class, 'mediable_id')
            ->where('mediable_type', 'proyecto');
    }
}
