<nav id="sidebar" class="navbar navbar-expand-lg">
    <ul class="nav flex-column list-unstyled">
        @foreach ($links as $link)
            @isset($link['links'])
                <li class="nav-item">
                    <a href="#sidebar-submenu-{{$index}}-{{$loop->index}}" data-toggle="collapse"
                       aria-expanded="false"
                       class="dropdown-toggle collapsed">{{$link['label']}}</a>
                    <ul class="collapse list-unstyled" id="sidebar-submenu-{{$index}}-{{$loop->index}}">
                        @include('fragment.sidebar',
                            [
                              'links'=>$link['links'],
                              'index'=>$index.'-'.$loop->index,
                             ]
                                )
                    </ul>
                </li>
                @continue
            @endif
            @isset($link['href'])
                <li class="nav-item">
                    <a href="{{$link['href']}}">{{$link['label']}}</a>
                </li>
            @else
                <li class="nav-item">{{$link['label']}}</li>
            @endif
        @endforeach
    </ul>
</nav>
