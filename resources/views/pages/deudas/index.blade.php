@extends('dashboard')

@section('body')
    <div class="py-4 md:py-16 mt-16 pt-8 md:pt-4 px-4 bg-three relative">
        <div class="absolute top-1 left-1">
            <x-dropdown-link href="{{ route('deudas.create') }}">
                <span class="fas fa-plus text-xl md:text-2xl"> </span>
            </x-dropdown-link>
        </div>
        <div class="absolute right-2 top-1">
            <div class="flex">
                <x-dropdown-link class="flex space-x-1" href="{{route('deudas.activos')}}">
                    <div class="w-4 h-4 bg-one"></div>
                    <small class="{{request()->routeIs('deudas.activos')?'font-bold':'font-normal'}}">Activos</small>
                </x-dropdown-link>
                <x-dropdown-link class="flex space-x-1" href="{{route('deudas.atrasados')}}">
                    <div class="w-4 h-4 bg-red-400"></div>
                    <small class="{{request()->routeIs('deudas.atrasados')?'font-bold':'font-normal'}}">Pendientes</small>
                </x-dropdown-link>
                <x-dropdown-link class="flex space-x-1" href="{{route('deudas.historial')}}">
                    <div class="w-4 h-4 bg-green-400"></div>
                    <small class="{{request()->routeIs('deudas.historial')?'font-bold':'font-normal'}}">Pagados</small>
                </x-dropdown-link>
            </div>
        </div>
        @if ($deudas->count())

            <h1 class="uppercase font-bold text-center text-xl md:text-2xl my-2 mb-4 md:mb-10">Listado de Préstamos</h1>
            <div
                class="grid grid-cols-1 {{ $deudas->count() == 1 ? 'mx-auto ' : ($deudas->count() == 2 ? 'md:grid-cols-2' : 'md:grid-cols-3') }} max-w-5xl mx-auto gap-6 bg-three p-3 text-center w-full">
                @foreach ($deudas as $deuda)
                    @if ($deuda->saldo_actual > 50)
                        <x-grid-data title="{{ $deuda->cliente->fullname() }}"
                            subtitle="${{ number_format($deuda->saldo_actual, 2) . ' (' . $deuda->tipo . ')' }}"
                            actionText="Ver Detalles"
                            :proxpago="date_format(date_create(($deuda->proxpago)->fecha), 'd M Y')"
                            actionLink="{{ route('deudas.show', $deuda) }}" icon="{{ 'fa-dollar-sign' }}"
                            :estado='$deuda->estado' />
                    @else
                        <x-grid-data title="{{ $deuda->cliente->fullname() }}"
                            subtitle="${{ number_format($deuda->saldo_actual, 2) . ' (' . $deuda->tipo . ')' }}"
                            actionText="Ver Detalles" :proxpago="date_format($deuda->updated_at, 'd M Y')"
                            actionLink="{{ route('deudas.show', $deuda) }}" icon="{{ 'fa-dollar-sign' }}" :pagado="true"
                            estado='pagado' />
                    @endif

                @endforeach
            </div>



        @else
            <h1 class="font-bold text-center text-2xl md:text-4xl uppercase">
                No hay p´restamos registrados
            </h1>
        @endif
    </div>
@endsection
