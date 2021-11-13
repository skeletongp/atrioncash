@extends('dashboard')
@section('body')
<div class=" max-w-4xl mx-auto">
    <div class="  pb-32 md:pb-2 md:mt-16 md:pt-16 relative ">
        <a href="{{ route('notarios.create') }}"
            class="w-10 h-10 rounded-full bg-one flex items-center justify-center hover:bg-blue-400 absolute top-0 left-1 text-white hover:text-blue-800 transform hover:scale-105 shadow-xl">
            <span class="fas fa-plus "> </span>
        </a>
        <h1 class="mt-3 mb-5 text-center font-bold text-lg uppercase lg:hidden" id="hTitle">Listado de notarios</h1>
       
        @if ($notarios->count())
            <div class=" grid grid-cols-1 md:grid-cols-3 p-4 gap-6 my-4 pl-0">
                @foreach ($notarios as $notario)
                    <x-user-card :title="$notario->titulo.' '.$notario->name" :subtitle="$notario->phone"
                        :edit="route('notarios.edit', $notario)" :delete="route('notarios.destroy', $notario)"
                        :userId="$notario->id" :bg="$notario->photo()" :show="route('notarios.show', $notario)">

                    </x-user-card>
                @endforeach


            </div>
           
        @else
            <h1 class="text-center font-bold uppercase text-xl">No se encontraron resultados</h1>
        @endif

    </div>
</div>
@endsection