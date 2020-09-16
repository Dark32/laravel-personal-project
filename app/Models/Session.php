<?php
/**
 * Created by andrew.
 * Date: 25.08.2020
 * Mail 10.42@mail.ru
 */

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Session
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string $payload
 * @property int $last_activity
 * @property-read \App\User|null $user
 * @method static Builder|Session activity($limit = 10)
 * @method static Builder|Session guests()
 * @method static Builder|Session newModelQuery()
 * @method static Builder|Session newQuery()
 * @method static Builder|Session query()
 * @method static Builder|Session registered()
 * @method static Builder|Session whereId($value)
 * @method static Builder|Session whereIpAddress($value)
 * @method static Builder|Session whereLastActivity($value)
 * @method static Builder|Session wherePayload($value)
 * @method static Builder|Session whereUserAgent($value)
 * @method static Builder|Session whereUserId($value)
 * @mixin Eloquent
 */
class Session extends Model
{
    /**
     * {@inheritdoc}
     */
    public $table = 'sessions';

    /**
     * {@inheritdoc}
     */
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Returns all the users within the given activity.
     *
     * @param Builder $query
     * @param int $limit
     * @return Builder
     */
    public function scopeActivity($query, $limit = 10)
    {
        $lastActivity = Carbon::now()->subMinutes($limit)->timestamp;

        return $query->where('last_activity', '>=', $lastActivity);
    }

    /**
     * Returns all the guest users.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeGuests(Builder $query)
    {
        return $query->whereNull('user_id');
    }

    /**
     * Returns all the registered users.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeRegistered(Builder $query)
    {
        return $query->whereNotNull('user_id')->with('user');
    }

}
