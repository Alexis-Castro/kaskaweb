<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $telefono
 * @property string $imagen
 * @property int $cargo_id
 * @property int $orden
 * @property bool $activo
 * @property-read \App\Models\Cargo $cargo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RedSocial> $redesSociales
 * @property-read int|null $redes_sociales_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personal query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personal whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personal whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personal whereCargoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personal whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personal whereImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personal whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personal whereOrden($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personal whereTelefono($value)
 * @mixin \Eloquent
 */
class Personal extends Model
{
    protected $table = 'personal';
    public $timestamps = false;
    protected $fillable = ['nombre', 'apellido', 'email', 'telefono', 'imagen', 'cargo_id', 'orden', 'activo'];
    protected $casts = ['activo' => 'boolean'];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }

    public function redesSociales()
    {
        return $this->hasMany(RedSocial::class, 'redeable_id')
            ->where('redeable_type', 'personal');
    }
}
