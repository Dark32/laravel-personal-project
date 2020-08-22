<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissionEditRequest;
use App\Permission;
use Illuminate\Http\Request;

class PermissionListController extends Controller
{
    public function index()
    {
        $permissions = Permission::with(['roles','users'])->paginate(15);
        return view('admin.permission-list', ['permissions' => $permissions]);
    }

    public function edit(Permission $permission)
    {
        return view('admin.permission-edit', ['permission' => $permission]);;
    }

    public function find(Request $request)
    {
        if (! $request->has('q')) {
            return [];
        }
        $term = $request->q;

        if (strlen($term) < 2) {
            return [];
        }

        $data = Permission::select("id", "name", 'slug')
            ->where('slug', 'LIKE', "%{$term}%")
            ->orWhere("name", 'LIKE', "%{$term}%")
            ->limit(15)
            ->get()
        ;

        return response()->json($data);
    }

    public function update(PermissionEditRequest $request, $id)
    {

        $updateData = $request->validated();
        $permission = Permission::whereId($id)->first();
        if (! $permission) {
            return redirect()->route('admin.permission.list');
        }
        $permission->update($updateData);
        if (isset($updateData['roles'])) {
            $permission->roles()->sync($updateData['roles']);
        }
        if (isset($updateData['users'])) {
            $permission->users()->sync($updateData['users']);
        }

        return redirect()->route('admin.permission.list');
    }
}
