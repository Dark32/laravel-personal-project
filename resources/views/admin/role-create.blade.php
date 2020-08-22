@extends('layouts.admin')
@php
    use App\Role;
@endphp
@section('content')

    <div class="card push-top">
        <div class="card-header">
            Создать роль
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
            <form method="post" action="{{ route('admin.role.store') }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" value=""/>
                </div>
                <div class="form-group">
                    <label for="name">Название</label>
                    <input type="text" class="form-control" name="name" value=""/>
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
                @can('admin.user.edit') @include('admin.fragment.user-edit-select2', ['users'=>[]])@endcan
                @can('admin.permission.edit')@include('admin.fragment.permission-edit-select2', ['permissions'=>[]])@endcan
                <button type="submit" class="btn btn-block btn-danger">Создать</button>
            </form>
        </div>
    </div>
@endsection
