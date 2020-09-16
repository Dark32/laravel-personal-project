<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserSocialNetworkBadges
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property int|null $social_network_badge_id
 * @property string $link
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocialNetworkBadge newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocialNetworkBadge newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocialNetworkBadge query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocialNetworkBadge whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocialNetworkBadge whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocialNetworkBadge whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocialNetworkBadge whereSocialNetworkBadgeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocialNetworkBadge whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSocialNetworkBadge whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\SocialNetworkBadge $socialBadge
 * @property-read \App\User|null $user
 */
class UserSocialNetworkBadge extends Model
{
    protected $fillable = [
        'link',
        'social_network_badge_id',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function socialBadge()
    {
        return $this->belongsTo(SocialNetworkBadge::class, 'social_network_badge_id')->withDefault([
            'name'=>'N/A', 'icon'=>'<i class="fas fa-question-circle"></i>'
        ]);
    }
}
