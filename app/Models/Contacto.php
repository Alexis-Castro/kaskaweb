<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombres
 * @property string|null $asunto
 * @property string $email
 * @property string $telefono
 * @property string $mensaje
 * @property bool $leido
 * @property string $created_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contacto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contacto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contacto query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contacto whereAsunto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contacto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contacto whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contacto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contacto whereLeido($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contacto whereMensaje($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contacto whereNombres($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contacto whereTelefono($value)
 * @mixin \Eloquent
 */
class Contacto extends Model
{
    protected $table = 'contactos';
    public $timestamps = false;
    protected $fillable = ['nombres', 'asunto', 'email', 'telefono', 'mensaje', 'leido'];
    protected $casts = ['leido' => 'boolean'];
}
