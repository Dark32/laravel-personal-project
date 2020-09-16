<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Role
 *
 * @package App
 * @property string $name
 * @property int $id
 * @property string $slug
 * @property string $description
 * @property boolean $undeletable
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|\App\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static Builder|Role newModelQuery()
 * @method static Builder|Role newQuery()
 * @method static Builder|Role query()
 * @method static Builder|Role whereCreatedAt($value)
 * @method static Builder|Role whereDescription($value)
 * @method static Builder|Role whereId($value)
 * @method static Builder|Role whereName($value)
 * @method static Builder|Role whereSlug($value)
 * @method static Builder|Role whereUpdatedAt($value)
 * @mixin Eloquent
 * @method static Builder|Role whereUndeletable($value)
 */
class Role extends Model
{
    protected $fillable = [
        'name', 'slug', 'description'
    ];
    public function permissions() {

        return $this->belongsToMany(Permission::class,'roles_permissions');

    }

    public function users() {

        return $this->belongsToMany(User::class,'users_roles');

    }
}
