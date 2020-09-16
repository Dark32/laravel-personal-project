@extends('layouts.base')
@php
    /**
    * @var \App\User $user
    */
$links =['home'=>'Основные настройки','profile'=>'Настройки профиля', 'social'=>'Настройки социальных сетей', 'messages'=>'Сообщения'];
@endphp

@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
    @endif
    <div class="container-fluid">
        <div class="row border border-dark mr-1 p-1 bg-info min-vh-70">
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-5 col-12  bg-light-light-blue">
                <div class="row pb-2 pt-2">
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
            <div class="col-xl-10 col-lg-10 col-md-9 col-sm-7 col p-1 pl-3 bg-white border-dark border shadow">
                <div class="row no-gutters">
                    <div class="col-xl-9 col-lg-9 col-md-10 col-sm-12 col-12 mb-1 p-2">
                        <div class="tab-content" id="nav-tabContent">
                            <div
                                class="tab-pane fade show active"
                                id="list-home" role="tabpanel"
                                aria-labelledby="list-home-list">
                                <span class="row h4 no-gutters border-bottom">Основные настройки</span>

                                <div class="form-group row col-8 border-bottom no-gutters pb-2">
                                    <label class="col-6 border-right mr-2 pl-3" for="name">Имя</label>
                                    <input type="text" class="form-control col" name="name"
                                           value="{{$user->name}}"/>
                                </div>
                                <form action="{{route('users.profile.update',['tab'=>'list-home'])}}"
                                      method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <span class="col-8 h5 no-gutters border-bottom mt-4">Настройки пароля</span>
                                        <div class="form-group row col-8  border-bottom no-gutters pb-2">
                                            <label class="col-6  border-right mr-2 pt-1 pl-3" for="new_pass">Новый
                                                пароль</label>
                                            <input type="text" class="form-control col" name="new_pass" value=""/>
                                        </div>
                                        <div class="form-group row col-8 border-bottom no-gutters pb-2">
                                            <label class="col-6  border-right mr-2 pl-3 pt-1" for="new_pass_retry">Повторить
                                                новый пароль</label>
                                            <input type="text" class="form-control col" name="new_pass_retry"
                                                   value=""/>
                                        </div>
                                        <div class="form-group row col-8 border-bottom no-gutters pb-2">
                                            <label class="col-6 border-right mr-2 pl-3 pt-1" for="old_pass">Старый
                                                пароль</label>
                                            <input type="text" class="form-control col" name="old_pass" value=""/>
                                        </div>
                                        <span class="w-100"></span>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12 col-12">
                                            <button type="submit" class="btn btn-block btn-primary">Сохранить</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade"
                                 id="list-profile"
                                 role="tabpanel"
                                 aria-labelledby="list-profile-list">
                                <span class="row h4 no-gutters border-bottom">Настройки профиля</span>

                                <form action="{{route('users.profile.update',['tab'=>'list-home'])}}"
                                      method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row no-gutters p-3 border-bottom mb-3">
                                        <div class="text-left pl-2 pb-2 col-2">
                                            <img
                                                class="rounded-lg border border-dark shadow mb-1 bg-white row"
                                                style="padding: 1px"
                                                src="{{$user->userProfile->avatar ?? '/avatars/default_avatar.png'}}"
                                                alt="{{$user->name}} аватар">
                                        </div>
                                        <div class="row col-10 no-gutters">
                                            <span class="col-6 h5">Аватар</span>
                                            <div class="form-group custom-file col-7 mb-2">
                                                <input type="file" class="custom-file-input " name="avatar">
                                                <label class="custom-file-label" for="avatar">Выбрать файл для
                                                    аватара</label>
                                            </div>
                                            <span class="col-6 h5 ">Пол</span>
                                            <div class="form-group col-7">
                                                <select class="form-control  col-7" name="sex">
                                                    <option
                                                        @if($user->userProfile ? $user->userProfile->sex == 'unset' : true) selected
                                                        @endif value="unset">Нет
                                                    </option>
                                                    <option
                                                        @if($user->userProfile ? $user->userProfile->sex == 'male' : false) selected
                                                        @endif value="male">Мужской
                                                    </option>
                                                    <option
                                                        @if($user->userProfile ? $user->userProfile->sex == 'female' : false) selected
                                                        @endif value="female">Женский
                                                    </option>
                                                </select>
                                            </div>
                                            <span class="w-100"></span>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 p-0">
                                                <button type="submit" class="btn btn-block btn-primary">Сохранить
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </form>

                            </div>
                            <div class="tab-pane fade"
                                 id="list-social"
                                 role="tabpanel"
                                 aria-labelledby="list-messages-list">
                                <span class="row h4 no-gutters border-bottom">Настройки социальных сетей</span>
                                <div class="form-group row border-bottom no-gutters pb-2">
                                    <div class="col-12 border-bottom mb-3 p-3">
                                        @include('fragment.social-network-badge.badges',['badges'=>$user->userSocialNetworkBadges])
                                    </div>
                                    <div class="col-4 mb-3 p-3">
                                        <span
                                            class="row h5 no-gutters border-bottom">Добавить привязку социальных сетей</span>
                                        <form action="" method="post">
                                            @csrf
                                            @include('fragment.social-network-badge.select2')
                                            <div class="form-group">
                                                <label for="link">Ссылка</label>
                                                <input type="text" class="form-control" name="link"
                                                       value="{{old('link')}}"/>
                                            </div>
                                            <button type="submit" class="btn btn-block btn-primary">Добавить</button>
                                        </form>
                                    </div>
                                    <div class="col-4 mb-3 p-3 ">
                                        <span
                                            class="row h5 no-gutters border-bottom">Изменить привязку социальных сетей</span>
                                        <form action="{{route('users.profile.update',['tab'=>'list-home'])}}"
                                              method="post">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-block btn-primary">Изменить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade"
                                 id="list-messages"
                                 role="tabpanel"
                                 aria-labelledby="list-settings-list">
                                3
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 border">
                        ...
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="application/javascript" defer>
        window.addEventListener("load", function (event) {
            $(function () {
                var hash = window.location.hash;
                hash && $('.list-group a[href="' + hash + '"]').tab('show');
                $('.list-group a').click(function (e) {
                    $(this).tab('show');
                    window.location.hash = this.hash;
                });
            });
        })
    </script>
@endpush

