<?php

namespace App\Models;

use Filament\Models\Contracts\HasName;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $password
 * @property bool $confirmado
 * @property string|null $token
 * @property int $rol_id
 * @property \Carbon\CarbonImmutable|null $ultimo_login
 * @property string $created_at
 * @property \Carbon\CarbonImmutable|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BlogPost> $blogPosts
 * @property-read int|null $blog_posts_count
 * @property-read \App\Models\Rol $rol
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Usuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Usuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Usuario onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Usuario query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Usuario whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Usuario whereConfirmado($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Usuario whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Usuario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Usuario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Usuario whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Usuario wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Usuario whereRolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Usuario whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Usuario whereUltimoLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Usuario withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Usuario withoutTrashed()
 * @mixin \Eloquent
 */
class Usuario extends Authenticatable implements HasName
{
    use SoftDeletes;
    protected $table = 'usuarios';
    public $timestamps = false; // usa created_at manual, sin updated_at
    protected $fillable = ['nombre', 'apellido', 'email', 'password', 'confirmado', 'token', 'rol_id'];
    protected $hidden = ['password', 'token'];
    protected $casts = [
        'confirmado' => 'boolean',
        'ultimo_login' => 'datetime',
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function getFilamentName(): string
    {
        return "{$this->nombre} {$this->apellido}";
    }

    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class, 'autor_id');
    }

    public function esSuperadmin(): bool
    {
        return $this->rol?->nombre === 'superadmin';
    }
}
