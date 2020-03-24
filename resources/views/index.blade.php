@php
    use App\AppSetting;
    $settingApp = AppSetting::first();
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $settingApp->name }} | {{ $settingApp->tagline }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts awesome -->
    <link rel="stylesheet" href="{{ asset('/css/font-awesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    @yield('style')
</head>

<body>
    <div class="wrapper">
        <div class="left-side bg-white">
            <div class="left-side--logo">
                <div class="left-side--logo-image">
                    <a href="">
                        <img src="/{{ $settingApp->logo }}" alt="" class="navbar-brand">
                    </a>
                </div>
                <div class="left-side--logo-icon">
                    <button type="button" name="button" class="btn btn-light bg-white d-none btn-responsive"><i class="fas fa-bars"></i></button>
                </div>
            </div>
            <nav class="left-side--menu scroll nano">
                <ul class="nano-content">
                    <li class="{{ Request::is('/') ? 'active' : false }}"><a href="{{ url('/') }}"><i class="fas fa-home" style="margin-right:35px;"></i> Dashboard <i class="fas fa-angle-right"></i> </a></li>
                    <li class="{{ Request::is('device') ? 'active' : false }}">
                        <a href="{{ url('/device') }}">
                            <i class="fas fa-toolbox"></i> Device
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </li>
                    <li class="{{ Request::is('instructor') ? 'active' : false }}">
                        <a href="{{ url('instructor') }}">
                            <i class="fas fa-user-tie" style="margin-right: 43px;"></i> Instructor
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </li>
                    <li class="{{ Request::is('customer') ? 'active' : false }}">
                      <a href="{{ url('customer') }}">
                        <i class="fas fa-male" style="margin-right: 53px;"></i> Customer
                        <i class="fas fa-angle-right"></i>
                      </a>
                    </li>
                    <li class="{{ Request::is('sales') ? 'active' : false }}">
                        <a href="{{ url('sales') }}">
                            <i class="fas fa-clipboard-check" style="margin-right: 49px;"></i> Sales 
                            <i class="fas fa-angle-right"></i> 
                        </a>
                    </li>
                    <li class="{{ Request::is('modul') ? 'active' : false }}">
                        <a href="{{ url('modul') }}">
                            <i class="fas fa-book" style="margin-right: 49px;"></i> Modul 
                            <i class="fas fa-angle-right"></i> 
                        </a>
                    </li>
                    <li class="{{ Request::is('curiculum') ? 'active' : false }}">                            
                        <a href="{{ url('curiculum') }}">                                    
                            <i class="fas fa-atlas" style="margin-right: 49px;"></i> Curiculum 
                            <i class="fas fa-angle-right"></i> 
                        </a>
                    </li>
                    <li class="{{ Request::is('event') ? 'active' : false }}">                            
                        <a href="{{ url('event') }}">                                    
                            <i class="fas fa-calendar" style="margin-right: 49px;"></i> Event 
                            <i class="fas fa-angle-right"></i> 
                        </a>
                    </li>
                    {{-- <li class="{{ Request::is('silabus') ? 'active' : false }}">
                        <a href="{{ url('silabus') }}">
                            <i class="fas fa-book-open" style="margin-right: 47px;"></i> Silabus 
                            <i class="fas fa-angle-right"></i> 
                        </a>
                    </li> --}}
                    <li>
                        <a href="">
                            <i class="fas fa-chalkboard" style="margin-right: 47px;"></i> Ujian 
                            <i class="fas fa-angle-right"></i> 
                        </a>
                    </li>
                    <li class="{{ Request::is('category-project') ? 'active' : false }}">
                        <a href="{{ url('category-project') }}">
                            <i class="fas fa-project-diagram" style="margin-right: 49px;"></i> Category project 
                            <i class="fas fa-angle-right"></i> 
                        </a>
                    </li>
                    <li class="{{ Request::is('project') ? 'active' : false }}">
                        <a href="{{ url('project') }}">
                            <i class="fas fa-project-diagram" style="margin-right: 49px;"></i> Project 
                            <i class="fas fa-angle-right"></i> 
                        </a>
                    </li>
                    <li class="{{ Request::is('information') ? 'active' : false }}">                            
                        <a href="{{ url('information') }}">
                            <i class="fas fa-info-circle" style="margin-right: 54px;"></i> Information 
                            <i class="fas fa-angle-right"></i> 
                        </a>
                    </li>
                    <li class="{{ Request::is('category-feedback') ? 'active' : false }}">                        
                        <a href="{{ url('category-feedback') }}">
                            <i class="fas fa-comment-alt" style="margin-right: 57px;"></i>Category FeedBack 
                            <i class="fas fa-angle-right"></i> 
                        </a>
                    </li>
                    <li class="{{ Request::is('feedback') ? 'active' : false }}">                        
                        <a href="{{ url('feedback') }}">
                            <i class="fas fa-comment-alt" style="margin-right: 57px;"></i>FeedBack 
                            <i class="fas fa-angle-right"></i> 
                        </a>
                    </li>
                    <li class="{{ Request::is('app-setting') ? 'active' : false }}">
                        <a href="{{ url('app-setting') }}">
                            <i class="fas fa-cogs" style="margin-right: 49px;"></i> Application setting 
                            <i class="fas fa-angle-right"></i> 
                        </a>
                    </li>
                    <li class="{{ Request::is('blog') ? 'active' : false }}">
                        <a href="{{ url('blog') }}">
                            <i class="fas fa-blog" style="margin-right: 57px;"></i> Blog 
                            <i class="fas fa-angle-right"></i> 
                        </a>
                    </li>
                    <li class="{{ Request::is('frontend/home') ? 'active' : false }}">
                        <a href="{{ url('frontend/home') }}">
                            <i class="fas fa-desktop" style="margin-right: 57px;"></i> Frontend home 
                            <i class="fas fa-angle-right"></i> 
                        </a>
                    </li>
                    <li class="{{ Request::is('frontend/program') ? 'active' : false }}">
                        <a href="{{ url('frontend/program') }}">
                            <i class="fas fa-desktop" style="margin-right: 57px;"></i> Frontend program 
                            <i class="fas fa-angle-right"></i> 
                        </a>
                    </li>
                    <li class="{{ Request::is('frontend/teacher') ? 'active' : false }}">
                        <a href="{{ url('frontend/teacher') }}">
                            <i class="fas fa-desktop" style="margin-right: 57px;"></i> Frontend teacher 
                            <i class="fas fa-angle-right"></i> 
                        </a>
                    </li>
                    <li class="{{ Request::is('frontend/contact') ? 'active' : false }}">
                        <a href="{{ url('frontend/contact') }}">
                            <i class="fas fa-desktop" style="margin-right: 57px;"></i> Frontend contact 
                            <i class="fas fa-angle-right"></i> 
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <main class="main-side">
            <div class="main-side--bg">
                <div class="row">
                    @yield('header')
                </div>
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </main>
        <div class="lds-hourglass loading  d-none"></div>
    </div>
</body>

@stack('script')

</html>
