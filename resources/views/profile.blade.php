@extends('layouts.app')
@section('content')
    <div class="container px-lg-5 ">
        <div class="row mx-lg-n5">
            <div class="col-md-1 col-sm-1 col-xl-1 py-3 px-lg-1 border bg-light ">Профиль:</div>
            <div class="col py-3 px-lg-5 border bg-light ">{{$user->name}}</div>
        </div>
        <div class="row mx-lg-n5">
            <div class="col py-3 px-lg border bg-light">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
@endsection
