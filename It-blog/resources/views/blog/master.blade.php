<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', \App\Base::$name)</title>
    <link rel="icon" href="{{ asset('dashboard/img/logos/fav.png') }}">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    @yield('theme')
</head>
<body>
<div class="py-3 mb-5" id="themeHeaderSpacer"></div>

{{-- Navigation --}}
@include('blog.navbar')

<div class="container">
    <div class="row justify-content-center g-5">

        {{-- Content --}}
        <div class="col-12 col-lg-6">
            @yield('content')
        </div>

        {{-- <div class="d-block d-lg-none d-flex justify-content-center"> --}}
        {{-- SideBar --}}
        <div class="col-12 col-lg-4 border-start" id="sidebarColumn">
            <div class="position-sticky" style="top: 100px">
                <div class="mb-5 sidebar">


                    <div id="search" class="mb-5">
                        <form action="">
                            <div class="d-flex search-box">
                                <input type="text" class="form-control flex-shrink-1 me-2 search-input" placeholder="Search Anything">
                                <button class="btn btn-primary search-btn">
                                    <i class="feather-search d-block d-xl-none"></i>
                                    <span class="d-none d-xl-block">Search</span>
                                </button>
                            </div>

                        </form>

                    </div>

                    <div id="category">
                        <h4 class="fw-bolder">Category Lists</h4>
                        <ul class="list-group">
                            @foreach ($categories as $category)
                                <li class="list-group-item">
                                    <a href="#" class="shadow bg-info">{{ $category->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    @yield('paginate-place')
                </div>
                <div class="d-none d-lg-block">
                </div>
            </div>
        </div>

        <div class="col-12 border-bottom mb-0 mt-3">
        </div>
        
        <div class="col-12">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center my-4">
                    <div class="text-center">
                        Copyright © 2021 IT News
                    </div>
                    <a href="#themeHeaderSpacer" class="btn btn-primary">
                        <i class="feather-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/theme.js') }}"></script>
@yield('foot')

</body>
</html>
