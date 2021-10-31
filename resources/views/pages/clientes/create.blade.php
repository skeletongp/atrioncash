@extends('dashboard')

@section('body')
    <div class=" overflow-auto h-screen flex items-start lg:pt-8 justify-center ">
        @if (isset($error))
            <x-alert type="error">
            </x-alert>
        @endif
        <div class="w-full md:w-2/3 lg:1/3">
            <div class=" border shadow-xl  p-4 block bg-white lg:w-2/3 mx-auto md:space-y-4">
                <h1 class="my-2 text-lg lg:text-xl uppercase font-bold text-center">Ingrese los datos del cliente</h1>
                <form action="{{ route('clientes.store') }}" method="POST" id="form">
                    @csrf
                    <input type="hidden" name="negocio_id" value="{{ Auth::user()->negocio->id }}">
                    <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                        <x-input class="w-full" type="text" name="name" required>
                            <x-slot name="label">
                                <span class="font-bold uppercase border-r-2 pr-2">Nombre</span>
                            </x-slot>
                            <x-slot name="icon">
                                <span class="fas fa-user"></span>
                            </x-slot>
                        </x-input>
                    </div>
                    <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                        <x-input class="w-full" type="text" name="lastname" required>
                            <x-slot name="label">
                                <span class="font-bold uppercase border-r-2 pr-2">Apellido</span>
                            </x-slot>
                            <x-slot name="icon">
                                <span class="fas fa-user"></span>
                            </x-slot>
                        </x-input>
                    </div>
                    <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                        <x-input class="w-full" type="tel" name="phone" required>
                            <x-slot name="label">
                                <span class="font-bold uppercase border-r-2 pr-2">Teléfono</span>
                            </x-slot>
                            <x-slot name="icon">
                                <span class="fas fa-phone"></span>
                            </x-slot>
                        </x-input>
                    </div>
                    <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                        <x-input class="w-full" type="email" name="email" required>
                            <x-slot name="label">
                                <span class="font-bold uppercase border-r-2 pr-2 ">Correo</span>
                            </x-slot>
                            <x-slot name="icon">
                                <span class="fas fa-at"></span>
                            </x-slot>
                        </x-input>
                    </div>
                    <hr>
                    <h1 class="my-2 text-center uppercase font-bold mt-2 md:mt-6">Datos del préstamo</h1>
                    <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                        <x-input class="w-full lg:w-2/3" type="date" name="fecha" required>
                            <x-slot name="label">
                                <span class="font-bold uppercase border-r-2 pr-2 ">Fecha</span>
                            </x-slot>
                           
                        </x-input>
                    </div>
                    <div class=" border-b px-3 shadow-sm my-2 md:py-4 md:flex space-y-4 md:space-y-0 md:space-x-2">
                        <x-input class="w-full" type="number" name="deuda" required>
                            <x-slot name="label">
                                <span class="font-bold uppercase border-r-2 pr-2 ">Deuda</span>
                            </x-slot>
                            <x-slot name="icon">
                                <span class="fas fa-dollar-sign "></span>
                            </x-slot>
                        </x-input>
                        <x-input class="w-full" type="number" name="interes" required step="0.25" min="1">
                            <x-slot name="label">
                                <span class="font-bold uppercase border-r-2 pr-2 ">Interés</span>
                            </x-slot>
                            <x-slot name="icon">
                                <span class="fas fa-percent"></span>
                            </x-slot>
                        </x-input>
                    </div>
                    <div class=" border-b px-3 shadow-sm py-4 md:flex space-y-4 md:space-y-0 md:space-x-2">
                        <x-select class="w-full"  name="periodicidad" required>
                            <x-slot name="label">
                                <span class="font-bold uppercase border-r-2 pr-2 ">Tiempo</span>
                            </x-slot>
                            <option value="diario">Diario</option>
                            <option value="semanal">Semanal</option>
                            <option value="quincenal">Quincenal</option>
                            <option value="mensual">Mensual</option>
                            <x-slot name="icon">
                                <span class="fas fa-calendar-alt "></span>
                            </x-slot>
                        </x-select>
                        <x-input class="w-full" type="number" name="cuotas" required>
                            <x-slot name="label">
                                <span class="font-bold uppercase border-r-2 pr-2 ">Cuotas</span>
                            </x-slot>
                            <x-slot name="icon">
                                <span class="fab fa-slack-hash"></span>
                            </x-slot>
                        </x-input>
                    </div>
                    <div class="flex justify-end">
                        <x-button form="form" class="bg-one text-white my-2">
                            Guardar
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
