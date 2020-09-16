<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('scripts')
</head>
<body>
<div id="app">
    @hasSection('navbar')
        @yield('navbar')
    @else
        @include('fragment.navbar')
    @endif
    @hasSection('header')
        @yield('header')
    @else
        @include('fragment.header')
    @endif
    @hasSection('navbar-side')
        @yield('navbar-side')
    @else
        @include('fragment.navbar-side')
    @endif
    <div class="container-fluid bg-light h-auto">
        <div class="row">
            <div class="col-2 pl-0" id="sidebar">
                @hasSection('sidebar')
                    @yield('sidebar')
                @else
                    @include('fragment.sidebar',[
                            'index' => '',
                            'links'=>[
                                ['href'=>'#', 'label'=>'test1'],
                                ['label'=>'test2', 'links'=>[
                                    ['href'=>'#', 'label'=>'test2 1'],
                                    ['href'=>'#', 'label'=>'test2 2'],
                                    ['href'=>'#', 'label'=>'test2 3'],
                                    ['label'=>'test2 4'],
                                    ['href'=>'#', 'label'=>'test2 5'],
                                ]],
                                ['label'=>'test3', 'links'=>[
                                    ['href'=>'#', 'label'=>'test3 1'],
                                    ['href'=>'#', 'label'=>'test3 2'],
                                    ['href'=>'#', 'label'=>'test3 3'],
                                    ['label'=>'test3 4'],
                                    ['href'=>'#', 'label'=>'test3 5'],
                                    ['label'=>'test3', 'links'=>[
                                        ['href'=>'#', 'label'=>'test3 1'],
                                        ['href'=>'#', 'label'=>'test3 2'],
                                        ['href'=>'#', 'label'=>'test3 3'],
                                        ['label'=>'test3 4'],
                                        ['href'=>'#', 'label'=>'test3 5'],
                                ]],
                                ]],
                                ['href'=>'#', 'label'=>'test4'],
                                ['label'=>'test5'],
                                ['href'=>'#', 'label'=>'test6'],
                                ]])
                @endif

                    @include('fragment.online-users')
            </div>
            <div role="main" class="col">
                @yield('content')
            </div>
        </div>
    </div>
        @hasSection('footer')
            @yield('footer')
        @else
            @include('fragment.footer')
        @endif
</div>
</body>
</html>
