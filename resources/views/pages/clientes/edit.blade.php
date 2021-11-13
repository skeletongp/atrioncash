@extends('dashboard')

@section('body')
    <div class=" overflow-auto h-screen flex items-start lg:pt-16 justify-center ">
        @if (isset($error))
            <x-alert type="error">
                {{ $error }}
            </x-alert>
        @endif
        <div class="w-full max-w-md">
            <div class=" border shadow-xl w-full p-4 block bg-white  mx-auto md:space-y-4">
                <form action="{{ route('clientes.update', $cliente) }}" method="POST" 
                    class="lg:flex items-start lg:space-x-3" id="fEdit">
                    @method('put')
                    @csrf
                    <input type="hidden" name="cliente_id" value="{{$cliente->id}}">
                    <div class="w-full">
                        <h1 class="my-2 text-lg lg:text-xl uppercase font-bold text-center">Ingrese los datos del cliente
                        </h1>
                        <input type="hidden" name="negocio_id" value="{{ Auth::user()->negocio->id }}">
                        <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                            <x-input class="w-full" type="text" name="name" required value="{{old('name',$cliente->name)}}">
                                <x-slot name="label">
                                    Nombre
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-user"></span>
                                </x-slot>
                            </x-input>
                            <x-input-error for="name"></x-input-error>
                        </div>
                        <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                            <x-input class="w-full" type="text" name="lastname" required value="{{old('lastname',$cliente->lastname)}}">
                                <x-slot name="label">
                                    Apellido
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-user"></span>
                                </x-slot>
                            </x-input>
                            <x-input-error for="lastname"></x-input-error>

                        </div>
                        <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                            <x-input class="w-full" type="text" name="cedula" placeholder="No. Cédula con guiones"  pattern="[0-9]{3}-[0-9]{7}-[0-9]{1}" required value="{{old('cedula',$cliente->cedula)}}">
                                <x-slot name="label">
                                    Cédula
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-id-card"></span>
                                </x-slot>
                            </x-input>
                            <x-input-error for="cedula"></x-input-error>
                        </div>
                        <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                            <x-input class="w-full" type="tel" name="phone" required value="{{old('phone',$cliente->phone)}}">
                                <x-slot name="label">
                                    Teléfono
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-phone"></span>
                                </x-slot>
                            </x-input>
                            <x-input-error for="phone">Coloque un número válido, sin guiones</x-input-error>

                        </div>
                        <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                            <x-input class="w-full" type="email" name="email" required value="{{old('email',$cliente->email)}}">
                                <x-slot name="label">
                                    <span class="font-bold uppercase  ">Correo</span>
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-at"></span>
                                </x-slot>
                            </x-input>
                            <x-input-error for="email"></x-input-error>

                        </div>
                        <div class="flex justify-end">
                            <x-button form="fEdit" class="bg-one ml-auto confirm text-white my-2" data-label="¿Atualizar datos?">
                                Guardar
                            </x-button>
                        </div>
                    </div>
                    </div>

                </form>
                <div class="flex justify-end">

                </div>
            </div>
        </div>
    </div>
    
@endsection
