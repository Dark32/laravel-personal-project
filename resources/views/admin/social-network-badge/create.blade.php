@extends('layouts.admin')

@section('content')
    <div class="card push-top">
        <div class="card-header">
            создать значёк соц сети
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
            <form action="{{route('admin.social-network-badge.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Название</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{old('slug')}}"/>
                </div>

                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" name="description" rows="3">{{old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="pattern">Шаблон</label>
                    <input type="text" class="form-control" name="pattern" value="{{old('pattern')}}"/>
                </div>
                <div class="form-group">
                    <label for="icon">Иконка</label>
                    <input type="text" class="form-control" name="icon" value="{{old('icon')}}"/>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Сохранить</button>
            </form>
        </div>
@endsection
