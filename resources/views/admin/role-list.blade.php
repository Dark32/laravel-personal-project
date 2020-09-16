@extends('layouts.admin')
@php
    /**
     * @var Role[] $roles
     */use App\Models\Role;
@endphp
@section('content')

    <div class="table-responsive">
        <table class="table table-striped table-bordered ">
            <caption>List of roles</caption>
            <thead class="thead-dark">
            <tr>
                <th scope="col">id
                    <a class="badge badge-primary" href="{{route('admin.role.create')}}" >@include('icons.bi-plus')</a></th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Описание</th>
                @can('admin.user.list')  <th scope="col">Пользователи</th>@endcan
                @can('admin.permission.list') <th scope="col">Права</th>@endcan
            </tr>
            </thead>
            <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{$role->id}}
                        <a href="{{route('admin.role.edit', $role)}}">@include('icons.bi-pencil-square')</a>
                        @unless($role->undeletable)
                            <a href="{{route('admin.role.delete', $role)}}"
                               class="text-danger">@include('icons.bi-trash')</a>
                        @else
                            <span class="text-muted">@include('icons.bi-trash')</span>
                        @endif
                    </td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->slug}}</td>
                    <td>{{$role->description}}</td>
                    @can('admin.user.list')<td>@include('admin.fragment.users', ['users'=>$role->users])</td>@endcan
                    @can('admin.permission.list')<td>@include('admin.fragment.permissions', ['permissions'=>$role->permissions])</td>@endcan
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $roles->links() }}
@endsection
