@extends('layouts.admin')
@php
    /**
     * @var \App\UserSocialNetworkBadge[] $badges
     */
@endphp
@section('content')
    <div class="table-responsive">
        <a class='btn btn-primary btn-sm' href="{{route('admin.user-social-network-badge.create')}}"><i
                class="fas fa-plus-square"></i>Создать</a>
        <table class="table table-striped table-bordered ">
            <caption>Список значков соц сетей</caption>
            <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-break col-1"> Ид</th>
                <th scope="col" class="text-break col-1"> Пользователь</th>
                <th scope="col" class="text-break col-1"> Социальная сеть</th>
                <th scope="col" class="text-break col-3"> ссылка</th>
                <th scope="col" class="text-break col-1"> управление</th>

            </tr>
            </thead>
            <tbody>
            @foreach($badges as $badge)
                <tr>
                    <td class="text-break">{{$badge->id}}</td>
                    <td class="text-break" data-user_id="{{$badge->user_id}}"> {{$badge->user->name}}</td>
                    <td class="text-break"
                        data-social_network_badge_id="{{$badge->social_network_badge_id}}">@include('fragment.social-network-badge.badge-icon',['badge'=>$badge->socialBadge]) {{$badge->socialBadge->name}}</td>
                    <td class="text-break">{{$badge->link}}</td>
                    <td class="text-break">
                        <form
                            action="{{route('admin.user-social-network-badge.destroy',['user_social_network_badge'=>$badge])}}"
                            method="POST">

                            @csrf
                            @method('DELETE')
                            <a class='btn btn-success btn-sm'
                               href="{{route('admin.user-social-network-badge.edit',['user_social_network_badge'=>$badge])}}">
                                <i class="fas fa-wrench"></i>
                            </a>
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$badges->links()}}
    </div>
@endsection
