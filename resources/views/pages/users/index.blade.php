@extends('dashboard')

@section('body')
    <div class=" max-w-5xl mx-auto">
        <div class="  pb-32 md:pb-2 md:mt-16 relative ">
            <a href="{{ route('users.create') }}"
                class="w-10 h-10 rounded-full bg-one flex items-center justify-center hover:bg-blue-400 absolute top-0 left-1 text-white hover:text-blue-800 transform hover:scale-105 shadow-xl">
                <span class="fas fa-plus "> </span>
            </a>
            <h1 class="mt-3 mb-5 text-center font-bold text-lg uppercase lg:text-3xl" >Registro de usuarios</h1>
            <div class="max-w-md mx-auto px-12 md:px-4 h-full text-center space-y-4">
                <form action="" class="mb-4">
                    <div class="space-y-2">
                        <x-label class="font-bold text-lg text-left">Buscar user</x-label>
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
            @if ($users->count())
                <div class=" grid grid-cols-1 {{$users->count()==1?'mx-auto ':($users->count()==2?'md:grid-cols-2':'md:grid-cols-3')}} p-4 gap-6 my-4 bg-three lg:p-8 ">
                    @foreach ($users as $user)
                        <x-user-card :title="$user->name.' '.$user->lastname" :subtitle="$user->rolename" :data="'Saldo: $'.number_format($user->saldo,2)"
                            :edit="route('users.edit', $user)" :delete="route('users.destroy', $user)"
                            :userId="$user->id" :bg="$user->photo()" :show="route('users.show', $user)">

                        </x-user-card>
                    @endforeach


                </div>
                <div class="my-2">
                    {{ $users->links() }}
                </div>
            @else
                <h1 class="text-center font-bold uppercase my-8 text-xl">No se encontraron resultados</h1>
            @endif

        </div>
    </div>
@endsection
