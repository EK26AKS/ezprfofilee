<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($userBs) && $userBs->website_title ? $userBs->website_title : '' }} - @yield('tab-title')</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon"
        href="{{ !empty($userBs->favicon) ? asset('assets/front/img/user/' . $userBs->favicon) : '' }}"
        type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/front/css/pignose.calendar.min.css') }}">
    <!--====== PLUGIN css ======-->
    <link rel="stylesheet" href="{{ asset('assets/front/css/plugin.min.css') }}">
    <!--====== COMMON css ======-->
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/common.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/whatsapp.min.css') }}">

    <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
    <script src="{{ asset('assets/front/js/profile/theme10/bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme10/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme10/theme10.css') }}">

    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />			-->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    {{-- @php
        if (!empty($userBs->base_color)) {
            $baseColor = $userBs->base_color;
        } else {
            $baseColor = 'F57236';
        }
        if (!empty($userBs->secondary_base_color)) {
            $secBaseColor = $userBs->secondary_base_color;
        } else {
            $secBaseColor = 'FEAF2F';
        }
    @endphp --}}

    @php
        // if (!empty($userBs->base_color)) {
        //     $baseColor = $userBs->base_color;
        // } else {
        //     $baseColor = '';
        // }
        
        $holidays = App\Models\User\UserHoliday::where('user_id', $user->id)
            ->pluck('date')
            ->toArray();
        $dats = [];
        foreach ($holidays as $value) {
            $dats[] = Carbon\Carbon::parse($value)->format('Y-m-d');
        }
        $holidays = $dats;
        
        $weekends = App\Models\User\UserDay::where('user_id', $user->id)
            ->where('weekend', 1)
            ->pluck('index')
            ->toArray();
        
    @endphp
    {{-- <link rel="stylesheet" href="{{ asset('assets/front/css/profile/common-base-color.php?color=' . $baseColor) }}"> --}}

    <style>
        :root {
            --color-primary: <?='#'. $userBs->base_color ?>
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="container-fluid">
        <div class="main">
            <!-- Top Navigation Menu -->
            <div class="topnav">
                <a href="#home" class="active">Logo</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>

            <div class="sidebar" id="sidebar">
                <div class="sidebar-barnd">
                    <a href="" class="sidebar-logo">
                    <img src="{{ isset($userBs->logo)
                            ? asset('assets/front/img/user/' . $userBs->logo)
                            : asset('assets/front/img/profile/lgoo.png') }}" height="90px"
                        width="90px" alt="">
                    </a>
                </div>
                <div class="sidebar-list">
                    <div class="list-item">
                        <ul class="nav-bar">
                            <li class="item-list"><a href="{{ route('front.user.detail.view', getParam()) }}" class="item-link">Home</a></li>
                            <li class="item-list"><a href="{{ route('front.user.detail.view', getParam()) }}#services" class="item-link">Services</a></li>
                            <li class="item-list"><a href="{{ route('front.user.detail.view', getParam()) }}#portfolio" class="item-link">Portfolios</a></li>
                            <li class="item-list"><a href="{{ route('front.user.detail.view', getParam()) }}#blogs" class="item-link">Blogs</a></li>
                            <li class="item-list"><a href="{{ route('front.user.detail.view', getParam()) }}#skills" class="item-link">Skills</a></li>
                            <li class="item-list"><a href="{{ route('front.user.detail.view', getParam()) }}#contact" class="item-link">Contact</a></li>

                            <li class="item-list default">
                                <a href="#" class=" default-link">
                                Default </a> 
                                <img src="images/arrow.svg" alt="">
                                <ul class="default-show">
                                <li class="item-list"><a href="#about-me" class="item-link">About Me</a></li>
                                <li class="item-list"><a href="#experiance" class="item-link">Experiance</a></li>
                                <li class="item-list"><a href="#testimonial" class="item-link">Testimonial</a></li>
                               
                                </ul>
                            </a></li>                            
                            <li class="item-list">                        
                                @if (is_array($userPermissions) &&
                                is_array($packagePermissions) &&
                                in_array('Appointment', $userPermissions) &&
                                in_array('Appointment', $packagePermissions))
                                    <li>
                                        @if (!Auth::guard('customer')->check())
                                        <a class="item-link-login" href="{{ route('customer.login', getParam()) }}">{{ $keywords['Login'] ?? 'Login' }}</a>
                                        @else
                                        <div class="dropdown show">
                                            <a  href="#" role="button" id="dropdownMenuLink"
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
                <div class="sidebar-footer">
                    <span>{{ $keywords['Stay_Connected'] ?? 'Stay Connected' }}</span>
                    <h4><a class="mail" href="mailto:{{ $user->email }}">{{ $user->email }}</a></h4>
                </div>
            </div>
 

            @if (request()->routeIs('front.user.service.detail') ||
            request()->routeIs('front.user.blog.detail') ||
            request()->routeIs('front.user.portfolio.detail'))
                <div class="pt-120 pb-70" style="padding-left: 400px;padding-top:100px">
            @endif
            @yield('content')
            @if (request()->routeIs('front.user.service.detail') ||
                    request()->routeIs('front.user.blog.detail') ||
                    request()->routeIs('front.user.portfolio.detail'))
                </div>
            @endif
        
        <script src="{{ asset('assets/front/js/vendor/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/profile/whatsapp.min.js') }}"></script>
  <!-- Bootstrap Datepicker -->
  <script src="{{ asset('assets/admin/js/plugin/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <!-- jQuery Timepicker -->
  <script src="{{ asset('assets/front/js/pignose.calendar.full.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/jquery.timepicker.min.js') }}"></script>
  <!--====== plugin js ======-->
  <script src="{{ asset('assets/front/js/plugin.min.js') }}"></script>
  <script>
    "use strict";
    var rtl = {{ $userCurrentLang->rtl }};
  </script>
  <!--====== Common js ======-->
  <script>
    "use strict";
    var rtl = {{ $userCurrentLang->rtl }};
    var $holidays = '<?php echo json_encode($holidays); ?>'
    var $weekends = '<?php echo json_encode($weekends); ?>'
    var timeSlotUrl = "{{ route('getTimeSlot', getParam()) }}";;
    var checkThisSlot = "{{ route('checkThisSlot', getParam()) }}";
  </script>
        
        @if (session()->has('success'))
    <script>
      "use strict";
      toastr['success']("{{ __(session('success')) }}");
    </script>
  @endif

  {{-- plugins --}}
  @includeif('user.profile1.partials.plugins')
  {{-- plugins end --}}
        @yield('scripts')
</body>

</html>