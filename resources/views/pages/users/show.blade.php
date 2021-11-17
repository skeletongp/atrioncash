@extends('dashboard')

@section('body')
    <div class=" md:mt-16 pb-12 pt-12 lg:px-8  mx-auto relative bg-three">
        <div class="w-max absolute left-1 top-0">
            <x-dropdown align="left" width="w-52">
                <x-slot name="trigger">
                    <x-dropdown-link class="cursor-pointer">
                        <span class="fas fa-list text-2xl "> </span>
                    </x-dropdown-link>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link href="{{ route('users.create') }}" class=" ">
                        <span class="fas fa-user-plus w-7"></span> Nuevo Usuario
                    </x-dropdown-link>
                    @if ($user->saldo > 0)
                        <x-dropdown-link form="fCobrar" class="confirm cursor-pointer"
                            data-label="¿Cobrar ${{ $user->saldo }}?">
                            <span class="fas fa-hand-holding-usd w-7 "></span> Registrar saldo
                        </x-dropdown-link>
                    @endif
                </x-slot>
            </x-dropdown>
            <form action="{{ route('users.cobrar', $user) }}" method="POST" id="fCobrar"> @csrf</form>
        </div>
        <div class="max-w-3xl w-full mx-auto z-10 px-3">
            <div class="h-32 w-full max-w-lg mx-auto rounded-xl shadow-xl bg-three flex items-center pl-3">
                <div class="w-16 h-16 lg:w-20 lg:h-20 rounded-full bg-contain bg-no-repeat" style="background-image: url('{{$user->photo()}}')"></div>
                <div class="w-full h-full flex flex-col rounded-xl pl-4 py-4">
                    <span class="font-bold uppercase text-xl">{{$user->fullname}}</span>
                    <div class="flex space-x-2 divide-x-2 w-full overflow-hidden overflow-ellipsis whitespace-nowrap">
                        <span class="w-24 lg:w-28">{{$user->rolename}}</span>
                        <span class="pl-2 w-40 lg:w-72 overflow-hidden overflow-ellipsis whitespace-nowrap">{{$user->email}}</span>
                    </div>
                    <div class="flex space-x-2 divide-x-2 w-full overflow-hidden overflow-ellipsis whitespace-nowrap">
                        <span class="w-24 lg:w-28">{{$user->phone}}</span>
                        <span class="pl-2">{{$user->cedula}}</span>
                    </div>
                </div>
            </div>
        </div>

        @if ($partidas->count())
            <h1 class="mt-8 mb-2 text-center font-bold text-lg uppercase ">Partidas de {{ $user->fullname }}</h1>
            <div
                class="grid grid-cols-1 {{ $partidas->count() == 1 ? 'mx-auto ' : ($partidas->count() == 2 ? 'md:grid-cols-2' : 'md:grid-cols-3') }} max-w-5xl mx-auto gap-6  p-3 text-center w-full">
                @foreach ($partidas as $partida)
                    <div class="flex items-center h-full w-full max-w-sm mx-auto ">
                        <div class=" border w-full border-gray-300 p-4 block bg-white rounded-xl  pt-2 relative">
                            <div class="border-b py-1 border-gray-300">
                                <h1 class="text-center font-bold uppercase text-xl">{{ $partida->detalle }}</h1>
                            </div>
                            <div class="flex justify-between border-b py-1 border-gray-300">
                                <span class="font-bold uppercase">Ingreso</span>
                                <span class="font-semibold text-base">
                                    ${{ number_format($partida->entrada, 2) }}</span>
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
            <h1 class="text-center font-bold uppercase text-xl">No se encontraron resultados</h1>
        @endif

    </div>
@endsection
