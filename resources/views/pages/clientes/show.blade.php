@extends('dashboard')

@section('body')
    <div class=" md:mt-16 pb-12 pt-12  max-w-4xl mx-auto relative">
        <div class="w-max absolute left-1 top-0">
            <x-dropdown align="left">
                <x-slot name="trigger">
                    <x-dropdown-link class="cursor-pointer">
                        <span class="fas fa-list text-xl lg:text-3xl "> </span>
                    </x-dropdown-link>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link href="{{ route('clientes.create') }}" class=" ">
                        <span class="fas fa-user-plus w-7"></span> Nuevo Cliente
                    </x-dropdown-link>
                    <x-dropdown-link href="{{ route('deudas.create', ['cliente_id' => $cliente->id]) }}"
                        class=" ">
                        <span class="fas fa-dollar-sign w-7"></span> Nuevo Préstamo
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
        </div>
        <div class="my-3 mb-8">
            <x-user-card :title="$cliente->fullname()" :data="$cliente->phone" :subtitle="'Deuda: $'.number_format($cliente->deuda,2)"
                :edit="route('clientes.edit', $cliente)" :delete="route('clientes.destroy', $cliente)"
                :userId="$cliente->id" :bg="$cliente->photo()" :show="''">

            </x-user-card>
        </div>
        @if ($cliente->deudas()->count())
        <h1 class="mt-8 mb-2 text-center font-bold text-lg uppercase ">Préstamos de {{ $cliente->fullname() }}</h1>
            <div
                class=" grid grid-cols-1 {{ $cliente->deudas()->count() > 1 ? 'md:grid-cols-2' : 'max-w-sm mx-auto' }}  px-3 pb-6 gap-6">
                @foreach ($cliente->deudas as $deuda)
                    <div class=" border border-white p-4 block {{$deuda->saldo_actual>50?' bg-three':'bg-green-200'}} bg-opacity-40 relative pt-10">
                        <div class="h-9 w-full absolute top-0 left-0 p-1 flex items-center justify-end space-x-2 ">
                            <x-dropdown-link href="{{ route('deudas.show', $deuda) }}">
                                <span class="fas fa-eye"></span>
                            </x-dropdown-link>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-100">
                            <span class="font-bold uppercase">Saldo Inicial</span>
                            <span class="font-semibold text-base"> ${{ number_format($deuda->saldo_inicial, 2) }}</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-100">
                            <span class="font-bold uppercase">Saldo Actual</span>

                            <span class="font-semibold text-base ">
                                ${{ number_format($deuda->saldo_actual, 2) }}</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-100">
                            <span class="font-bold uppercase">Interés</span>
                            <div>
                                <span class="font-semibold text-base">{{ number_format($deuda->interes, 2) }}%</span>
                                <small>(${{ number_format($deuda->saldo_actual * ($deuda->interes / 100), 1) }})</small>
                            </div>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-100">
                            <span class="font-bold uppercase">Periodicidad</span>
                            <span class="capitalize font-semibold text-base">{{ $deuda->periodicidad }}</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-100">
                           @if ($deuda->saldo_actual>50)
                           <span class="font-bold uppercase">Cuotas</span>
                           <span class="capitalize font-semibold text-base">
                               {{ $deuda->cuotas }}
                               <span class="fas fa-angle-right text-blue-400"></span>
                               ${{ number_format($deuda->Cuotas()->first()->deber, 2) }}
                           </span>
                           @else
                           <span class="font-bold uppercase">Saldada el</span>
                           <span class="capitalize font-semibold text-base">
                               {{ date_format($deuda->updated_at,'d M Y') }}
                           </span>
                           @endif
                        </div>
                    </div>
                @endforeach


            </div>
            {{-- <div class="my-2">
                    {{$clientes->links()}}
                </div> --}}
        @else
            <h1 class="text-center font-bold uppercase text-xl">No se encontraron préstamos</h1>
        @endif

    </div>
@endsection
