<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>        
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/bootstrap5/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme11/style.css') }}">      
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/bootstrap5/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/common.css') }}">       
</head>
<body>
    <main>
        <div class="wrapper">
            <div class="content-warpper">
                <header id="header " class="fixed-header header-scrolled">
                    <div class="container ">
                        
                        <nav class="navbar fixed-top navbar-expand-lg ">
                            <div class="container">
                            <h1 class="logoimage me-auto">
                                <a src="{{ route('front.user.detail.view', getParam()) }}" class=""><img src="{{ isset($userBs->logo) ? asset('assets/front/img/user/' . $userBs->logo) : asset('assets/front/img/profile/lgoo.png') }}" height="90px" width="90px"/></a>
                             </h1>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                                </button>
                
                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('front.user.detail.view', getParam()) }}#hero-section">Home</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.user.detail.view', getParam()) }}#about-me">About</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.user.detail.view', getParam()) }}#services">Services</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.user.detail.view', getParam()) }}#portfolio">Portfolio</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.user.detail.view', getParam()) }}#blogs">Blog</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="{{ route('front.user.detail.view', getParam()) }}#">Team</a>
                                    </li> --}}
                                    {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropdown link
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                    </li> --}}
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.user.detail.view', getParam()) }}#contact">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        @if (is_array($userPermissions) &&
                                        is_array($packagePermissions) &&
                                        in_array('Appointment', $userPermissions) &&
                                        in_array('Appointment', $packagePermissions))
                                      <li class="nav-item ezprofile-login-button">
                                          @if (!Auth::guard('customer')->check())
                                                <a class="btn btn-outline-info" href="{{ route('customer.login', getParam()) }}" style="color:white"
                                                class="main-btn login-btn">{{ $keywords['Login'] ?? 'Login' }}</a>
                                                @else
                                                <div class="dropdown show">
                                                    <a class="nav-link dropdown-toggle filled-btn" href="#" role="button" id="dropdownMenuLink"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{ Auth::guard('customer')->user()->username }}
                                                    </a>
                                                    <li class="nav-item" aria-labelledby="dropdownMenuLink">
                                                    <a class="nav-link"
                                                        href="{{ route('customer.dashboard', getParam()) }}">{{ $keywords['Dashboard'] ?? __('Dashboard') }}</a>
                                                    <a class="nav-link"
                                                        href="{{ route('customer.logout', getParam()) }}">{{ $keywords['Signout'] ?? __('Sign out') }}</a>
                                                    </li>
                                                </div>
                                                @endif
                                            </li>
                                           @endif                                              
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                
                </header>
              
                @if (request()->routeIs('front.user.service.detail') ||
                        request()->routeIs('front.user.blog.detail') ||
                        request()->routeIs('front.user.portfolio.detail'))
                <div class="pt-120 pb-70" style="padding-top:120px">
                @endif
                @yield('content')
                @if (request()->routeIs('front.user.service.detail') ||
                        request()->routeIs('front.user.blog.detail') ||
                        request()->routeIs('front.user.portfolio.detail'))
                </div>
                @endif

                <footer id="footer">
                    <div class="footer">
                        @if (is_array($userPermissions) && in_array('Footer Mail', $userPermissions))
                        <div class="footer-all">
                            <span>{{ $keywords['Stay_Connected'] ?? 'Stay Connected' }}</span>
                            <a class="section-head" style="color:#777777" href="mailto:{{ $user->email }}"><h4>{{ $user->email }}</h4></a>
                        </div>
                        @endif
                    </div>                
                </footer>
            </div>
        </div>
    </main>
    <script src="{{asset('assets/front/css/profile/bootstrap5/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/front/css/profile/bootstrap5/jquery.js')}}"></script>
    <script src="{{asset('assets/front/css/profile/bootstrap5/slick.min.js')}}"></script>
</body>
</html>