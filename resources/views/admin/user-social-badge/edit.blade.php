@extends('layouts.admin')
@php
    /**
     * @var \App\UserSocialNetworkBadge $user_social_network_badge
    */
@endphp
@section('content')
    <div class="card push-top">
        <div class="card-header">
            Изменить ривязку соц сети
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
            <form
                action="{{route('admin.user-social-network-badge.update',['user_social_network_badge'=>$user_social_network_badge])}}"
                method="post">
                @csrf
                @method('PATCH')
                @include('fragment.social-network-badge.select2',['badge'=>$user_social_network_badge->socialBadge])
                <div class="form-group">
                    <label for="link">Ссылка</label>
                    <input type="text" class="form-control" name="link" value="{{$user_social_network_badge->link}}"/>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Сохранить</button>
            </form>
        </div>
@endsection
