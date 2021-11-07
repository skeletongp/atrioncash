@extends('dashboard')

@section('body')
    <div class=" overflow-auto h-screen pb-32 md:pb-2 md:pt-12 relative">

        <h1 class="mt-3 mb-5 text-center font-bold text-lg uppercase lg:hidden">Detalle de la Deuda</h1>
        <x-two-columns>
            <x-slot name="col1">
                <div class="flex items-center h-full w-full max-w-sm mx-auto">
                    <div class=" border w-full border-gray-300 p-4 block bg-three bg-opacity-40 relative pt-2">
                        <div class="flex justify-center border-b py-1 border-gray-300">
                            <span class="font-semibold text-lg uppercase"> {{ $deuda->cliente->fullname() }}</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Saldo Inicial</span>
                            <span class="font-semibold text-base"> ${{ number_format($deuda->saldo_inicial, 2) }}</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Saldo Actual</span>

                            <span class="font-semibold text-base ">
                                ${{ number_format($deuda->saldo_actual, 2) }}</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Interés</span>
                            <div>
                                <span class="font-semibold text-base">{{ number_format($deuda->interes, 2) }}%</span>
                                <small>(${{ number_format($deuda->saldo_actual * ($deuda->interes / 100), 1) }})</small>
                            </div>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Periodicidad</span>
                            <span class="capitalize font-semibold text-base">{{ $deuda->periodicidad }}</span>
                        </div>

                    </div>

                </div>
            </x-slot>
            <x-slot name="col2">
                <!-- component -->
                <div class="text-gray-900 bg-one overflow-hidden px-0.5 relative">
                    @if ($cuotas->count()>1)
                        <div class="absolute top-1 right-1 px-2 py-2 rounded-full bg-gray-800  w-max text-white">
                            <button form="c{{ $pendiente->id }}" class="confirm" data-label="¿Cobrar cuota?">
                                <div class="md:hidden"> <span class="fas fa-hand-holding-usd text-2xl"></span></div>
                                <span class="hidden md:block font-bold">Cobrar pendiente</span>
                            </button>
                        </div>
                    @endif
                    <div class="p-4 flex">
                        <h1 class="text-xl md:text-2xl font-bold uppercase flex flex-col">
                            Cuotas de la deuda
                            <small>{{ $cuotas->total() }} Cuotas por pagar</small>
                        </h1>
                    </div>
                    <div class="px-3 flex  overflow-auto ">
                        <table class="w-full text-md bg-white shadow-md rounded-xl mb-4">
                            <tbody>
                                <tr class="border-b">
                                    <th class="text-left p-3 px-2 md:px-4">Fecha</th>
                                    <th class="text-left p-3 px-5">Inicial</th>
                                    <th class="text-left p-3 px-2 md:px-4 hidden md:table-cell">Interés</th>
                                    <th class="text-left p-3 px-2 md:px-4 hidden md:table-cell">Capital</th>
                                    <th class="text-left p-3 px-2 md:px-4">Cuota</th>
                                    <th class="text-left p-3 px-2 md:px-4">Restante</th>
                                    <th class="text-left p-3 px-2 md:px-4 hidden md:table-cell"></th>
                                    <th class="hidden md:table-cell"></th>
                                </tr>


                                @foreach ($cuotas as $cuota)
                                    <tr data-label="¿Cobrar cuota?" form="c{{ $cuota->id }}"
                                        class=" confirm cursor-pointer  border-b hover:bg-blue-50  select-none {{ $cuota->id == $pendiente->id ? 'bg-red-200' : 'bg-red-50' }}">
                                        <td class="p-3 px-2 md:px-4">
                                            {{ date_format(date_create($cuota->fecha), 'd/m/y') }}
                                        </td>
                                        <td class="p-3 px-2 md:px-4">${{ number_format($cuota->saldo, 2) }}</td>
                                        <td class="p-3 px-2 md:px-4 hidden md:table-cell">
                                            ${{ number_format($cuota->interes, 2) }}</td>
                                        <td class="p-3 px-2 md:px-4 hidden md:table-cell">
                                            ${{ number_format($cuota->capital, 2) }}</td>
                                        <td class="p-3 px-2 md:px-4">${{ number_format($cuota->deber, 2) }}</td>
                                        <td class="p-3 px-2 md:px-4 ">
                                            ${{ number_format($cuota->saldo - $cuota->capital, 2) }}
                                        </td>

                                        <td class="p-3 px-4 hidden md:table-cell">
                                            @if ($cuota->status == 'pendiente')
                                                <button class="confirm" data-label="¿Cobrar cuota?"
                                                    form="c{{ $cuota->id }}">
                                                    <span class="fas fa-check text-yellow-500 hidden md:table-cell"></span>
                                                </button>

                                            @else
                                                <span class="fas fa-check-double text-green-500"></span>
                                            @endif
                                        </td>
                                    </tr>
                                    <form action="{{ route('cuotas.update', $cuota) }}" method="POST"
                                        id="c{{ $cuota->id }}">
                                        @csrf
                                        @method('put')
                                    </form>
                                @endforeach
                                <tr>
                                    <td colspan="7" class="p-2">{{ $cuotas->links() }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>

            </x-slot>
        </x-two-columns>
    </div>
@endsection
