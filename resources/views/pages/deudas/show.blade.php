@extends('dashboard')

@section('body')
    <div class="  pb-32 md:pb-2 md:pt-12 relative md:mt-16">

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
                <div class="text-gray-900 bg-one overflow-hidden px-0.5 relative ">

                    <div class="p-4 flex relative">
                        <h1 class="text-xl md:text-2xl font-bold uppercase flex flex-col">
                            Cuotas de la deuda
                            <small>{{ $cuotas->total() }} Cuotas por pagar</small>
                        </h1>
                        <div class="absolute right-2 top-2">
                            <x-dropdown width="w-72">
                                <x-slot name="trigger">
                                    <span class="fas fa-hand-holding-usd text-2xl lg:text-4xl cursor-pointer"></span>
                                </x-slot>
                                <x-slot name="content">
                                    <form action="{{ route('cuotas.update', $pendiente->id) }}" class="m-2"
                                        id="f{{ $pendiente->id }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="my-2 {{ $deuda->type == 'cuota' ? 'hidden' : '' }}">
                                            <x-input class="" type="number" wLabel="w-20" name="capital"
                                                value="{{ $pendiente->capital }}">
                                                <x-slot name="label">Capital</x-slot>
                                                <x-slot name="icon"><span class="fas fa-dollar-sign"></span></x-slot>
                                            </x-input>
                                        </div>
                                        <div class="my-2">
                                            <x-input type="number" wLabel="w-20" readonly name="interes"
                                                value="{{ $pendiente->interes }}">
                                                <x-slot name="label">Interés</x-slot>
                                                <x-slot name="icon"><span class="fas fa-dollar-sign"></span></x-slot>
                                            </x-input>
                                        </div>
                                        <div class="flex justify-end">
                                            <x-button form="f{{ $pendiente->id }}" class="confirm bg-two"
                                                data-label="¿Proceder con el cobro?">
                                                Cobrar
                                            </x-button>
                                        </div>
                                    </form>

                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                    <div class="px-3 m-3 flex bg-white overflow-auto ">
                        <table class=" relative border m-3">
                            <tbody>
                                <thead class="md:sticky top-0">
                                    <tr>
                                        <th scope="col" class="">Fecha</th>
                                        <th scope="col">Balance</th>
                                        <th scope="col">Capital</th>
                                        <th scope="col">Interés</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                @foreach ($cuotas as $cuota)
                                    <tr>
                                        <td data-label="Fecha" class="">
                                            {{ date_format(date_create($cuota->fecha), 'd M Y') }}</td>
                                        <td data-label="Balance">
                                            <div class="flex items-center justify-end lg:justify-center space-x-2">
                                                ${{number_format($cuota->saldo, 2) }}
                                            </div>
                                        </td>
                                        <td data-label="Capital"
                                            class="md:flex md:flex-col  md:justify-center md:items-center md:text-left">
                                            <div class="md:flex md:items-center md:space-x-2  ">
                                                <span
                                                    class="w-36 whitespace-nowrap overflow-ellipsis overflow-hidden">${{ number_format($cuota->capital,2) }}</span>
                                            </div>
                                        </td>
                                        <td data-label="Interés">${{ number_format($cuota->interes, 2) }}</td>
                                        <td class="font-bold" data-label="Total">${{ number_format($cuota->deber, 2) }}</td>
                                        
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                       
                    </div>
                    <div class="m-3 bg-white py-3 px-6 -mt-4">
                        {{$cuotas->links()}}
                    </div>
                </div>

            </x-slot>
        </x-two-columns>
    </div>
@endsection
