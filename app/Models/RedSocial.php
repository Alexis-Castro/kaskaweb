<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $red
 * @property string $url
 * @property string $redeable_type
 * @property int $redeable_id
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RedSocial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RedSocial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RedSocial query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RedSocial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RedSocial whereRed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RedSocial whereRedeableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RedSocial whereRedeableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RedSocial whereUrl($value)
 * @mixin \Eloquent
 */
class RedSocial extends Model
{
    public $timestamps = false;
    protected $table = 'redes_sociales';
    protected $fillable = ['red', 'url', 'redeable_type', 'redeable_id'];
}
