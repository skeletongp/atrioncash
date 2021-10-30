@extends('layouts.app')

@section('content')

    <!--Container -->
    <header class="flex justify-between items-center z-50 fixed w-full bg-one h-12 px-3 ">
        <x-dropdown-link id="btn-menu" class=" cursor-pointer bg-one text-white hover:bg-black  lg:hidden z-50">
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
                <x-dropdown-link href="{{ route('auth.logout') }}">
                    Salir
                </x-dropdown-link>
            </x-slot>
        </x-dropdown>
    </header>
    <x-menu></x-menu>
    <div class=" ">
        @hasSection('body')
            <div class="w-screen h-scren max-h-screen max-w-7xl mx-auto p-4 pt-16 bg-red-100">
                @yield('body')
            </div>

        @else
            <div class="w-screen h-screen max-w-7xl max-h-screen mx-auto md:p-4 pt-12 md:pt-16  bg-white ">
                <div class="grid grid-cols-1 md:grid-cols-2 max-w-4xl mx-auto gap-6 bg-three p-3 text-center w-full">
                   
                    <x-grid-stat title="{{ $title1 }}" subtitle="{{ $subtitle1 }}" actionText="Balance General"
                        actionLink="#" icon="fa-dollar-sign" />

                    <x-grid-stat title="{{ $title1 }}" subtitle="{{ $subtitle1 }}" actionText="Balance General"
                        actionLink="#" icon="fa-user"/>

                    
                    <x-grid-stat title="{{ $title1 }}" subtitle="{{ $subtitle1 }}" actionText="Balance General"
                        actionLink="#" icon="fa-user"/>

                    <x-grid-stat title="{{ $title2 }}" subtitle="{{ $subtitle2 }}" actionText="Balance General"
                        actionLink="#" icon="fa-user" />

             
                </div>
            </div>
        @endif
    </div>

@endsection
