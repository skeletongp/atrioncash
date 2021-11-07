@extends('dashboard')

@section('body')
    <div class=" overflow-auto h-screen flex items-start lg:pt-16 justify-center ">
        @if (isset($error))
            <x-alert type="error">
                {{ $error }}
            </x-alert>
        @endif
        <div class="w-full ">
            <div class=" border shadow-xl w-full p-4 block bg-white  mx-auto md:space-y-4">
                <form action="{{ route('clientes.store') }}" method="POST" id="form"
                    class="lg:flex items-start lg:space-x-3">
                    @csrf
                    <div class="w-full">
                        <h1 class="my-2 text-lg lg:text-xl uppercase font-bold text-center">Ingrese los datos del cliente
                        </h1>
                        <input type="hidden" name="negocio_id" value="{{ Auth::user()->negocio->id }}">
                        <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                            <x-input class="w-full" type="text" name="name" required>
                                <x-slot name="label">
                                    Nombre
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-user"></span>
                                </x-slot>
                            </x-input>
                        </div>
                        <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                            <x-input class="w-full" type="text" name="lastname" required>
                                <x-slot name="label">
                                    Apellido
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-user"></span>
                                </x-slot>
                            </x-input>
                        </div>
                        <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                            <x-input class="w-full" type="tel" name="phone" required>
                                <x-slot name="label">
                                    Teléfono
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-phone"></span>
                                </x-slot>
                            </x-input>
                        </div>
                        <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                            <x-input class="w-full" type="email" name="email" required>
                                <x-slot name="label">
                                    <span class="font-bold uppercase  ">Correo</span>
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-at"></span>
                                </x-slot>
                            </x-input>
                        </div>
                    </div>
                    <hr class="lg:hidden">
                    <div class="w-full">
                        <h1 class="my-2 text-lg lg:text-xl uppercase font-bold text-center">Datos del préstamo</h1>
                        <div class="border-b px-3 shadow-sm py-2 md:py-4 md:flex space-y-2 md:pb-3 md:space-y-0 md:space-x-2 ">
                            <x-input class="w-full " type="date" name="fecha" value="{{ date('Y-m-d') }}" required>
                                <x-slot name="label">
                                    Fecha
                                </x-slot>

                            </x-input>
                            <x-select wLabel="w-24 md:w-12" required name="type" id="type">
                                <x-slot name="label">Tipo</x-slot>
                                <option value="cuota">Por Cuotas</option>
                                <option value="redito">A Rédito</option>
                            </x-select>
                        </div>

                        <div class=" border-b px-3 shadow-sm py-2 md:py-4 md:flex space-y-2 md:space-y-0 md:space-x-2">
                            <x-select class="w-full" name="periodicidad" required>
                                <x-slot name="label">
                                    Tiempo
                                </x-slot>
                                <option value="diario">Diario</option>
                                <option value="semanal">Semanal</option>
                                <option value="quincenal">Quincenal</option>
                                <option value="mensual">Mensual</option>
                                <x-slot name="icon">
                                    <span class="fas fa-calendar-alt "></span>
                                </x-slot>
                            </x-select>
                            <x-input class="w-full" type="number" id="cuotas" name="cuotas" placeholder="Cant."
                                required min="1">
                                <x-slot name="label">
                                    Cuotas
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fab fa-slack-hash"></span>
                                </x-slot>
                            </x-input>
                        </div>
                        <div class=" border-b px-3 shadow-sm py-2 md:py-4 md:flex space-y-2  md:space-y-0 md:space-x-2">
                            <x-input class="w-full" type="number" name="deuda" required min="100" step="100">
                                <x-slot name="label">
                                    Deuda
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-dollar-sign "></span>
                                </x-slot>
                            </x-input>
                            <x-input class="w-full" type="number" name="interes" required step="0.25" min="1">
                                <x-slot name="label">
                                    Interés
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-percent"></span>
                                </x-slot>
                            </x-input>
                        </div>
                        <div class="flex justify-end">
                            <x-button form="form" class="bg-one ml-auto text-white my-2">
                                Guardar
                            </x-button>
                        </div>
                    </div>

                </form>
                <div class="flex justify-end">

                </div>
            </div>
        </div>
    </div>
    <script>
        $('document').ready(function() {
            $('#type').on('change', function() {
                val = $(this).val();
                if (val == 'redito') {
                    $('#cuotas').prop('readonly', true);
                    $('#cuotas').val(1);
                } else {
                    $('#cuotas').prop('readonly', false);
                }
            });
        });
    </script>
@endsection
