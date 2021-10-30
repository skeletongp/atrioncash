@extends('layouts.app')

@section('content')
    <div class="h-screen font-sans  bg-cover bg-center" >
        <div class="container mx-auto h-full flex flex-1 justify-center items-center">
            <div class="w-full max-w-lg">
                <div class="leading-loose">
                    <form class="max-w-xl m-4 p-10 bg-white dark:bg-white  shadow-xl space-y-4 rounded-xl"
                        action="{{ route('auth.access') }}" method="POST">
                        @csrf
                        <div class="flex justify-center  items-center pt-4 pb-6 md:pb-4 text-3xl md:text-5xl space-x-4 font-bold  sm:pt-0">
                            <span class="fas fa-hand-holding-usd text-3xl md:text-5xl"></span>
                            <span>Atrion Cash</span>
                        </div>
                        <div class="">
                            <x-label for="username">Nombre de Usuario</x-label>
                            <x-input name="username" placeholder="Nombre de Usuario" id="username" type="text" value="{{old('username', request('username'))}}" class=" lowercase" required>
                                <x-slot name="icon"><span class="fas fa-user"></span></x-slot>
                            </x-input>
                        </div>
                        <div class="">
                          <x-label for=" password">Contraseña</x-label>
                            <x-input name="password" placeholder="Contraseña" id="email" type="password" required>
                                <x-slot name="icon"><span class="fas fa-lock"></span></x-slot>
                            </x-input>
                        </div>
                        <x-input-error for="error"></x-input-error>
                        <div class="mt-6 flex items-center justify-end">
                            <x-button class=" bg-one text-white rounded font-extrabold md:text-base" type="submit">Ingresar</x-button>
                        </div>
                       
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
