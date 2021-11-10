@extends('dashboard')

@section('body')
    <div class=" max-w-4xl mx-auto">
        <div class="  pb-32 md:pb-2 md:mt-16 md:pt-16 relative ">
            <a href="{{ route('clientes.create') }}"
                class="w-10 h-10 rounded-full bg-one flex items-center justify-center hover:bg-blue-400 absolute top-0 left-1 text-white hover:text-blue-800 transform hover:scale-105 shadow-xl">
                <span class="fas fa-plus "> </span>
            </a>
            <h1 class="mt-3 mb-5 text-center font-bold text-lg uppercase lg:hidden" id="hTitle">Listado de clientes</h1>
            <div class="max-w-sm px-4 h-full text-center space-y-4">
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
            @if ($clientes->count())
                <div class=" grid grid-cols-1 md:grid-cols-3 p-4 gap-6 my-4 pl-0">
                    @foreach ($clientes as $cliente)
                        <x-user-card :title="$cliente->fullname()" :subtitle="$cliente->deuda"
                            :edit="route('clientes.edit', $cliente)" :delete="route('clientes.destroy', $cliente)"
                            :userId="$cliente->id" :bg="$cliente->photo()" :show="route('clientes.show', $cliente)">

                        </x-user-card>
                    @endforeach


                </div>
                <div class="my-2">
                    {{ $clientes->links() }}
                </div>
            @else
                <h1 class="text-center font-bold uppercase text-xl">No se encontraron resultados</h1>
            @endif

        </div>
    @endsection
