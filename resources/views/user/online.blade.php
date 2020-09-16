@php
    use Carbon\Carbon;
        /**
         * @var \App\User $user
         */

@endphp
<div>
    @if($user->lastActivity() !== false)
        @if($user->isOnline())
            <span class="badge badge-success">Online</span>
        @else
            <span class="badge badge-info">Offline</span>
        @endif
    @else
        <span class="badge badge-info">Offline</span>
    @endif

    @if($user->lastActivity() === false)
            <span class="text-black-50">Активность: Не был активин</span>
        @else
            <span class="text-black-50">Активность: {{$user->lastActivity()}} минут назад</span>
        @endif
</div>
