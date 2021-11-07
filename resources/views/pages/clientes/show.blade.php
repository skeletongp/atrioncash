@extends('dashboard')

@section('body')
    <div class=" overflow-auto h-screen pb-32 md:pb-2 md:pt-12 relative">
        <a href="{{ route('clientes.create') }}"
            class="w-10 h-10 rounded-full bg-one flex items-center justify-center hover:bg-blue-400 absolute top-0 left-1 text-white hover:text-blue-800 transform hover:scale-105 shadow-xl">
            <span class="fas fa-plus "> </span>
        </a>
        <h1 class="mt-3 mb-5 text-center font-bold text-lg uppercase lg:hidden">Listado de clientes</h1>
        <x-two-columns>
            <x-slot name="col1">
                <div class="flex flex-col justify-between h-full px-4  ">
                    <div class="hidden lg:flex flex-col justify-center h-full text-center space-y-4">
                        <h1 class="text-center font-bold uppercase text-xl md:text-2xl">Clientes </h1>
                        <h2>
                            Aquí podrás ver un listado de los clientes del negocio, con algunos detalles
                            y
                            un
                            acceso directo al perfil de cada uno. Si deseas añadir un nuevo cliente, presiona el botón
                            <code>+</code> ubicado en la esquina superior izquierda.
                        </h2>
                    </div>
                    <div class="flex flex-col justify-center h-full text-center space-y-4">
                        <form action="">
                            <div class="text-left space-y-2">
                                <x-label class="font-bold text-lg">Buscar cliente</x-label>
                                <x-input type="search" placeholder="Ingrese un término de búsqueda" name="s">
                                    <x-slot name="icon">
                                        <x-button class="">
                                            <span class="fas fa-search text-xl"></span>
                                        </x-button>
                                    </x-slot>
                                </x-input>
                            </div>

                        </form>
                    </div>
                </div>

            </x-slot>
            <x-slot name="col2">

                @if ($cliente->count())
                    <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-rows-3 gap-6">
                        @foreach ($cliente->deudas as $deuda)
                            <div class=" border border-gray-300 p-4 block bg-three bg-opacity-40 relative pt-10">
                                <div class="h-9 w-full absolute top-0 left-0 p-1 flex items-center justify-end space-x-2 ">
                                    <x-dropdown-link href="{{ route('deudas.show', $deuda) }}">
                                        <span class="fas fa-eye"></span>
                                    </x-dropdown-link>
                                </div>
                                <div class="flex justify-between border-b py-1 border-gray-300">
                                    <span class="font-bold uppercase">Saldo Inicial</span>
                                    <span class="font-semibold text-base"> ${{ number_format($deuda->saldo_inicial,2) }}</span>
                                </div>
                                <div class="flex justify-between border-b py-1 border-gray-300">
                                    <span class="font-bold uppercase">Saldo Actual</span>

                                    <span class="font-semibold text-base ">
                                        ${{ number_format($deuda->saldo_actual,2) }}</span>
                                </div>
                                <div class="flex justify-between border-b py-1 border-gray-300">
                                    <span class="font-bold uppercase">Interés</span>
                                    <div>
                                        <span class="font-semibold text-base">{{ number_format($deuda->interes, 2) }}%</span>
                                    <small>(${{ number_format($deuda->saldo_actual*($deuda->interes/100), 1) }})</small>
                                    </div>
                                </div>
                                <div class="flex justify-between border-b py-1 border-gray-300">
                                    <span class="font-bold uppercase">Periodicidad</span>
                                    <span
                                        class="capitalize font-semibold text-base">{{ $deuda->periodicidad }}</span>
                                </div>
                                <div class="flex justify-between border-b py-1 border-gray-300">
                                    <span class="font-bold uppercase">Cuotas</span>
                                    <span
                                        class="capitalize font-semibold text-base">
                                        {{$deuda->cuotas}} 
                                        <span class="fas fa-angle-right text-blue-400"></span>
                                        ${{ number_format($deuda->Cuotas()->first()->deber,2)}}
                                    </span>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    {{-- <div class="my-2">
                    {{$clientes->links()}}
                </div> --}}
                @else
                    <h1 class="text-center font-bold uppercase text-xl">No se encontraron resultados</h1>
                @endif

            </x-slot>
        </x-two-columns>
    </div>
@endsection