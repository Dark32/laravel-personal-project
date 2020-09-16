@extends('layouts.admin')
@php
    use App\Models\User;
    /**
     * @var \App\Permission[] $permissions
     */
@endphp
@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-bordered ">
            <caption>List of users</caption>
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">slug</th>
                <th scope="col">Описание</th>
                @can('admin.user.list')
                    <th scope="col">Пользователи</th>@endcan
                @can('admin.role.list')
                    <th scope="col">Роли</th>@endcan
            </tr>
            </thead>
            <tbody>
            @foreach ($permissions as $permission)
                <tr>
                    <td>{{$permission->id}}
                        @can('admin.permission.edit')
                            <a href="{{route('admin.permission.edit', ['permission'=>$permission])}}">@include('icons.bi-pencil-square')</a>
                        @endcan
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->slug}}</td>
                    <td>{{$permission->description}}</td>
                    @can('admin.user.list')
                        <td>@include('admin.fragment.users', ['users'=>$permission->users])</td>@endcan
                    @can('admin.role.list')
                        <td>@include('admin.fragment.roles', ['roles'=>$permission->roles])</td>@endcan
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $permissions->links() }}
@endsection
