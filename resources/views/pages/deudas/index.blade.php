@extends('dashboard')

@section('body')
    <div class="pb-12 px-4">
        @if ($deudas->count())
            <h1 class="uppercase font-bold text-center text-xl my-2">Préstamos activos</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 max-w-4xl mx-auto gap-6 bg-three p-3 text-center w-full">

                @foreach ($deudas as $deuda)
                    <x-grid-data title="{{ $deuda->cliente->fullname() }}" subtitle="${{ number_format($deuda->saldo_actual,2).' ('.$deuda->tipo.')' }}" actionText="Ver Detalles" :proxpago="date_format(date_create($deuda->proxpago->fecha), 'd M Y')"
                        actionLink="{{ route('deudas.show', $deuda) }}" icon="{{ 'fa-dollar-sign' }}" />
                @endforeach


            </div>
        @else

        @endif
    </div>
@endsection
