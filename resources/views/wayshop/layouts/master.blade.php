<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Site Metas -->
    <title>ThewayShop</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('front-assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('front-asset/images/apple-touch-icon.png') }}">


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/responsive.css') }}">
    <!-- Custom CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('front-asset/css/custom.css') }}"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <script src="https://www.google.com/recaptcha/api.js?" async defer></script>

    @include('wayshop.layouts.header')
    <div id="app">
        @yield('content')
    </div>
    @include('wayshop.layouts.footer')


    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>
    <!-- ALL JS FILES -->
    {{-- <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('front-assets/js/jquery-3.2.1.min.js') }}" async defer></script>
    <script src="{{ asset('front-assets/js/popper.min.js') }}" async defer></script>
    <script src="{{ asset('front-assets/js/bootstrap.min.js') }}" async defer></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('front-assets/js/jquery.superslides.min.js') }}" async defer></script>
    <script src="{{ asset('front-assets/js/bootstrap-select.js') }}" async defer></script>
    <script src="{{ asset('front-assets/js/inewsticker.js') }}" async defer></script>
    <script src="{{ asset('front-assets/js/bootsnav.js.') }}" async defer></script>
    <script src="{{ asset('front-assets/js/images-loded.min.js') }}" async defer></script>
    <script src="{{ asset('front-assets/js/isotope.min.js') }}" async defer></script>
    <script src="{{ asset('front-assets/js/owl.carousel.min.js') }}" async defer></script>
    <script src="{{ asset('front-assets/js/baguetteBox.min.js') }}" async defer></script>
    <script src="{{ asset('front-assets/js/form-validator.min.js') }}" async defer></script>
    <script src="{{ asset('front-assets/js/contact-form-script.js') }}" async defer></script>
    <script src="{{ asset('front-assets/js/custom.js') }}" async defer></script>
    <script>
        /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }

    </script>
    @yield('script')

</body>

</html>
