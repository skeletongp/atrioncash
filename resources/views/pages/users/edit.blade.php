@extends('dashboard')

@section('body')

    <div class="w-full max-w-lg mb-16 pb-16 md:pb-2 md:mt-32 mx-auto">
        <form
            class=" px-10 py-4 md:py-6 bg-white dark:bg-gray-900  shadow-xl flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-6 rounded-xl"
            id="addForm" action="{{ route('users.update', $user) }}" method="POST">
            @method('put')
            @csrf
            <div class="space-y-4 w-full">
                <h1 class="font-bold uppercase md:text-lg text-center mb-4">Actualización de Usuario</h1>
                <x-input-error for="label">Revise el nombre y el apellido</x-input-error>
                <div>
                    <x-input placeholder="Primer nombre" type="text" for="name" name="name" id="name"
                        value="{{ old('name', $user->name) }}">
                        <x-slot name="label">Nombre</x-slot>
                        <x-slot name="icon"> <span class="fas fa-user"></span></x-slot>
                    </x-input>
                    <x-input-error for="name"></x-input-error>
                </div>
                <div>
                    <x-input placeholder="Apellidos" type="text" for="lastname" name="lastname" id="lastname"
                        value="{{ old('lastname', $user->lastname) }}">
                        <x-slot name="label">Apellidos</x-slot>
                        <x-slot name="icon"> <span class="fas fa-user"></span></x-slot>
                    </x-input>
                    <x-input-error for="lastname"></x-input-error>
                </div>
                <div class=" ">
                    <x-input class="w-full" type="text" name="cedula" placeholder="No. Cédula con guiones"
                        pattern="[0-9]{3}-[0-9]{7}-[0-9]{1}" required value="{{ old('cedula', $user->cedula) }}">
                        <x-slot name="label">Cédula</x-slot>
                        <x-slot name="icon">
                            <span class="fas fa-id-card"></span>
                        </x-slot>
                    </x-input>
                    <x-input-error for="cedula"></x-input-error>
                </div>
                <div>
                    <x-input placeholder="Correo Electrónico" type="email" for="email" name="email" id="email"
                        value="{{ old('email', request('email',$user->email)) }}">
                        <x-slot name="label">Correo </x-slot>
                        <x-slot name="icon"> <span class="fas fa-at"></span></x-slot>
                    </x-input>
                    <x-input-error for="email"></x-input-error>
                </div>
                <div>
                    <x-input placeholder="No. Teléfono" type="number" for="phone" name="phone" id="phone"
                        value="{{ old('phone', $user->phone) }}">
                        <x-slot name="label">Teléfono</x-slot>
                        <x-slot name="icon"> <span class="fas fa-phone"></span></x-slot>
                    </x-input>
                    <x-input-error for="phone"></x-input-error>
                </div>
                <input type="hidden" name="role" value="{{$user->getRoleNames()[0]}}">
               
                <div class="flex justify-end">
                    <x-button class="confirm bg-one text-white" form="addForm" data-label="¿Actualizar Usuario?">
                        Actualizar
                    </x-button>
                </div>

            </div>

        </form>

    </div>

@endsection
