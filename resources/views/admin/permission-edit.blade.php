@extends('layouts.admin')
@php
    /**
     * @var App\Permission $permission
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
            <form method="post" action="{{ route('admin.permission.update', $permission->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Название</label>
                    <input type="text" class="form-control" name="name" value="{{ $permission->name }}"/>
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" disabled value="{{ $permission->slug }}"/>
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" name="description" rows="3">{{$permission->description}}</textarea>
                </div>
                @can('admin.user.edit')@include('admin.fragment.user-edit-select2', ['users'=>$permission->users])@endcan
                @can('admin.role.edit')@include('admin.fragment.role-edit-select2', ['roles'=>$permission->roles])@endcan
                <button type="submit" class="btn btn-block btn-danger">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
