<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $archivo
 * @property string $tipo
 * @property string $mediable_type
 * @property int $mediable_id
 * @property int $orden
 * @property string $created_at
 * @property-read \App\Models\Proyecto|null $mediable
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medio query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medio whereArchivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medio whereMediableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medio whereMediableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medio whereOrden($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medio whereTipo($value)
 * @mixin \Eloquent
 */
class Medio extends Model
{
    public $timestamps = false;
    protected $fillable = ['archivo', 'tipo', 'mediable_type', 'mediable_id', 'orden'];

    public function mediable()
    {
        // Relación polimórfica manual (mediable_type guarda 'proyecto', 'servicio', 'personal', 'blog')
        $map = [
            'proyecto' => Proyecto::class,
            'servicio' => Servicio::class,
            'personal' => Personal::class,
            'blog' => BlogPost::class,
        ];

        return $this->belongsTo($map[$this->mediable_type] ?? Proyecto::class, 'mediable_id');
    }
}
