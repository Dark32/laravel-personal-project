<nav id="sidebar">
    <ul class="list-unstyled">
        @foreach ($links as $link)
            @isset($link['links'])
                <li>
                    <a href="#sidebar-submenu-{{$loop->depth}}-{{$loop->index}}" data-toggle="collapse"
                       aria-expanded="false"
                       class="dropdown-toggle collapsed">{{$link['label']}}</a>
                    <ul class="collapse list-unstyled" id="sidebar-submenu-{{$loop->depth}}-{{$loop->index}}">
                        @include('fragment.sidebar', ['links'=>$link['links']])
                    </ul>
                </li>
                @continue
            @endif
            @isset($link['href'])
                <li >
                    <a href="{{$link['href']}}">{{$link['label']}}</a>
                </li>
            @else
                <li>{{$link['label']}}</li>
            @endif
        @endforeach
    </ul>
</nav>
