@extends('layouts.admin')
@php
    /**
     * @var \App\UserIpActivity[] $activities
     * @var string $desc
     * @var string $column
     */
@endphp
@section('content')
    <div class="table-responsive">

        <form class="form" method="get" action="{{ route('admin.activity.list',['column'=>'id','desc'=>'desc'])}}">
        <table class="table table-striped table-bordered ">
            <caption>Список активности</caption>
            <thead class="thead-dark">
            <tr>
                <th scope="col"  class="col-1 text-break">id <br>
                    <a href="{{route('admin.activity.list',['column'=>'id','desc'=>'desc'])}}"
                       class="badge @if($column ==='id' && $desc === 'desc')badge-success @else badge-secondary @endif">@include('icons.bi-chevron-down')</a>
                    <a href="{{route('admin.activity.list',['column'=>'id','desc'=>'asc'])}}"
                       class="badge @if($column ==='id' && $desc === 'asc')badge-success @else badge-secondary @endif">@include('icons.bi-chevron-up')</a>
                </th>
                <th scope="col" class="col-1 text-break">user_id <br>
                    <a href="{{route('admin.activity.list',['column'=>'user_id','desc'=>'desc'])}}"
                       class="badge @if($column ==='user_id' && $desc === 'desc')badge-success @else badge-secondary @endif">@include('icons.bi-chevron-down')</a>
                    <a href="{{route('admin.activity.list',['column'=>'user_id','desc'=>'asc'])}}"
                       class="badge @if($column ==='user_id' && $desc === 'asc')badge-success @else badge-secondary @endif">@include('icons.bi-chevron-up')</a>
                </th>
                <th scope="col" class="col-2 text-break">user</th>
                <th scope="col" class="col-2 text-break">email</th>
                <th scope="col" class="col-1 text-break">event
                    <a href="{{route('admin.activity.list',['column'=>'event','desc'=>'desc'])}}"
                       class="badge @if($column ==='event' && $desc === 'desc')badge-success @else badge-secondary @endif">@include('icons.bi-chevron-down')</a>
                    <a href="{{route('admin.activity.list',['column'=>'event','desc'=>'asc'])}}"
                       class="badge @if($column ==='event' && $desc === 'asc')badge-success @else badge-secondary @endif">@include('icons.bi-chevron-up')</a>
                </th>
                <th scope="col" class="col-1 text-break">ip
                    <a href="{{route('admin.activity.list',['column'=>'ip','desc'=>'desc'])}}"
                       class="badge @if($column ==='ip' && $desc === 'desc')badge-success @else badge-secondary @endif">@include('icons.bi-chevron-down')</a>
                    <a href="{{route('admin.activity.list',['column'=>'ip','desc'=>'asc'])}}"
                       class="badge @if($column ==='ip' && $desc === 'asc')badge-success @else badge-secondary @endif">@include('icons.bi-chevron-up')</a>
                </th>
                <th scope="col" class="col-2 text-break">extra</th>
                <th scope="col" class="col-2 text-break">created_at
                    <a href="{{route('admin.activity.list',['column'=>'created_at','desc'=>'desc'])}}"
                       class="badge @if($column ==='created_at' && $desc === 'desc')badge-success @else badge-secondary @endif">@include('icons.bi-chevron-down')</a>
                    <a href="{{route('admin.activity.list',['column'=>'created_at','desc'=>'asc'])}}"
                       class="badge @if($column ==='created_at' && $desc === 'asc')badge-success @else badge-secondary @endif">@include('icons.bi-chevron-up')</a></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <a href="{{route('admin.activity.list',['column'=>$column, 'desc'=>$desc])}}" class="btn btn-danger  btn-sm">x</a>
                </td>
                <td></td>
                <td><input type="text" class="form-control form-control-sm" name="user" placeholder="user" value="{{request('user')}}"></td>
                <td><input type="text" class="form-control form-control-sm" name="email" placeholder="email" value="{{request('email')}}"></td>
                <td><input type="text" class="form-control form-control-sm" name="event" placeholder="event" value="{{request('event')}}"></td>
                <td><input type="text" class="form-control form-control-sm" name="ip" placeholder="ip" value="{{request('ip')}}"></td>
                <td></td>
                <td> <button type="submit" class="btn btn-primary  btn-sm">Фильтровать</button></td>
            </tr>
            @foreach ($activities as $activity)
                <tr>
                    <td class=" text-break">{{$activity->id}}</td>
                    <td class=" text-break">{{$activity->user_id}}</td>
                    <td class=" text-break">
                        @isset($activity->user )
                            <a href="{{route('admin.activity.list',['column'=>$column, 'desc'=>$desc, 'user'=>$activity->user->name])}}">{{$activity->user->name}}</a>
                        @endif</td>
                    <td class=" text-break">
                        @isset($activity->user )
                            <a href="{{route('admin.activity.list',['column'=>$column, 'desc'=>$desc, 'email'=>$activity->user->email])}}">{{$activity->user->email}}</a>
                        @endif</td>
                    <td class=" text-break">
                        <a href="{{route('admin.activity.list',['column'=>$column, 'desc'=>$desc, 'event'=>$activity->event])}}">{{$activity->event}}</a>
                    </td>
                    <td class="text-break">
                        <a href="{{route('admin.activity.list',['column'=>$column, 'desc'=>$desc, 'ip'=>$activity->ip])}}">{{$activity->ip}}</a>
                    </td>
                    <td class="text-break">{{$activity->extra}}</td>
                    <td class="text-break">{{$activity->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </form>
    </div>
    {{ $activities->links() }}
@endsection
