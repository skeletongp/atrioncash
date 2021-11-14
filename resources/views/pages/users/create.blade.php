@extends('dashboard')

@section('body')

    <div class="w-full max-w-lg mb-16 pb-16 md:pb-2 md:mt-32 mx-auto">
        <form
            class=" px-10 py-4 md:py-6 bg-white dark:bg-gray-900  shadow-xl flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-6 rounded-xl"
            id="addForm" action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="space-y-4 w-full">
                <h1 class="font-bold uppercase md:text-lg text-center mb-4">Registro de Usuario</h1>
                <x-input-error for="label">Revise el nombre y el apellido</x-input-error>
                <div>
                    <x-input placeholder="Primer nombre" type="text" for="name" name="name" id="name"
                        value="{{ old('name', request('name')) }}">
                        <x-slot name="label">Nombre</x-slot>
                        <x-slot name="icon"> <span class="fas fa-user"></span></x-slot>
                    </x-input>
                    <x-input-error for="name"></x-input-error>
                </div>
                <div>
                    <x-input placeholder="Apellidos" type="text" for="lastname" name="lastname" id="lastname"
                        value="{{ old('lastname', request('lastname')) }}">
                        <x-slot name="label">Apellidos</x-slot>
                        <x-slot name="icon"> <span class="fas fa-user"></span></x-slot>
                    </x-input>
                    <x-input-error for="lastname"></x-input-error>
                </div>
                <div class=" ">
                    <x-input class="w-full" type="text" name="cedula" placeholder="No. Cédula con guiones"
                        pattern="[0-9]{3}-[0-9]{7}-[0-9]{1}" required value="{{ old('cedula') }}">
                        <x-slot name="label">Cédula</x-slot>
                        <x-slot name="icon">
                            <span class="fas fa-id-card"></span>
                        </x-slot>
                    </x-input>
                    <x-input-error for="cedula"></x-input-error>
                </div>
                <div>
                    <x-input placeholder="Correo Electrónico" type="email" for="email" name="email" id="email"
                        value="{{ old('email', request('email')) }}">
                        <x-slot name="label">Correo </x-slot>
                        <x-slot name="icon"> <span class="fas fa-at"></span></x-slot>
                    </x-input>
                    <x-input-error for="email"></x-input-error>
                </div>
                <div>
                    <x-input placeholder="No. Teléfono" type="tel" for="phone" name="phone" id="phone"
                        value="{{ old('phone', request('phone')) }}">
                        <x-slot name="label">Teléfono</x-slot>
                        <x-slot name="icon"> <span class="fas fa-phone"></span></x-slot>
                    </x-input>
                    <x-input-error for="phone"></x-input-error>
                </div>
                <div>
                    <x-select name="role">
                        <x-slot name="label">Rol</x-slot>
                        <option value="">Asigne un rol</option>
                        <option value="owner" {{old('role'=='owner'?'selelect':'')}}>Administrador</option>
                        <option value="employee" {{old('role'=='employee'?'selelect':'')}}>Empleado</option>
                    </x-select>
                    <x-input-error for="role"></x-input-error>
                </div>
               
                <div class="flex justify-end">
                    <x-button class="confirm bg-one text-white" form="addForm" data-label="¿Registrar Usuario?">
                        Registrar
                    </x-button>
                </div>

            </div>

        </form>

    </div>

@endsection
