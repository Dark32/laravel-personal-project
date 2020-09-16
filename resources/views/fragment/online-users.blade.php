@php
    /**
     * @var Session[] $userOnline
     * @var int $userOnlineCount
     * @var int $guestOnlineCount
    */
use App\User;
@endphp
<div class="card  border-0 bg-light">
    <div class="card-header rounded-0">
        Пользователи за 5 минут:
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">Гостей: {{$guestOnlineCount}}</div>
            <div class="col-12">Пользователей: {{$userOnlineCount}}</div>
            <div class="col-12">
            @foreach($userOnline as $userSession)
                <a href="{{route('users.show', ['user'=>$userSession->user])}}">{{$userSession->user->name}}</a>
            @endforeach
            </div>
        </div>
    </div>
</div>

<br>

