@extends('layouts.admin')
@php
    /**
     * @var App\Role $role
     */
@endphp
@section('content')

    <div class="card push-top">
        <div class="card-header">
            Изменить роль
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
            <form method="post" action="{{ route('admin.role.update', $role->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Название</label>
                    <input type="text" class="form-control" name="name" value="{{ $role->name }}"/>
                    <label for="name">Сырое имя: {{$role->slug}}</label>
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" name="description" rows="3">{{$role->description}}</textarea>
                </div>
                @can('admin.user.edit')@include('admin.fragment.user-edit-select2', ['users'=>$role->users])@endcan
                @can('admin.permission.edit')@include('admin.fragment.permission-edit-select2', ['permissions'=>$role->permissions])@endcan
                <button type="submit" class="btn btn-block btn-danger">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
