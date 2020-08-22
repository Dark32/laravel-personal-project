@extends('layouts.admin')
@php
    use App\User;
    /**
     * @var User[] $users
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
                <th scope="col">email</th>
                <th scope="col">Профиль</th>
                @can('admin.role.list')
                    <th scope="col">Роли</th>
                @endcan
                @can('admin.permission.list')
                    <th scope="col">Права</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}
                        @can('admin.user.edit')
                            <a href="{{route('admin.user.edit', $user)}}">@include('icons.bi-pencil-square')</a>
                        @endcan
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}
                        @if($user->hasVerifiedEmail()) @include('icons.bi-check2') @else @include('icons.bi-x')@endif
                        <br>{{$user->email_verified_at}}
                    </td>
                    <td>@include('admin.fragment.profile', ['profile'=>$user->userProfile])</td>
                    @can('admin.role.list')<td>@include('admin.fragment.roles', ['roles'=>$user->roles])</td>@endcan
                    @can('admin.permission.list')<td>@include('admin.fragment.permissions', ['permissions'=>$user->permissions])</td>@endcan
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $users->links() }}
@endsection
