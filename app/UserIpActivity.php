<?php

namespace App;



use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\UserIpActivity
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $event
 * @property string $extra
 * @property int|null $user_id
 * @property string $ip
 * @property-read Collection|\App\User $user
 * @method static Builder|UserIpActivity newModelQuery()
 * @method static Builder|UserIpActivity newQuery()
 * @method static Builder|UserIpActivity query()
 * @method static Builder|UserIpActivity whereCreatedAt($value)
 * @method static Builder|UserIpActivity whereEvent($value)
 * @method static Builder|UserIpActivity whereExtra($value)
 * @method static Builder|UserIpActivity whereId($value)
 * @method static Builder|UserIpActivity whereIp($value)
 * @method static Builder|UserIpActivity whereUpdatedAt($value)
 * @method static Builder|UserIpActivity whereUserId($value)
 * @mixin Eloquent
 */
class UserIpActivity extends Model
{

    protected $fillable = [
        'user_id',
        'event',
        'ip',
        'extra'
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

}
