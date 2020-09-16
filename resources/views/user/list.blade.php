@extends('layouts.base')
@php
    /**
    * @var \App\User[] $users
    */
@endphp
@section('content')
    <div class="card  border-0 bg-light">
        <div class="card-header rounded-0 mb-4">
            Список пользователей
        </div>
        <div class="card-body p-0">
            <ul class="list-group list-group-flush list-striped">

                @foreach ($users as $user)

                    <li id='user_{{$user->id}}' class="list-group-item">
                        <div class="row ">
                            <div class="col-1 ">
                                <img
                                    src="{{$user->userProfile->avatar ?? '/avatars/default_avatar.png'}}" width="50"
                                    height="50"
                                    alt="Аватар {{$user->name}}"
                                    class="rounded-lg border border-dark shadow mb-1 bg-white row  mx-auto d-block"
                                    style="padding: 1px">
                            </div>
                            <div class="col-10 border-left">
                                <a href="{{route('users.show',['user'=>$user])}}" class="text-monospace h5 text-primary  text-decoration-none">{{$user->name}}</a>
                                <br>
                                <div class="desc">
									Зарегестрирован: {{$user->created_at->toDateString()}}<br>
									{{$user->roles->implode('name',',')}}
                                    @include('user.online',['user'=>$user])
								</div>
                                <br>
                                @include('fragment.social-network-badge.badges',['badges'=>$user->userSocialNetworkBadges])
                            </div>
                            <div class="col-1">
                                <div class="row p-2">
                                    <button class="btn btn-primary col-4 m-1 btn-sm"><span class="fas fa-th"></span></button>
                                    <button class="btn btn-primary col-4 m-1 btn-sm"><span class="fas fa-th"></span></button>
                                    <div class="w-100"></div>
                                    <button class="btn btn-primary col-4 m-1 btn-sm"><span class="fas fa-th"></span></button>
                                    <button class="btn btn-primary col-4 m-1 btn-sm"><span class="fas fa-th"></span></button>
                                </div>
                            </div>
                        </div>

                    </li>
                @endforeach
            </ul>
        </div>
    </div>


    {{ $users->links() }}
@endsection
