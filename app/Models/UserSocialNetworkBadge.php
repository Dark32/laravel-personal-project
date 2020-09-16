<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\UserSocialNetworkBadges
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $user_id
 * @property int|null $social_network_badge_id
 * @property string $link
 * @method static Builder|UserSocialNetworkBadge newModelQuery()
 * @method static Builder|UserSocialNetworkBadge newQuery()
 * @method static Builder|UserSocialNetworkBadge query()
 * @method static Builder|UserSocialNetworkBadge whereCreatedAt($value)
 * @method static Builder|UserSocialNetworkBadge whereId($value)
 * @method static Builder|UserSocialNetworkBadge whereLink($value)
 * @method static Builder|UserSocialNetworkBadge whereSocialNetworkBadgeId($value)
 * @method static Builder|UserSocialNetworkBadge whereUpdatedAt($value)
 * @method static Builder|UserSocialNetworkBadge whereUserId($value)
 * @mixin Eloquent
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
     * @return HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    /**
     * @return BelongsTo
     */
    public function socialBadge()
    {
        return $this->belongsTo(SocialNetworkBadge::class, 'social_network_badge_id')->withDefault([
            'name'=>'N/A', 'icon'=>'<i class="fas fa-question-circle"></i>'
        ]);
    }
}
