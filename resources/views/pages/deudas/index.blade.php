@extends('dashboard')

@section('body')
    <div class="p-12">
        @if ($deudas->count())
            <div class="grid grid-cols-1 md:grid-cols-2 max-w-4xl mx-auto gap-6 bg-three p-3 text-center w-full">

                @foreach ($deudas as $deuda)
                    <x-grid-data title="{{ $deuda->cliente->fullname() }}" subtitle="${{ number_format($deuda->saldo_actual,2) }}" actionText="Ver Detalles"
                        actionLink="{{ route('deudas.show', $deuda) }}" icon="{{ 'fa-dollar-sign' }}" />
                @endforeach


            </div>
        @else

        @endif
    </div>
@endsection
