@php
    /**
     * @var \App\Permission[] $permissions
     **/
@endphp

<ul class="list-group list-group-flush">
    @foreach ($permissions as $permission)
        <li class="list-group-item bg-transparent">
            @can('admin.permission.edit')
                <a href="{{route('admin.permission.edit', $permission)}}">@include('icons.bi-pencil-square')</a>
            @endcan

            {{$permission->name}}
        </li>

    @endforeach
</ul>
