<?php

namespace App;

use App\Traits\HasPermissionsTrait;
use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use App\UserProfile;
use Illuminate\Support\Carbon;

/**
 * Class User
 *
 * @package App
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|\App\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \App\UserProfile|null $userProfile
 * @property-read Collection|\App\Role[] $roles
 * @property-read int|null $roles_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRegistrationIp($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read UserIpActivity|null $userIpActivity
 * @property-read Collection|UserSocialNetworkBadge[] $userSocialNetworkBadges
 * @property-read int|null $user_social_network_badges_count
 * @property string|null $lastActive
 * @method static Builder|User whereLastActive($value)
 * @property string|null $last_active
 * @property-read Collection|Session[] $sessions
 * @property-read int|null $sessions_count
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class, 'id')->withDefault(
            [
                'avatar' => '/avatars/default_avatar.png',
                'sex' => 'unset',
            ]
        )
            ;
    }

    public function userIpActivity()
    {
        return $this->hasOne(UserIpActivity::class, 'user_id');
    }

    public function userSocialNetworkBadges()
    {
        return $this->hasMany(UserSocialNetworkBadge::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function lastActivity()
    {
        $lastActive = false;

        if (isset($this->last_active)) {
            $lastActive = Carbon::parse($this->last_active)->diffInMinutes(Carbon::now()) + 1;
        }
        return $lastActive;
    }

    public function isOnline()
    {
        return $this->lastActivity() < 5 && $this->sessions->count();
    }
}
