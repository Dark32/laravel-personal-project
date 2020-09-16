@extends('layouts.base')
@php
    /**
    * @var \App\User $user
    */
$links =['home'=>'Обзор', 'profile'=>'profile', 'articles'=>'Статьи', 'messages'=>'Сообщения'];
@endphp

@section('content')

    <div class="container-fluid">
        @if(auth()->user()->id === $user->id)
        <div class="row no-gutters">
            <div class="col-2 offset-10 pb-2 pt-2"><a href="{{route('users.profile.edit')}}" class="btn btn-primary container-fluid"><span>Редактировать профиль</span></a></div>
        </div>
        @endif
        <div class="row border border-dark mr-1 p-1 bg-info">
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-5 col-12  bg-light-light-blue">
                <div class="text-left pl-2 pb-2">
                    <a href="#"
                       class="row btn btn-outline-dark position-relative btn-sm border-0 text-white-50 rounded-lg "
                       style="margin-bottom: -3.25rem;"
                       title="Обновить фотографию">Изменить</a>
                    <img
                        class="rounded-lg border border-dark shadow mb-1 bg-white row"
                        style="padding: 1px"
                        src="{{$user->userProfile->avatar ?? '/avatars/default_avatar.png'}}"
                        alt="{{$user->name}} аватар">
                </div>
                <div class="row pb-2">
                    <div
                        class="list-group w-100 list-group-flush pl-1 position-relative rounded-left"
                        id="list-tab"
                        role="tablist"
                        style="left:1px">
                        @foreach ( $links as $key=>$link)
                            <a class="list-group-item list-group-item-transparent text-capitalize @if ($loop->first)active @endif border border-dark border-right-0 @if (!$loop->last)border-bottom-0 @endif"
                               id="list--{{$key}}-list" data-toggle="list"
                               href="#list-{{$key}}" role="tab" aria-controls="-{{$key}}">{{$link}}</a>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-9 col-sm-7 col p-1 pl-3 bg-white border-dark border shadow-sm ">
                <div class="row no-gutters">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-8 col pl-2 pb-2">
                        <h2>{{$user->name}}</h2>
                        Зарегистрирован: {{$user->created_at}}
                       @include('user.online',['user'=>$user])
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col ">
                        <div class="border m-3 p-3 bg-light rounded ">
                            dummy
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-10 col-sm-12 col-12 mb-1">
                        <div class="tab-content min-vh-30" id="nav-tabContent">
                            <div
                                class="tab-pane fade show active"
                                id="list-home" role="tabpanel"
                                aria-labelledby="list-home-list">
                                <div class="card  border-0 bg-light">
                                    <div class="card-header rounded-0">
                                        Статистика
                                    </div>
                                    <div class="card-body">
                                        <dl class="row">
                                            <dt class="col-xl-2 col-lg-2 col-md-3 col-sm-5 col-12  text-sm-right">Роли:</dt>
                                            <dd class="col-xl-10 col-lg-10 col-md-9 col-sm-7 col-12">{{$user->roles->implode('name',',')}}
                                            </dd>
                                            <dt class="col-xl-2 col-lg-2 col-md-3 col-sm-5 col-12  text-sm-right">Пол:</dt>
                                            <dd class="col-xl-10 col-lg-10 col-md-9 col-sm-7 col-12 ">{{$user->userProfile? $user->userProfile->sex: 'не задан'}} </dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="card  border-0  bg-light">
                                    <div class="card-header rounded-0">
                                        Социальные сети
                                    </div>
                                    <div class="card-body">
                                        @include('fragment.social-network-badge.badges',['badges'=>$user->userSocialNetworkBadges])
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade"
                                 id="list-profile"
                                 role="tabpanel"
                                 aria-labelledby="list-profile-list">
                                1
                            </div>
                            <div class="tab-pane fade"
                                 id="list-messages"
                                 role="tabpanel"
                                 aria-labelledby="list-messages-list">
                                2
                            </div>
                            <div class="tab-pane fade"
                                 id="list-settings"
                                 role="tabpanel"
                                 aria-labelledby="list-settings-list">
                                3
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
                        <div class="card  border-0 bg-light ml-md-3 mb-md-3 mr-md-3">
                            <div class="card-header rounded-0">
                                ....
                            </div>
                            <div class="card-body">
                              .....
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
