@extends('layouts.app')

@section('content')

    <!--Container -->
    <header class="flex justify-between items-center z-50 fixed w-full bg-one h-12 px-3 ">
        <x-dropdown-link id="btn-menu" class=" cursor-pointer bg-one text-white hover:bg-black menu-btn lg:hidden z-50">
            <span class="fas fa-bars text-2xl" id="span-menu"></span>
        </x-dropdown-link>
        <div class="text-center leading-3 pb-2 flex flex-col max-w-sm">
            <x-dropdown-link href="{{route('home')}}"
                class="uppercase text-lg md:text-2xl text-one font-bold overflow-ellipsis hover:bg-white hover:bg-opacity-20 rounded-xl  overflow-hidden whitespace-nowrap">
                {{ Auth::user()->negocio->name }}
            </x-dropdown-link>
            <small
                class="text-white overflow-ellipsis overflow-hidden whitespace-nowrap">{{ request()->has('trial') ? request('trial') : '' }}</small>
        </div>
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
                <h1 class="font-bold uppercase text-xl md:text-xl lg:text-4xl text-center my-2 lg:my-10" >Bienvenido,
                    {{ Auth::user()->fullname }}</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 max-w-4xl mx-auto py-12 gap-6 bg-three rounded-xl p-3 text-center w-full">
                    <x-grid-stat title="{{ '$' . number_format($balance->saldo_actual, 2) }}" subtitle="Dinero en Saldo"
                        actionText="Balance General" actionLink="" icon="fa-dollar-sign" />
                    <x-grid-stat title="{{ '$' . number_format($balance->capital_prestado, 2) }}" subtitle="Capital Prestado"
                        actionText="Ver Préstamos" actionLink="{{ route('deudas.index') }}" icon="fas fa-file-invoice-dollar" />
                    <x-grid-stat title="{{ $clientes->count('id') }}" subtitle="Clientes Activos" actionText="Ver Clientes"
                        actionLink="{{ route('clientes.activos') }}" icon="fa-users" />
                    <x-grid-stat title="{{ $pendientes->count('id') }}" subtitle="Cobros pendientes"
                        actionText="Gestionar Cobros" actionLink="{{ route('deudas.atrasados') }}"
                        icon="fas fa-hand-holding-usd" />


                </div>
            </div>
        @endif
    </div>

@endsection
