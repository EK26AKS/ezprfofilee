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
     

</head>
<body>
    <main>
        <div class="wrapper">
            <div class="content-warpper">
                @include('user.profile1.theme11.layout.header')

                @yield('main-content.content-profile')

                @include('user.profile1.theme11.layout.footer')
            </div>
        </div>

    </main>
    <script src="{{asset('assets/front/css/profile/bootstrap5/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/front/css/profile/bootstrap5/jquery.js')}}"></script>
    <script src="{{asset('assets/front/css/profile/bootstrap5/slick.min.js')}}"></script>
</body>
</html>