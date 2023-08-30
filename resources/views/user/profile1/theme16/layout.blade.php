<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    @yield('og-meta')
    <title>{{ isset($userBs) && $userBs->website_title ? $userBs->website_title : '' }} - @yield('tab-title')</title>

    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme16/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/font-awesome-4.7.min.css') }}">    
    <link rel="stylesheet" href="{{ asset('assets/front/css/slick.min.css') }}">          
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <main>
        <div class="wrapper">
            <div class="content-warpper">
                <header id="header " class="fixed-header sticky-top header-scrolled">
                    <div class="container ">
                        
                        <nav class="navbar  navbar-expand-lg ">
                            <div class="container">
                            <h1 class="logoimage me-auto">
                                <a class="navbar-brand logo_h" href="{{ route('front.user.detail.view', getParam()) }}"><img class="logoimage"
                                    style="height:50px"
                                    src="{{ isset($userBs->logo)
                                        ? asset('assets/front/img/user/' . $userBs->logo)
                                        : asset('assets/front/css/profile/theme14/img/logo.png') }}"
                                    alt=""></a>                           
                             </h1>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
                                </button>
                
                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{ route('front.user.detail.view', getParam()) }}#hero">Home</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="{{ route('front.user.detail.view', getParam()) }}#about-me">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="{{ route('front.user.detail.view', getParam()) }}#service">services</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="{{ route('front.user.detail.view', getParam()) }}#portfolio">Portfolio</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="{{ route('front.user.detail.view', getParam()) }}#blog">Blog</a>
                                        </li>
                                                                            
                                        <li class="nav-item">
                                        <a class="nav-link" href="{{ route('front.user.detail.view', getParam()) }}#contact">Contact</a>
                                        </li>
                                    <li class="nav-item">
                                    <a class="btn btn-outline-info" href="#">Get Started</a>
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                
                </header>                                           
            </div>
        </div>
    </main>

    @if (request()->routeIs('front.user.service.detail') ||
        request()->routeIs('front.user.blog.detail') ||
        request()->routeIs('front.user.portfolio.detail'))
    <div class="pt-1200 pb-70" style="color:#fff;padding-top:140px">
    @endif
    @yield('content')
    @if (request()->routeIs('front.user.service.detail') ||
        request()->routeIs('front.user.blog.detail') ||
        request()->routeIs('front.user.portfolio.detail'))
    </div>
    @endif
    
    <footer id="footer">
        <div class="footer">
            <div class="footer-all">
                @if (is_array($userPermissions) && in_array('Footer Mail', $userPermissions))
                <span>{{ $keywords['Stay_Connected'] ?? 'Stay Connected' }}</span><br>
                <a href="mailto:{{ $user->email }}"><span>{{ $user->email }}</span></a>
                @endif
            </div>           
        </div>          
    </footer>    

    <script src="{{ asset('assets/front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/front/js/slick.min.js') }}"></script>   
</body>
</html>