<nav class="navbar navbar-expand-lg navbar-light bg-light bg-white shadow-sm" style="background-color: #e3f2fd;"
     id='sidebar-top'>
    <a class="navbar-brand" href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop"
            aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTop">
        <ul class="navbar-nav mr-auto">
            @hasSection('navbar-left')
                @yield('navbar-left')
            @else
                @include('fragment.navbar-left')
            @endif

        </ul>

        <ul class="navbar-nav ml-auto">
            @hasSection('navbar-right')
                @yield('navbar-right')
            @else
                @include('fragment.navbar-right')
            @endif
        </ul>
        @include('fragment.search')
    </div>
</nav>
