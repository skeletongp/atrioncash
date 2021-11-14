@extends('dashboard')

@section('body')
    <div class=" md:mt-16 pb-12  max-w-4xl mx-auto relative">
        <div class="w-max absolute left-1 top-0">
            <x-dropdown align="left">
                <x-slot name="trigger">
                    <x-dropdown-link class="cursor-pointer">
                        <span class="fas fa-plus "> </span>
                    </x-dropdown-link>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link href="{{ route('users.create') }}" class=" ">
                        <span class="fas fa-user-plus w-7"></span> Nuevo Usuario
                    </x-dropdown-link>
                    <x-dropdown-link form="fCobrar" class="confirm cursor-pointer" data-label="¿Cobrar ${{$user->saldo}}?">
                        <span class="fas fa-hand-holding-usd w-7 "></span> Cobrar saldo
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
            <form action="{{route('users.cobrar',$user)}}" method="POST" id="fCobrar"> @csrf</form>
        </div>
        <div class="my-3 mb-8">
            <x-user-card :title="$user->fullname" :subtitle="$user->rolename" :data="'Saldo: $'.number_format($user->saldo,2)"
                :edit="route('users.edit', $user)" :delete="route('users.destroy', $user)" :userId="$user->id"
                :bg="$user->photo()" :show="''">

            </x-user-card>

        </div>
        @if (0)
            <h1 class="mt-8 mb-2 text-center font-bold text-lg uppercase ">Partidas de {{ $user->fullname }}</h1>
            <div
                class=" grid grid-cols-1 {{ $user->deudas()->count() > 1 ? 'md:grid-cols-2' : 'max-w-sm mx-auto' }}  px-3 pb-6 gap-6">



            </div>
            {{-- <div class="my-2">
                    {{$users->links()}}
                </div> --}}
        @else
            <h1 class="text-center font-bold uppercase text-xl">No se encontraron resultados</h1>
        @endif

    </div>
@endsection
