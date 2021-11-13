@extends('dashboard')

@section('body')
    <div class="max-w-sm mx-auto py-16">
        <h1 class="my-4 text-center font-bold text-xl lg:text-2xl">Generar nuevo contrato</h1>
        <div class="mx-4">
            <form action="{{ route('contratos.store') }}" method="POST" class="flex flex-col items-end space-y-4">
                @csrf
                <div class="w-full">
                    <x-select required name="deuda_id">
                        <x-slot name="label">Préstamo</x-slot>
                        <option value="">Seleccione un préstamo</option>
                        @foreach ($deudas as $deuda)
                            <option value="{{ $deuda->id }}">{{ $deuda->cliente->name . ' $' . number_format($deuda->saldo_inicial,2)}}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="w-full">
                    <x-select required name="notario_id">
                        <x-slot name="label">Notario</x-slot>
                        <option value="">Seleccione un notario</option>
                        @foreach ($notarios as $notario)
                            <option value="{{ $notario->id }}">{{ $notario->name}}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="w-full">
                    <x-label class="text-lg font-bold">Condición Especial</x-label>
                    <div class="border border-blue-200 relative overflow-hidden w-full p-3 hover:border-blue-400 hover:shadow-md">
                        <textarea name="parrafo" id="parrafo" rows="5"
                        class="border w-full border-none outline-none"></textarea>

                    </div>
                   
                </div>
                <div class="">
                    <x-button class="bg-one text-white">
                        Generar
                    </x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
