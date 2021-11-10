@extends('layouts.app')

@section('content')

    <!--Container -->
    <header class="flex justify-between items-center z-50 fixed w-full bg-one h-12 px-3 ">
        <x-dropdown-link id="btn-menu" class=" cursor-pointer bg-one text-white hover:bg-black menu-btn lg:hidden z-50">
            <span class="fas fa-bars text-2xl" id="span-menu"></span>
        </x-dropdown-link>
        <span class="uppercase text-2xl text-one font-bold hidden md:flex">
            @if (Auth::user()->negocio)
                {{ Auth::user()->negocio->name }}
            @else
                Administrador
            @endif
        </span>
        <x-dropdown align="right">
            <x-slot name="trigger">
                <div class="flex items-center space-x-2 cursor-pointer">

                    <div class="h-9 w-9 shadow-xl  rounded-full bg-center bg-contain bg-no-repeat"
                        style="background-image: url({{ Auth::user()->photo() }})">
                    </div>
                </div>
            </x-slot>
            <x-slot name="content">
                <form action="{{ route('auth.logout') }}" id="fLogout"></form>
                <x-dropdown-link form="fLogout" class="confirm cursor-pointer" data-label="¿Cerrar sesión?">
                    Salir
                </x-dropdown-link>
            </x-slot>
        </x-dropdown>
       
    </header>
    <x-menu></x-menu>
    <div class=" ">
        @hasSection('body')
            <div class="w-screen h-screen max-h-screen max-w-7xl mx-auto lg:p-4 pt-16  pb-32 md:pb-4 bg-white ">
                @yield('body')
            </div>

        @else
            <div class="w-screen h-screen max-w-7xl max-h-screen mx-auto md:p-4 pt-12 md:pt-16 pb-32 md:pb-4  bg-white ">
                <h1 class="font-bold uppercase text-xl md:text-xl lg:text-4xl text-center my-2 lg:my-10" id="hTitle">Bienvenido, {{ Auth::user()->fullname }}</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 max-w-4xl mx-auto py-12 gap-6 bg-three p-3 text-center w-full">

                    <x-grid-stat title="{{ $title1 }}" subtitle="{{ $subtitle1 }}" actionText="Balance General"
                        actionLink="{{ $url1 }}" icon="{{ $icon1 }}" />

                    <x-grid-stat title="{{ $title2 }}" subtitle="{{ $subtitle2 }}" actionText="Ver Préstamos"
                        actionLink="{{ $url2 }}" icon="{{ $icon2 }}" />


                    <x-grid-stat title="{{ $title3 }}" subtitle="{{ $subtitle3 }}" actionText="Ver Clientes"
                        actionLink="{{ $url3 }}" icon="{{ $icon3 }}" />

                    <x-grid-stat title="{{ $title4 }}" subtitle="{{ $subtitle4 }}" actionText="Gestionar Cobros"
                        actionLink="{{ $url4 }}" icon="{{ $icon4 }}" />


                </div>
            </div>
        @endif
    </div>

@endsection
