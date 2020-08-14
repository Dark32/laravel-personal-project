<nav class="sidebar border">
    <div class="sidebar-sticky " id="sidebar">
        <ul class="nav flex-column">
            @foreach ($links as $link)

                @isset($link['href'])
                    <li class="nav-item">
                        <a class="nav-link active" href="{{$link['href']}}">{{$link['label']}}</a>
                    </li>
                    @else
                    <li class="nav-item">{{$link['label']}}</li>
                @endif

            @endforeach

        </ul>
    </div>
</nav>
