<!doctype html>
<html lang="es" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HolyHope') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/menu.css') }}">

    {{-- Styles CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">

    {{-- Scripts --}}
    <script src="{{ mix('js/main.js') }}" defer></script>

    {{-- Scripts CDN --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-price-format/2.2.0/jquery.priceformat.min.js"
        integrity="sha512-qHlEL6N+fxDGsJoPhq/jFcxJkRURgMerSFixe39WoYaB2oj91lvJXYDVyEO1+tOuWO+sBtUGHhl3v3hUp1tGMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    @laravelPWA

</head>

<body class="text-black bg-white bg-bottom md:bg-center bg-no-repeat" style=" overscroll-behavior: smoot">
    @yield('content')
    <div class="center h-screen w-screen hidden bg-black bg-opacity-20 fixed left-0 right-0 top-0 bottom-0" style="z-index: 100" id="loader">
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
    <script>
        var sidebar = $('#sidebar');

        function sidebarToggle() {
            sidebar.toggle('', false)
        }

        var profileDropdown = $('#ProfileDropDown');

        function profileToggle() {
            profileDropdown.toggle(' ', false)
        }
    </script>
</body>
<footer class="fixed bottom-0 z-20 h-10 bg-one w-screen">
    <h1 class="text-center text-white my-2">®AtrionTech Solutions EIRL</h1>
</footer>

</html>
