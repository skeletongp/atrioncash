@extends('dashboard')

@section('body')
    <div class=" overflow-auto h-screen pb-32 md:pb-2 md:mt-16 md:pt-16 relative">
        <a href="{{route('clientes.create')}}" 
        class="w-10 h-10 rounded-full bg-one flex items-center justify-center hover:bg-blue-400 absolute top-0 left-1 text-white hover:text-blue-800 transform hover:scale-105 shadow-xl">
                <span class="fas fa-plus "> </span>
        </a>
        <h1 class="mt-3 mb-5 text-center font-bold text-lg uppercase lg:hidden" id="hTitle">Listado de clientes</h1>
        <x-two-columns>
            <x-slot name="col1">
                <div class="flex flex-col justify-between h-full px-4  ">
                   
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

                @if ($clientes->count())
                <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-rows-3 gap-6">
                    @foreach ($clientes as $cliente)
                    <div class=" border border-gray-300 p-4 block bg-three bg-opacity-40 relative pt-10">
                        <div class="h-9 w-full absolute top-0 left-0 p-1 flex items-center justify-end space-x-2 ">
                            <x-dropdown-link href="{{route('clientes.show', $cliente)}}">
                                <span class="fas fa-eye"></span>
                            </x-dropdown-link>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Nombre</span>
                            <span class="font-semibold text-base">{{$cliente->fullname()}}</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Teléfono</span>
                            <a href="https://api.whatsapp.com/send?phone=+1{{$cliente->phone}}&text=Edite+este+mensaje"
                                target="_blank">
                                <span class="font-semibold text-base "><span class="fab fa-whatsapp font-bold mr-1"></span>
                                {{$cliente->phone}}</span>
                            </a>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Deuda</span>
                            <span class="font-semibold text-base">${{ number_format($cliente->deudas->sum('saldo_actual'), 2) }}</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Estado</span>
                            <span class="{{ $cliente->status == 'al día' ? 'text-green-800' : 'text-red-500' }} capitalize font-semibold text-base">{{$cliente->status}}</span>
                        </div>
                    </div>
                    @endforeach
                    
                  
                </div>
                <div class="my-2">
                    {{$clientes->links()}}
                </div>
                @else
                    <h1 class="text-center font-bold uppercase text-xl">No se encontraron resultados</h1>
                @endif

            </x-slot>
        </x-two-columns>
    </div>
@endsection
