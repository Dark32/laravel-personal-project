@extends('layouts.admin')
@php
    /**
     * @var \App\SocialNetworkBadge[] $socialNetworkBadges
     */
@endphp
@section('content')
    <div class="table-responsive">
        <a class='btn btn-primary  btn-sm' href="{{route('admin.social-network-badge.create')}}"><i
                class="fas fa-plus-square"></i>Создать</a>
        <table class="table table-striped table-bordered ">
            <caption>Список значков соц сетей</caption>
            <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-break col-1"> Ид</th>
                <th scope="col" class="text-break col-1"> Slug</th>
                <th scope="col" class="text-break col-1"> Имя</th>
                <th scope="col" class="text-break col-1"> Описание</th>
                <th scope="col" class="text-break col-1"> Шаблон</th>
                <th scope="col" class="text-break col-1"> Иконка</th>
                <th scope="col" class="text-break col-1"> Управление</th>

            </tr>
            </thead>
            <tbody>
            @foreach($socialNetworkBadges as $socialNetworkBadge)
                <tr>
                    <td class="text-break">{{$socialNetworkBadge->id}}</td>
                    <td class="text-break">{{$socialNetworkBadge->slug}}</td>
                    <td class="text-break">{{$socialNetworkBadge->name}}</td>
                    <td class="text-break">{{$socialNetworkBadge->description}}</td>
                    <td class="text-break">{{$socialNetworkBadge->pattern}}</td>
                    <td class="text-break">{{$socialNetworkBadge->icon}} <br> @include('fragment.social-network-badge.badge-icon', ['badge'=>$socialNetworkBadge]) </td>
                    <td class="text-break">
                        <form
                            action="{{route('admin.social-network-badge.destroy',['social_network_badge'=>$socialNetworkBadge])}}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <a class='btn btn-success  btn-sm'
                               href="{{route('admin.social-network-badge.edit',['social_network_badge'=>$socialNetworkBadge])}}">
                                <i class="fas fa-wrench"></i>
                            </a>
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$socialNetworkBadges->links()}}
    </div>
@endsection
