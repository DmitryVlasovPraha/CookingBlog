<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? env('APP_NAME') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

    <script src="https://kit.fontawesome.com/a3558e05a7.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- CSS
   ==================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">

    <!-- IcoFonts -->
    <link rel="stylesheet" href="{{asset('css/icofonts.css')}}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('css/owlcarousel.min.css')}}">

    <!-- navigation -->
    <link rel="stylesheet" href="{{asset('css/navigation.css')}}">

    <!-- magnific popup -->
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/slick.css')}}">

    <!-- Responsive -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>

<div class="body-inner-content">
    @include('layout.components.header')
    @if ($message = session('success'))
        <div class="alert alert-success alert-dismissible mt-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ $message }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible mt-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- header nav end-->
            @yield('content')
    <!-- col end-->
</div>
</div>
</section>


<!-- footer social list start-->

@include('layout.components.footer')

<!-- footer end -->


<!-- footer end -->

<!-- javaScript Files

	=============================================================================-->



<script src="//code.jquery.com/jquery-latest.js"></script>
<!-- initialize jQuery Library -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- navigation JS -->
<script src="{{asset('js/navigation.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('js/popper.min.js')}}"></script>

<!-- magnific popup JS -->
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>

<!-- Bootstrap jQuery -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Owl Carousel -->
<script src="{{asset('js/owl-carousel.2.3.0.min.js')}}"></script>

<script src="{{asset('js/main.js')}}"></script>
</div>

</body>
</html>
