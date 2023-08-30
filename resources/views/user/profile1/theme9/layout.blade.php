<!DOCTYPE html>
<html lang="en" @if ($userCurrentLang->rtl == 1) dir="rtl" @endif>

<head>
  <!--====== Required meta tags ======-->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="@yield('meta-description')">
  <meta name="keywords" content="@yield('meta-keywords')">
  @yield('og-meta')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--====== Title ======-->
  <title>{{ isset($userBs) && $userBs->website_title ? $userBs->website_title : '' }} - @yield('tab-title')</title>
  <!--====== Favicon Icon ======-->
  <link rel="shortcut icon"
    href="{{ !empty($userBs->favicon) ? asset('assets/front/img/user/' . $userBs->favicon) : '' }}" type="image/png">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-datepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/jquery.timepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/pignose.calendar.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/plugin.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme9/theme9.css') }}" />
  <!--====== COMMON css ======-->
  <link rel="stylesheet" href="{{ asset('assets/front/css/profile/common.css') }}">
  <!--====== Bootstrap css ======-->
  <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme6-8/bootstrap.min.css') }}" />
  <!--====== Slick Slider ======-->
  <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme6-8/slick.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/front/css/profile/whatsapp.min.css') }}">
  <!--====== Animated Headline ======-->
  <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme6-8/animated-headline.min.css') }}" />
  <!--====== Magnific Popup ======-->
  <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme6-8/magnific-popup.min.css') }}" />
  <!--====== Font Awesome ======-->
  <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme6-8/all.min.css') }}" />
  <!--====== Main Css ======--> 
  @if ($userCurrentLang->rtl == 1)
    <!--====== Common RTL Style css ======-->
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/common-rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme6-8/rtl-theme9.css') }}">
  @endif
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

  <style>
    :root {
      --color-primary: <?='#'. $userBs->base_color ?>
    }
  </style>

  @foreach ($weekends as $wek)
    <style>
      .pignose-calendar .pignose-calendar-header div.pignose-calendar-week:nth-child({{ $wek + 1 }}) {
        color: #ff6060 !important;
        /* Set the color of the text in the weekend cells */
      }

      .pignose-calendar .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit-date:nth-child({{ $wek + 1 }}) a {
        color: #ff6060;
        /* Set the color of the text in the weekend cells */
      }
    </style>
  @endforeach
  <style>
    .navbar-dark .navbar-nav .nav-link {
      text-decoration: none;
    color: #ff6060;
    cursor: pointer;
    font-weight: 700;
    font-family: var(--font-poppins);
    margin-top: 15px
    }
  </style>
  
  @yield('styles')
</head>

<body>
  <!--====== Start Template Header ======-->
             
      <nav class="nav" style="height:100px">
        <input type="checkbox" id="nav-check" />
        <div class="nav-header">
            <img
                src="{{ isset($userBs->logo)
                    ? asset('assets/front/img/user/' . $userBs->logo)
                    : asset('assets/front/img/profile/lgoo.png') }}"
                height="90px"
                width="90px"
            />
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>

        <ul class="nav-list">
            <li><a href="{{ route('front.user.detail.view', getParam()) }}">Home</a></li>          
            <li><a href="{{ route('front.user.detail.view', getParam()) }}#services">Services</a></li>
            <li><a href="{{ route('front.user.detail.view', getParam()) }}#portfolio">Portfolio</a></li>
            <li><a href="{{ route('front.user.detail.view', getParam()) }}#blog">Blog</a></li>
            <li><a href="{{ route('front.user.detail.view', getParam()) }}#">Appointment</a></li>
            <li><a href="{{ route('front.user.detail.view', getParam()) }}#contact">Contact</a></li>
            <li>    
                <form action="{{ route('changeUserLanguage', getParam()) }}" id="userLangForm">
                    <input type="hidden" name="username" value="{{ $user->username }}">
                    <select name="code" onchange="document.getElementById('userLangForm').submit();">
                        @foreach ($userLangs as $userLang)
                            <option value="{{ $userLang->code }}"
                                {{ $userLang->id == $userCurrentLang->id ? 'selected' : '' }}>
                                {{ $userLang->name }}</option>
                        @endforeach
                    </select>
                </form>
                </a>
            </li>            
            @if (is_array($userPermissions) &&
                  is_array($packagePermissions) &&
                  in_array('Appointment', $userPermissions) &&
                  in_array('Appointment', $packagePermissions))
                <li>
                    @if (!Auth::guard('customer')->check())
                    <a href="{{ route('customer.login', getParam()) }}" style="color:white;margin-top: 0px" class="main-btn login-btn">{{ $keywords['Login'] ?? 'Login' }}</a>
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
        </ul>
    </nav>
 
  <!--====== End Template Header ======-->

  @yield('content')
  <!--====== Template Footer Start ======-->
  <section id="footer" class="services-section">
    <div class="col-sm-3 col-md-3 col-lg-3 testimonial-row-1" style="text-align: center;">
      <p class="about-me-para">{{ $keywords['Stay_Connected'] ?? 'Stay Connected' }}</p>
      <a class="section-head" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
  </div>
  </section>
  <!--====== Template Footer End ======-->
  <!--====== End Main Wrapper ======-->

  <script src="{{ asset('assets/front/js/profile/theme6-8/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/plugin/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <!-- jQuery Timepicker -->
  <script src="{{ asset('assets/front/js/jquery.timepicker.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/profile/whatsapp.min.js') }}"></script>
  <!--====== plugin js ======-->
  <script src="{{ asset('assets/front/js/plugin.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/pignose.calendar.full.min.js') }}"></script>
  <!--====== Bootstrap ======-->
  <script src="{{ asset('assets/front/js/profile/theme6-8/bootstrap.min.js') }}"></script>
  <!--====== Slick slider ======-->
  <script src="{{ asset('assets/front/js/profile/theme6-8/slick.min.js') }}"></script>
  <!--====== Images loaded ======-->
  <script src="{{ asset('assets/front/js/profile/theme6-8/imagesloaded.pkgd.min.js') }}"></script>
  <!--====== Isotope ======-->
  <script src="{{ asset('assets/front/js/profile/theme6-8/isotope.pkgd.min.js') }}"></script>
  <!--====== In-view ======-->
  <script src="{{ asset('assets/front/js/profile/theme6-8/jquery.inview.min.js') }}"></script>
  <!--====== Easy Pie Chart ======-->
  <script src="{{ asset('assets/front/js/profile/theme6-8/jquery-easypiechart.min.js') }}"></script>
  <!--====== Magnific Popup ======-->
  <script src="{{ asset('assets/front/js/profile/theme6-8/magnific-popup.min.js') }}"></script>
  <!--====== Animated Headline ======-->
  <script src="{{ asset('assets/front/js/profile/theme6-8/animated-headline.min.js') }}"></script>


  <script>
    "use strict";
    var rtl = {{ $userCurrentLang->rtl }};
    var $holidays = '<?php echo json_encode($holidays); ?>'
    var $weekends = '<?php echo json_encode($weekends); ?>'
    var timeSlotUrl = "{{ route('getTimeSlot', getParam()) }}";;
    var checkThisSlot = "{{ route('checkThisSlot', getParam()) }}";
  </script>
  <!--====== Common js ======-->
  <script src="{{ asset('assets/front/js/profile/common.js') }}"></script>
  <!--====== Main js ======-->
  <script src="{{ asset('assets/front/js/profile/theme6-8/theme8.js') }}"></script>
  @if (session()->has('success'))
    <script>
      "use strict";
      toastr['success']("{{ __(session('success')) }}");
    </script>
  @endif



  @if (session()->has('error'))
    <script>
      "use strict";
      toastr['error']("{{ __(session('error')) }}");
    </script>
  @endif
  
  {{-- plugins --}}
  @includeif('user.profile1.partials.plugins')
  {{-- plugins end --}}
  @yield('scripts')
</body>

</html>
