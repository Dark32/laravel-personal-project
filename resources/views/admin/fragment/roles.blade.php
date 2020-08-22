@php
    /**
     * @var \App\Role[] $roles
     **/
@endphp

<ul class="list-group list-group-flush">
    @foreach ($roles as $role)
        <li class="list-group-item bg-transparent">
            @can('admin.role.edit')
                <a href="{{route('admin.role.edit', $role)}}">
                    @include('icons.bi-pencil-square')
                </a>
            @endcan
            {{$role->name}}
        </li>

    @endforeach
</ul>
