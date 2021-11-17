@extends('dashboard')

@section('body')
    <div class="pb-16 md:pb-2 md:mt-16 relative bg-three max-w-md p-3 mx-1 shadow-xl rounded-xl md:mx-auto">
        <h1 class="text-center font-bold text-3xl uppercase my-3">Mi perfil</h1>
        <div
            class="w-full max-w-md mx-auto h-32 rounded-xl pt-6 -mb-4 flex items-end">
            <div class="flex w-full justify-between font-bold bg-one rounded-t-xl text-white">
                <x-dropdown-link class=" w-24 cursor-default  rounded-xl text-left">{{Auth::user()->status}}</x-dropdown-link>
                <x-dropdown-link href="{{route('auth.edit',$user)}}" class=" w-24 cursor  rounded-xl text-right">Editar</x-dropdown-link>

            </div>
        </div>
        <div class="w-full max-w-md mx-auto h-72 rounded-xl flex flex-col items-center bg-white pb-4">
            <div class="w-48 h-48 rounded-full -mt-24 bg-contain bg-no-repeat bg-center"
                style="background-image: url({{ $user->photo() }})">
            </div>
            <h1 class="uppercase  my-2 font-bold text-2xl">{{ $user->fullname }}</h1>
            <div class="flex space-x-2 items-center">
                <h1>{{ $user->rolename }}</h1>
                <span class="fas fa-grip-lines-vertical"></span>
                <h1>{{ $user->phone }}</h1>
            </div>
            <h1>{{ $user->email }}</h1>
            <div class="flex w-full justify-between px-6 mt-6 text-two">
                <div class="text-center flex flex-col">
                    <span class="font-bold uppercase">Ingresos:</span>
                    <span class="font-bold ">${{ number_format($user->partidas()->sum('entrada'), 2) }}</span>
                </div>
                <div class="text-center flex flex-col">
                    <span class="font-bold uppercase">Saldo:</span>
                    <span class="font-bold ">${{ number_format($user->saldo, 2) }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
