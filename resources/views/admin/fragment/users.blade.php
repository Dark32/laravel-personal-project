@php
/**
 * @var \App\User[] $users
 **/
@endphp

<ul class="list-group list-group-flush">
@foreach ($users as $user)
    <li class="list-group-item bg-transparent">
        @can('admin.user.edit')
        <a href="{{route('admin.user.edit', $user)}}">
            @include('icons.bi-pencil-square')
        </a>
        @endcan
        {{$user->name}}
    </li>

@endforeach
</ul>
