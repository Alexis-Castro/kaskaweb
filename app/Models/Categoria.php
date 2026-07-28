<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre
 * @property string $slug
 * @property string $tipo
 * @property string $created_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BlogPost> $blogPosts
 * @property-read int|null $blog_posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Proyecto> $proyectos
 * @property-read int|null $proyectos_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria whereTipo($value)
 * @mixin \Eloquent
 */
class Categoria extends Model
{
    protected $table = 'categorias';
    public $timestamps = false;
    protected $fillable = ['nombre', 'slug', 'tipo'];

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'categoria_id');
    }

    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class, 'categoria_id');
    }
}
