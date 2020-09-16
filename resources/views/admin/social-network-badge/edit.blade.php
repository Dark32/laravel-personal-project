@extends('layouts.admin')
@php
    /**
     * @var \App\SocialNetworkBadge $socialNetworkBadge
    */
@endphp
@section('content')
    <div class="card push-top">
        <div class="card-header">
            Изменить значёк соц сети
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
            <form action="{{route('admin.social-network-badge.update',['social_network_badge'=>$socialNetworkBadge])}}"
                  method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Название</label>
                    <input type="text" class="form-control" name="name" value="{{$socialNetworkBadge->name}}"/>
                </div>

                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" name="description"
                              rows="3">{{$socialNetworkBadge->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="pattern">Шаблон</label>
                    <input type="text" class="form-control" name="pattern" value="{{$socialNetworkBadge->pattern}}"/>
                </div>
                <div class="form-group">
                    <label for="icon">Иконка</label>
                    <input type="text" class="form-control" name="icon" value="{{$socialNetworkBadge->icon}}"/>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Сохранить</button>
            </form>
        </div>
@endsection
