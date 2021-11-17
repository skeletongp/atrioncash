@extends('dashboard')

@section('body')
    <div class="py-4 md:py-16 pb-16 pt-8 md:pt-4 md:mt-12 px-4 bg-three relative">
        <div class="absolute top-1 left-1">
            <x-dropdown-link href="{{ route('partidas.create') }}">
                <span class="fas fa-plus text-xl md:text-2xl"> </span>
            </x-dropdown-link>
        </div>
        <div class="absolute top-1 right-1">
            <x-dropdown-link class="cursor-default select-none">
                <span class="font-bold">Total:
                    ${{ number_format($suma, 2) }}
                </span>
            </x-dropdown-link>
        </div>
        @if ($partidas->count())
            <h1 class="uppercase font-bold text-center text-xl md:text-2xl my-2 mt-2 mb-2 md:mb-2">
                {{ request()->has('gastos') ? 'Gastos' : 'Ingresos' }} recientes
            </h1>
            <form action="" class=" mx-auto  max-w-2xl px-3">
                <div class="md:flex md:justify-between md:space-x-3">
                    <div class="w-full my-2">
                        <x-input type="date" class="w-full" name="start"
                            value="{{ date('Y-m-d', strtotime($start)) }}">
                            <x-slot name="label">Desde</x-slot>
                        </x-input>
                    </div>
                    <div class="w-full my-2">
                        <x-input type="date" class="w-full" name="end" value="{{ date('Y-m-d') }}">
                            <x-slot name="label">Hasta</x-slot>
                        </x-input>
                    </div>
                    <div class="flex my-2 justify-end">
                        <x-button class="bg-one text-white">Filtrar</x-button>
                    </div>
                </div>
            </form>
            <div
                class="grid grid-cols-1 {{ $partidas->count() == 1 ? 'mx-auto ' : ($partidas->count() == 2 ? 'md:grid-cols-2' : 'md:grid-cols-3') }} max-w-5xl mx-auto gap-6  p-3 text-center w-full">
                @foreach ($partidas as $partida)
                    <div class="flex items-center h-full w-full max-w-sm mx-auto ">
                        <div class=" border w-full border-gray-300 p-4 block bg-white rounded-xl  pt-2 relative">
                            <div class="border-b py-1 border-gray-300">
                                <h1 class="text-center font-bold uppercase text-xl">{{ $partida->detalle }}</h1>
                            </div>
                            <div class="flex justify-between border-b py-1 border-gray-300">
                                <span class="font-bold uppercase">Monto</span>
                                <span class="font-semibold text-base">
                                    ${{ number_format(request()->has('gastos') ? $partida->salida : $partida->entrada, 2) }}</span>
                            </div>

                            <div class="flex justify-between border-b py-1 border-gray-300">
                                <span class="font-bold uppercase">Fecha</span>
                                <span class="font-semibold text-base ">
                                    {{ date_format(date_create($partida->fecha), 'd M Y') }}</span>
                            </div>
                            @if ($partida->cliente)
                                <div class="flex justify-between border-b py-1 border-gray-300">
                                    <span class="font-bold uppercase">Cliente</span>
                                    <div>
                                        <span class="font-semibold text-base">{{ $partida->cliente->fullname() }}</span>
                                    </div>
                                </div>
                            @endif
                            <div class="flex justify-between border-b py-1 border-gray-300">
                                <span class="font-bold uppercase">Usuario</span>
                                <span class="capitalize font-semibold text-base">{{ $partida->user->fullname }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="my-3 px-5 max-w-5xl mx-auto">
                {{ $partidas->links() }}
            </div>
        @else
            <h1 class="font-bold text-center text-2xl md:text-4xl mt-16 uppercase">
                No se encontraron resultados
            </h1>
        @endif
    </div>
@endsection
