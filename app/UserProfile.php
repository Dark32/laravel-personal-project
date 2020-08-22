<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * App\UserProfile
 *
 * @property int $id
 * @property string $nickname
 * @property string|null $avatar
 * @property string $sex
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereSex($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUpdatedAt($value)
 */
class UserProfile extends Model
{
    protected $fillable = [
        'avatar',
        'sex',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    public function getSexAttribute($value)
    {
        return ['unset' => 'не задан', 'male' => 'мужской', 'female' => 'женский'][$value];
    }
}
