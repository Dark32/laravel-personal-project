@extends('layouts.base')

@section('sidebar')
    <div class="admin-sidebar">
    @include('fragment.sidebar',
            [
                'index'=>'',
                'links'=>[
                    [ 'href'=>route('admin.panel'), 'label'=>__('admin.panel') ]
]
            ]
            )
    </div>
@endsection

@section('header')
    <div class="container-fluid" id="header-admin">
        <div class="row align-items-center">
            <div class="col-2 logo">
                <img src="png/logo-admin.png" alt="">
            </div>
            <div class="col-10">
                <h1>
                    <span>Админ панель</span>
                </h1>
            </div>
        </div>
    </div>
@endsection
