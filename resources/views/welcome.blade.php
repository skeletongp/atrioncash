<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body class="antialiased bg-white" style="scroll-behavior: smooth" >
    <div
        class="relative flex items-center justify-center h-screen  dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
     

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center  items-center pt-8 text-4xl md:text-7xl space-x-4 font-bold  sm:pt-0">
                <span class="fas fa-hand-holding-usd text-4xl md:text-8xl"></span>
                <span>Atrion Cash</span>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:p-8 mx-8 md:mx-auto">
                    <div class=" py-4 ">
                        <div class="my-2 text-center uppercase text-base font-extrabold flex flex-col justify-between">
                            Solicita más información y descubre cómo AtrionCash puede ayudarte en la gestión de tu negocio.
                        </div>
                        <a href="#">
                            <x-button
                                class="bg-green-600 w-full  text-white font-bold flex justify-center space-x-4 text-xl hover:bg-green-500">
                                <span class="fab fa-whatsapp"></span>
                                <span>Información</span>
                            </x-button>
                        </a>
                    </div>
                    <hr class=" md:hidden">
                    <div class=" py-4 md:border-l-2 md:pl-6 flex flex-col justify-between">
                        <div class="my-2 text-center uppercase text-base font-extrabold">
                            Si ya tienes una cuenta, accede a la misma y gestiona tu negocio de forma eficiente.
                        </div>
                        <a href="{{route('auth.login')}}">
                            <x-button
                            class="bg-blue-600 hover:bg-blue-500 w-full  text-white font-bold flex justify-center space-x-4 text-xl">
                            <span>Acceder</span>
                            <span class="fas fa-sign-in-alt"></span>
                        </x-button>
                        </a>
                    </div>


                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">
                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                            <path
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>

                        <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                            Shop
                        </a>

                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                            <path
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>

                        <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                            Sponsor
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>
</body>

</html>
