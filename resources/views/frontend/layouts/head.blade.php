<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi"/>
    <title>
        @yield('title','Booking App')
    </title>
    <link rel="icon" type="image/png" href="{{asset('assets/client/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/summernote.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/nice-select.css')}}">

    <link rel="stylesheet" href="{{asset('assets/client/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/responsive.css')}}">
    @stack('css')
    <!-- <link rel="stylesheet" href="css/rtl.css"> -->
</head>
