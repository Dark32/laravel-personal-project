<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Carbon;

/**
 * App\UserProfile
 *
 * @property int $id
 * @property string $nickname
 * @property string|null $avatar
 * @property string $sex
 * @property-read \App\User|null $user
 * @method static Builder|UserProfile newModelQuery()
 * @method static Builder|UserProfile newQuery()
 * @method static Builder|UserProfile query()
 * @method static Builder|UserProfile whereAvatar($value)
 * @method static Builder|UserProfile whereId($value)
 * @method static Builder|UserProfile whereSex($value)
 * @mixin Eloquent
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|UserProfile whereCreatedAt($value)
 * @method static Builder|UserProfile whereUpdatedAt($value)
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
