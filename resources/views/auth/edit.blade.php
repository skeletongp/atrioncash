@extends('dashboard')

@section('body')
    <div class="px-2 py-16  flex font-sans bg-white" style="scroll-behavior: smooth">
        <div class=" mx-auto  flex flex-1 justify-center items-center">
            <div class="w-full max-w-md mx-auto">
                <form class="m-4 p-4 bg-white dark:bg-gray-900  shadow-xl rounded-xl" id="fUpdate"
                    action="{{ route('auth.update', $user) }}" method="POST">
                    @csrf
                    <div class="space-y-4 w-full">
                        <h1 class="font-bold uppercase md:text-lg text-center mb-8">Actualiza tu perfil</h1>
                        <div>
                            <x-input placeholder="Contraseña" type="password" for="password" name="password" id="password"
                                value="{{ old('password') }}">
                                <x-slot name="label">Clave</x-slot>
                                <x-slot name="icon"> <span class="fas fa-lock"></span></x-slot>
                            </x-input>
                            <x-input-error for="password"></x-input-error>
                        </div>
                        <div>
                            <x-input placeholder="Correo Electrónico" type="email" for="email" name="email" id="email"
                                value="{{ old('email', $user->email) }}">
                                <x-slot name="label">Correo</x-slot>
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
                        <div class="flex justify-end my-3">
                            <x-button class="bg-three confirm" form="fUpdate" data-label="¿Actualizar sus datos?">
                                Actualizar
                            </x-button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
