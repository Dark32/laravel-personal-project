<?php
/**
 * Created by andrew.
 * Date: 14.08.2020
 * Mail 10.42@mail.ru
 */

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait HasPermissionsTrait
 * @package App\Traits
 * @property Role[] $roles
 * @property Permission[] $permissions
 */
trait HasPermissionsTrait
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }
    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'users_permissions');
    }

    /**
     * @param string ...$roles
     * @return bool
     */
    public function hasRole(... $roles ) {
        return (bool) $this->roles->whereIn('slug', $roles)->isNotEmpty();
    }

    /**
     * @param $permission
     * @return bool
     */
    public function hasPermission(Permission $permission)
    {
        return (bool) $this->permissions->contains($permission);
    }
    /**
     * @param $permission
     * @return bool
     */
    public function hasPermissionTo(Permission $permission)
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }
    public function hasPermissionThroughRole1(Permission $permission)
    {
        /**
         * @var Builder $query
         */
        $query = $this->roles()->with('permissions');
        $query->whereHas('permissions', function (Builder $query) use ($permission) {
                $query->whereSlug($permission->slug);
            return $query;
        });
        return $query->count()();
    }
    /**
     * @param $permission
     * @return bool
     */
    public function hasPermissionThroughRole(Permission $permission)
    {
        foreach ($permission->roles as $role){
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }


}
