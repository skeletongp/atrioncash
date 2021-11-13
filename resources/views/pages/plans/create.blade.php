@extends('dashboard')

@section('body')
    <div class="max-w-sm mx-auto  w-full h-full py-16 px-3">
        <h1 class="font-bold mt-6 mb-4 text-xl">Registrar nuevo plan</h1>
        <div class=" ">
            <form action="{{ route('plans.store') }}" method="POST" class="space-y-4" id="fPlan">
                @csrf
                <div>
                    <x-input name="name" id="name" type="text" placeholder="Nombre del plan">
                        <x-slot name="label">Nombre</x-slot>
                    </x-input>
                    <x-input-error for="name"></x-input-error>
                </div>
                <div>
                    <x-input name="price" id="price" type="number" placeholder="Precio de la cuota">
                        <x-slot name="label">Precio</x-slot>
                    </x-input>
                    <x-input-error for="price"></x-input-error>
                </div>
                <div>
                    <x-select name="periodo" id="periodo">
                        <x-slot name="label">Período</x-slot>
                        <option value="" class="text-gray-500">Periodicidad del plan</option>
                        <option value="mensual">Mensual</option>
                        <option value="semestral">Semestral</option>
                        <option value="anual">Anual</option>
                    </x-select>
                    <x-input-error for="periodo"></x-input-error>
                </div>
                <div class="flex justify-end">
                    <x-button class="bg-one confirm" form="fPlan" data-label="¿Crear este plan?" >
                        Guardar
                    </x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
