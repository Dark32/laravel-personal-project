<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\SocialNetworkBadge
 *
 * @method static Builder|SocialNetworkBadge newModelQuery()
 * @method static Builder|SocialNetworkBadge newQuery()
 * @method static Builder|SocialNetworkBadge query()
 * @mixin \Eloquent
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $slug
 * @property string $name
 * @property string|null $description
 * @property string|null $icon
 * @property string $pattern
 * @method static Builder|SocialNetworkBadge whereCreatedAt($value)
 * @method static Builder|SocialNetworkBadge whereDescription($value)
 * @method static Builder|SocialNetworkBadge whereIcon($value)
 * @method static Builder|SocialNetworkBadge whereId($value)
 * @method static Builder|SocialNetworkBadge whereName($value)
 * @method static Builder|SocialNetworkBadge wherePattern($value)
 * @method static Builder|SocialNetworkBadge whereSlug($value)
 * @method static Builder|SocialNetworkBadge whereUpdatedAt($value)
 */
class SocialNetworkBadge extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'pattern',
    ];
}
