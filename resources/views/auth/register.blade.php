@extends('layouts.app')

@section('content')
    <div class="px-2 pb-16 min-h-screen flex items-center font-sans bg-white" style="scroll-behavior: smooth">
        <div class=" mx-auto  flex flex-1 justify-center items-center">
            <div class="w-full max-w-4xl mx-auto">
                    <form class="m-4 p-8 bg-white dark:bg-gray-900  shadow-xl flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-6 rounded-xl" id="fRegister"
                        action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="space-y-4 w-full">
                            <h1 class="font-bold uppercase md:text-lg text-center mb-4">Registro de Usuario</h1>
                            <x-input-error for="fullname">Revise el nombre y el apellido</x-input-error>
                            <div class="space-y-4 lg:space-y-0 lg:flex lg:space-x-4">
                                <div>
                                    <x-label for="name">Nombre</x-label>
                                    <x-input placeholder="Primer nombre" type="text" for="name" name="name" id="name"
                                        value="{{ old('name', request('name')) }}">
                                        <x-slot name="icon"> <span class="fas fa-user"></span></x-slot>
                                    </x-input>
                                    <x-input-error for="name"></x-input-error>
                                </div>
                                <div>
                                    <x-label for="lastname">Apellidos</x-label>
                                    <x-input placeholder="Apellidos" type="text" for="lastname" name="lastname"
                                        id="lastname" value="{{ old('lastname', request('lastname')) }}">
                                        <x-slot name="icon"> <span class="fas fa-user"></span></x-slot>
                                    </x-input>
                                    <x-input-error for="lastname"></x-input-error>
                                </div>
                            </div>
                            <div class=" ">
                                <x-label for="lastname">Cédula</x-label>
                                <x-input class="w-full" type="text" name="cedula" placeholder="No. Cédula con guiones"  pattern="[0-9]{3}-[0-9]{7}-[0-9]{1}" required>
                                   
                                    <x-slot name="icon">
                                        <span class="fas fa-id-card"></span>
                                    </x-slot>
                                </x-input>
                            </div>
                            <div>
                                <x-label for="email">Correo Electrónico</x-label>
                                <x-input placeholder="Correo Electrónico" type="email" for="email" name="email" id="email"
                                    value="{{ old('email', request('email')) }}">
                                    <x-slot name="icon"> <span class="fas fa-at"></span></x-slot>
                                </x-input>
                                <x-input-error for="email"></x-input-error>
                            </div>
                            <div>
                                <x-label for="phone">No. Teléfono</x-label>
                                <x-input placeholder="No. Teléfono" type="number" for="phone" name="phone" id="phone"
                                    value="{{ old('phone', request('phone')) }}">
                                    <x-slot name="icon"> <span class="fas fa-phone"></span></x-slot>
                                </x-input>
                                <x-input-error for="phone"></x-input-error>
                            </div>
                            
                           
                        </div>
                        <div class="space-y-4 w-full">
                            <h1 class="font-bold uppercase md:text-lg text-center mb-4">Datos del negocio</h1>
                            
                                <div>
                                    <x-label for="Nname">Negocio</x-label>
                                    <x-input placeholder="Nombre del negocio" type="text" for="Nname" name="Nname" id="Nname"
                                        value="{{ old('Nname', request('Nname')) }}" required>
                                        <x-slot name="icon"> <span class="fas fa-store"></span></x-slot>
                                    </x-input>
                                    <x-input-error for="Nname"></x-input-error>
                                </div>
                                <div>
                                    <x-label for="Nphone">No. Teléfono</x-label>
                                    <x-input placeholder="No. Teléfono" type="number" for="Nphone" name="Nphone" id="Nphone"
                                        value="{{ old('Nphone', request('Nphone')) }}" required>
                                        <x-slot name="icon"> <span class="fas fa-phone"></span></x-slot>
                                    </x-input>
                                    <x-input-error for="_phone"></x-input-error>
                                </div>
                                <div>
                                    <x-label for="address">Dirección</x-label>
                                    <x-input placeholder="Dirección del negocio" type="text" for="address" name="address" id="address"
                                        value="{{ old('address', request('address')) }}" required>
                                        <x-slot name="icon"> <span class="fas fa-map"></span></x-slot>
                                    </x-input>
                                    <x-input-error for="address"></x-input-error>
                                </div>
                               
                                <div class="w-3/5 md:w-1/2">
                                    <x-label for="balance">Balance</x-label>
                                    <x-input placeholder="Balance Inicial" type="number" for="balance" name="balance" id="balance"
                                        value="{{ old('balance', request('balance')) }}" min="5000" required>
                                        <x-slot name="icon"> <span class="fas fa-dollar-sign"></span></x-slot>
                                    </x-input>
                                    <x-input-error for="balance"></x-input-error>
                                </div>
                                
                            <div class="flex justify-end items-center">
                               
                                <x-button class="bg-one text-white " form="fRegister" data-label="¿Confirmar registro?">
                                    Registrar
                                </x-button>
                            </div>
                        </div>
                        
                    </form>
                    <a class=" right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800"
                    href="{{ route('auth.login') }}">
                    ¿Ya tienes una cuenta?
                </a>
            </div>
        </div>

    </div>
@endsection
