<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleEditRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleListController extends Controller
{
    public function index()
    {
        $roles = Role::with(['users','permissions'])->paginate(15);
        return view('admin.role-list', ['roles' => $roles]);
    }

    public function edit(Role $role)
    {
        return view('admin.role-edit', ['role' => $role]);
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

        $data = Role::select("id", "name", 'slug')
            ->where('slug', 'LIKE', "%{$term}%")
            ->orWhere('name', 'LIKE', "%{$term}%")
            ->limit(15)
            ->get()
        ;

        return response()->json($data);
    }

    public function update(RoleEditRequest $request, $id)
    {

        $updateData = $request->validated();
        $role = Role::whereId($id)->first();
        if (! $role) {
            return redirect()->route('admin.role.list');
        }
        $role->update($updateData);
        if (isset($updateData['permissions'])) {
            $role->permissions()->sync($updateData['permissions']);
        }
        if (isset($updateData['users'])) {
            $role->users()->sync($updateData['users']);
        }

        return redirect()->route('admin.role.list');
    }

    public function create()
    {
        return view('admin.role-create');
    }

    public function store(RoleEditRequest $request)
    {
        $updateData = $request->validated();
        if (empty($updateData['slug'])) {
            $updateData['slug'] = $updateData['name'];
        }
        $role = Role::whereSlug($updateData['slug'])->first();
        if ($role) {
            return redirect()->route('admin.role.edit', ['role' => $role]);
        }

        $role = Role::create($updateData);
        if (isset($updateData['permissions'])) {
            $role->permissions()->sync(array_filter($updateData['permissions']));
        }
        if (isset($updateData['users'])) {
            $role->users()->sync(array_filter($updateData['users']));
        }

        return redirect()->route('admin.role.list');
    }

    public function delete(Role $role)
    {
        if ($role->undeletable) {
            abort(403);
        }
        $role->delete();
        return redirect()->route('admin.role.list');
    }
}

