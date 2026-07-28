<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $titulo
 * @property string $slug
 * @property string|null $resumen
 * @property string $contenido
 * @property string|null $imagen_portada
 * @property int|null $categoria_id
 * @property int $autor_id
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property bool $publicado
 * @property \Carbon\CarbonImmutable|null $publicado_at
 * @property string $created_at
 * @property \Carbon\CarbonImmutable|null $deleted_at
 * @property-read \App\Models\Usuario|null $autor
 * @property-read \App\Models\Categoria|null $categoria
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereAutorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereCategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereContenido($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereImagenPortada($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost wherePublicado($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost wherePublicadoAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereResumen($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost withoutTrashed()
 * @mixin \Eloquent
 */
class BlogPost extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    protected $fillable = [
        'titulo', 'slug', 'resumen', 'contenido', 'imagen_portada',
        'categoria_id', 'autor_id', 'meta_title', 'meta_description',
        'publicado', 'publicado_at',
    ];
    protected $casts = [
        'publicado' => 'boolean',
        'publicado_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::creating(function ($post) {
            $post->slug = $post->slug ?: Str::slug($post->titulo);
        });
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function autor()
    {
        return $this->belongsTo(Usuario::class, 'autor_id');
    }
}
