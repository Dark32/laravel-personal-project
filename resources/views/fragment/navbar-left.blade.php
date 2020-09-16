<li class="nav-item active">
    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="{{route('users.list')}}">Пользователи</a>
</li>
@can('admin.panel')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.panel')}}">{{__('admin.panel')}}</a>
    </li>
@endcan

