<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/sb-admin.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        @guest()

        @else
            @include('layouts.includes.sidebar')
        @endguest
        <div id="content-wrapper" class="d-flex flex-column" style="padding-top:0;">
            <!-- Main Content -->
            <div id="content" style="padding-bottom:50px;">
                @guest()

                @else
                    @include('layouts.includes.navbar')
                @endguest
                <div class="container-fluid" style="position:relative;">
                        <div class="row">
                            <div class="col-md-8">
                                <h2>@yield('title')</h2>
                            </div>
                            <div class="col-md-4 text-right">
                                <small>@yield('breadcrumbs')</small>
                            </div>
                        </div>
                        @if(\Session::has('status'))
                            <div class="alert alert-{{ \Session::get('status')['variant'] }} alert-dismissible fade show">
                                {{ \Session::get('status')['msg'] }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="container">
                            <div class="justify-content-center">
                                    <div class="card">
                                        <div class="card-body">
                                            @yield('content')
                                        </div>
                                    </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.includes.modals.changepassword')
    <script src="/js/jquery.js"></script>
    <script src="/js/sb-admin.min.js"></script>
    <script src="/js/chart.min.js"></script>
    @yield('footer-scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
