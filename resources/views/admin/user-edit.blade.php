@extends('layouts.admin')
@php
    /**
     * @var App\User $user
     */
@endphp
@section('content')

    <div class="card push-top">
        <div class="card-header">
            Изменить пользователя
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{ route('admin.user.update', $user->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}"/>
                </div>
                <span>Настройки профиля</span>
                <div class="form-group">
                    <label for="email">Аватар</label>
                    <input type="text" class="form-control" name="avatar"
                           value="{{ $user->userProfile ? $user->userProfile->avatar : '' }}"/>
                </div>
                <div class="form-group">
                    <label for="sex">пол</label>
                    <select class="form-control" name="sex">
                        <option @if($user->userProfile ? $user->userProfile->sex == 'unset' : true) selected
                                @endif value="unset">Нет
                        </option>
                        <option @if($user->userProfile ? $user->userProfile->sex == 'male' : false) selected
                                @endif value="male">Мужской
                        </option>
                        <option @if($user->userProfile ? $user->userProfile->sex == 'female' : false) selected
                                @endif value="female">Женский
                        </option>
                    </select>
                </div>
                <span>Настройки ролей и прав</span>
                @can('admin.role.edit')
                    @include('admin.fragment.role-edit-select2', ['roles'=>$user->roles])
                @endcan
                @can('admin.permission.edit')
                    @include('admin.fragment.permission-edit-select2', ['permissions'=>$user->permissions])
                @endcan
                <button type="submit" class="btn btn-block btn-danger">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
