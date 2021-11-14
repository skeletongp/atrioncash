@extends('dashboard')

@section('body')
    <div class=" max-w-5xl mx-auto">
        <div class="  pb-16 md:pb-2 md:mt-16 relative ">
            <a href="{{ route('clientes.create') }}"
                class="w-10 h-10 rounded-full bg-one flex items-center justify-center hover:bg-blue-400 absolute top-0 left-1 text-white hover:text-blue-800 transform hover:scale-105 shadow-xl">
                <span class="fas fa-plus "> </span>
            </a>
            <h1 class="mt-3 mb-5 text-center font-bold text-lg uppercase lg:text-3xl" >Listado de clientes</h1>
            <div class="max-w-md mx-auto px-12 md:px-4 h-full text-center space-y-4">
                <form action="" class="mb-4">
                    <div class="space-y-2">
                        <x-label class="font-bold text-lg text-left">Buscar cliente</x-label>
                        <x-input type="search" value="{{request('s')}}" placeholder="Ingrese un término de búsqueda" name="s">
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
                <div class=" grid grid-cols-1 {{$clientes->count()==1?'mx-auto ':($clientes->count()==2?'md:grid-cols-2':'md:grid-cols-3')}} p-4 gap-6 my-4 bg-three lg:p-8 ">
                    @foreach ($clientes as $cliente)
                        <x-user-card :title="$cliente->name.' '.$cliente->lastname" :data="$cliente->phone" :subtitle="'Deuda: $'.number_format($cliente->deuda,2)"
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
    </div>
@endsection
