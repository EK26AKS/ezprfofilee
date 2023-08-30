<html>
   <head>
    <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="@yield('meta-description')">
  <meta name="keywords" content="@yield('meta-keywords')">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('og-meta')
  <!--====== Title ======-->

  <title>{{ isset($userBs) && $userBs->website_title ? $userBs->website_title : '' }} - @yield('tab-title')</title>


  <!--====== Favicon Icon ======-->
  <link rel="shortcut icon"
    href="{{ !empty($userBs->favicon) ? asset('assets/front/img/user/' . $userBs->favicon) : '' }}" type="image/png">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-datepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/jquery.timepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/plugin.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/pignose.calendar.min.css') }}">
  <!--====== Common css ======-->
  <link rel="stylesheet" href="{{ asset('assets/front/css/profile/common.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/profile/whatsapp.min.css') }}">
  <!--====== Default css ======-->
  <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme12/theme12.css') }}">
@php
    if (!empty($userBs->base_color)) {
        $baseColor = $userBs->base_color;
    } else {
        $baseColor = 'F57236';
    }
  @endphp
  @php
    
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

  <link rel="stylesheet" href="{{ asset('assets/front/css/profile/common-base-color.php?color=' . $baseColor) }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/profile/theme4/base-color.php?color=' . $baseColor) }}">

  @yield('styles')
   </head>
   <body>
      @yield('content')
@include('user.profile1.theme12.layout.footer')
<script src="{{ asset('assets/front/js/vendor/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/profile/whatsapp.min.js') }}"></script>
  <!-- Bootstrap Datepicker -->
  <script src="{{ asset('assets/admin/js/plugin/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <!-- jQuery Timepicker -->
  <script src="{{ asset('assets/front/js/jquery.timepicker.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/pignose.calendar.full.min.js') }}"></script>
  <!--====== plugin js ======-->
  <script src="{{ asset('assets/front/js/plugin.min.js') }}"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </body>
</html>