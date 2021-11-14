@extends('layouts.app')
<meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">
@section('content')
    <div class="h-screen font-sans  bg-cover bg-center" >
        <div class="container mx-auto h-full flex flex-1 justify-center items-center">
            <div class="w-full max-w-lg">
                <div class="leading-loose">
                    <form class="max-w-xl m-4 px-3 lg:px-10 pb-10 bg-white dark:bg-white  shadow-xl space-y-4 rounded-xl"
                        action="{{ route('auth.access') }}" method="POST">
                        @csrf
                        <div class="flex justify-center  items-center  pb-6">
                          <img src="/images/logo.png" alt="">
                        </div>
                        <h1 class="font-bold uppercase text-center text-xl md:text-3xl py-2">Inicio de sesión</h1>
                        <div class="">
                            <x-label for="username">Nombre de Usuario</x-label>
                            <x-input name="username" placeholder="Nombre de Usuario" id="username" type="text" value="{{old('username', request('username'))}}" class=" lowercase" required>
                                <x-slot name="icon"><span class="fas fa-user"></span></x-slot>
                            </x-input>
                        </div>
                        <div class="">
                          <x-label for=" password">Contraseña</x-label>
                            <x-input name="password" placeholder="Ingrese su Contraseña" id="email" type="password" required>
                                <x-slot name="icon"><span class="fas fa-lock"></span></x-slot>
                            </x-input>
                        </div>
                        <x-input-error for="error"></x-input-error>
                        <div class="mt-6 flex items-center justify-between">
                            <x-dropdown-link class="text-blue-400 underline" href="{{route('auth.register')}}">Registrarse</x-dropdown-link>
                            <x-button class=" bg-one text-white rounded font-extrabold md:text-base" type="submit">Ingresar</x-button>
                            
                        </div>
                       
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
