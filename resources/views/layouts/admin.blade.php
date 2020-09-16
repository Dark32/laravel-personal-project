@extends('layouts.base')

@section('sidebar')
    <div class="admin-sidebar">
    @include('fragment.sidebar',
            [
                'index'=>'',
                'links'=>[
                    [ 'href'=>route('admin.panel'), 'label'=>__('admin.panel') ],
                    [ 'href'=>route('admin.user.list'), 'label'=>__('admin.user.list') ],
                    [ 'href'=>route('admin.role.list'), 'label'=>__('admin.role.list') ],
                    [ 'href'=>route('admin.permission.list'), 'label'=>__('admin.permission.list') ],
                    [ 'href'=>route('admin.activity.list'), 'label'=>__('admin.activity.list') ],
                    [ 'href'=>route('admin.social-network-badge.index'), 'label'=>__('admin.social-network-badge.index') ],
                    [ 'href'=>route('admin.user-social-network-badge.index'), 'label'=>__('admin.user-social-network-badge.index') ],
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
