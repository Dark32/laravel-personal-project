<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Permission
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|\App\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @method static Builder|Permission newModelQuery()
 * @method static Builder|Permission newQuery()
 * @method static Builder|Permission query()
 * @method static Builder|Permission whereCreatedAt($value)
 * @method static Builder|Permission whereDescription($value)
 * @method static Builder|Permission whereId($value)
 * @method static Builder|Permission whereName($value)
 * @method static Builder|Permission whereSlug($value)
 * @method static Builder|Permission whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Permission extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function roles()
    {

        return $this->belongsToMany(Role::class, 'roles_permissions');
    }

    public function users()
    {

        return $this->belongsToMany(User::class, 'users_permissions');
    }
}
