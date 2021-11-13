@extends('dashboard')

@section('body')
    <div class="pb-12 px-2 mx-auto max-w-2xl my-12">
        <div class=" border shadow-xl w-full p-4 block bg-white  mx-auto md:space-y-4">
            <form action="{{ route('deudas.store') }}" method="POST" id="form" class="lg:flex items-start lg:space-x-3">
                @csrf

                <div class="w-full">
                    <h1 class="my-2 text-lg lg:text-xl uppercase font-bold text-center">Datos del préstamo</h1>
                    <div class=" border-b px-3 shadow-sm py-2 md:py-4 md:flex space-y-2  md:space-y-0 md:space-x-2">
                        <x-select wLabel="w-24" name="cliente_id" required>
                            <x-slot name="label">Cliente</x-slot>
                            <option value="">Elige un cliente</option>
                            @foreach ($clientes as $cliente)
                                <option {{ request('cliente_id') == $cliente->id ? 'selected' : '' }} value="{{ $cliente->id }}">
                                    {{ $cliente->fullname() }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class=" border-b px-3 shadow-sm py-2 md:py-4 md:flex space-y-2  md:space-y-0 md:space-x-2">
                        <div class="w-full">
                            <x-input class="w-full" type="number" name="deuda" required min="100" step="100"
                                max="{{ Auth::user()->negocio->balance->saldo_actual }}" placeholder="Monto del préstamo"
                                value="{{ old('monto') }}">
                                <x-slot name="label">
                                    Monto
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-dollar-sign "></span>
                                </x-slot>
                            </x-input>
                        </div>
                        <div class="w-full">
                            <x-input class="w-full" type="number" name="interes" required step="0.25" min="1"
                                placeholder="Interés en %" value="{{ old('interes') }}">
                                <x-slot name="label">
                                    Interés
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-percent"></span>
                                </x-slot>
                            </x-input>
                        </div>
                    </div>
                    <x-input-error for="deuda">El monto no está disponible</x-input-error>
                    <div class="border-b px-3 shadow-sm py-2 md:py-4 md:flex space-y-2 md:pb-3 md:space-y-0 md:space-x-2 ">
                        <x-input class="w-full " type="date" name="fecha" value="{{ date('Y-m-d') }}" required
                            value="{{ old('fecha') }}">
                            <x-slot name="label">
                                Fecha
                            </x-slot>

                        </x-input>
                        <x-select wLabel="w-24 md:w-12" required name="type" id="type">
                            <x-slot name="label">Tipo</x-slot>
                            <option value="">Elige una forma</option>
                            <option value="cuota">Por Cuotas</option>
                            <option value="redito">A Rédito</option>
                        </x-select>
                    </div>

                    <div class=" border-b px-3 shadow-sm py-2 md:py-4 md:flex space-y-2 md:space-y-0 md:space-x-2">
                        <x-select class="w-full" name="periodicidad" required>
                            <x-slot name="label">
                                Tiempo
                            </x-slot>
                            <option value="">Elige un período</option>
                            <option value="diario">Diario</option>
                            <option value="semanal">Semanal</option>
                            <option value="quincenal">Quincenal</option>
                            <option value="mensual">Mensual</option>
                            <x-slot name="icon">
                                <span class="fas fa-calendar-alt "></span>
                            </x-slot>
                        </x-select>
                        <x-input class="w-full" type="number" id="cuotas" name="cuotas" placeholder="Cant." required
                            min="1">
                            <x-slot name="label">
                                Cuotas
                            </x-slot>
                            <x-slot name="icon">
                                <span class="fab fa-slack-hash"></span>
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
