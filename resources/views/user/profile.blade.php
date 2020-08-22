@extends('layouts.base')
@php
    /**
    * @var \App\User $user
    */
$links =['home'=>'Обзор', 'profile', 'messages', 'settings'];
@endphp

@section('content')
    <div class="container-fluid">
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
                        src="http://www.gravatar.com/avatar/0247c1728ef0e9c1a5d0307706a76d59?s=125&d=http%3A%2F%2Fnojs.ru%2Fpublic%2Fstyle_images%2Fmaster%2Fprofile%2Fdefault_large.png"
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
                               id="list-home-list" data-toggle="list"
                               href="#list-{{$key}}" role="tab" aria-controls="home">{{$link}}</a>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-9 col-sm-7 col p-1 pl-3 bg-white border-dark border shadow-sm ">
                <div class="row no-gutters">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-8 col pl-2 pb-2">
                        <h2>{{$user->name}}</h2>
                        Регистрация: {{$user->created_at}}<br>
                        <span class="badge badge-info">Offline</span>
                        <span class="text-black-50">Активность: 30 минут назад</span>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col ">

                    </div>
                    <div class="col-9 border ">
                        <div class="tab-content min-vh-30" id="nav-tabContent">
                            <div
                                class="tab-pane fade show active"
                                id="list-home" role="tabpanel"
                                aria-labelledby="list-home-list">
                                <dl class="row">
                                    <dt class="col-sm-2 text-right">Роли:</dt>
                                    <dd class="col-sm-10">{{$user->roles->implode('name',',')}}
                                    </dd>
                                    <dt class="col-sm-2 text-right">Пол:</dt>
                                    <dd class="col-sm-10">{{$user->userProfile? $user->userProfile->sex: 'не задан'}} </dd>
                                    <dt class="col-sm-2 text-right">Document Tree</dt>
                                    <dd class="col-sm-10">The tree of elements encoded in the source document.</dd>
                                </dl>
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
                    <div class="col-3 border">
                        fghgfh
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
