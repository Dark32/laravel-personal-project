@extends('layouts.base')
@php
    /**
    * @var \App\User $user
    */
@endphp

@section('content')
    <profile-edit
        fetch-url="{{ route('users.profile.vue') }}"
        update-name-and-pass-url="{{route('users.profile.updateNameAndPass')}}"
        :tabs="[
        {slug: '#tab-home',  name: 'Основные настройки'},
        {slug: '#tab-profile',  name: 'Настройки профиля'},
        {slug: '#tab-social',  name: 'Настройки социальных сетей'},
       ]"
    >

    </profile-edit>

@endsection

@push('scripts')

@endpush

