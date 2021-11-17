@extends('dashboard')

@section('body')
    <div class="w-screen h-screen max-w-7xl max-h-screen mx-auto md:p-4 pt-4 md:pt-16 pb-32 md:pb-4  bg-white ">
        <h1
            class="font-bold uppercase text-xl md:text-xl lg:text-4xl text-center my-2 lg:mb-10 w-full overflow-hidden overflow-ellipsis whitespace-nowrap">
            Balance general</h1>

        <div
            class="grid grid-cols-1 md:grid-cols-2 max-w-4xl mx-auto py-12 gap-6 bg-three rounded-xl p-3 text-center w-full">
            <x-grid-stat
                title="{{ '$' . number_format($partidas->sum('entrada')-$partidas->sum('salida'), 2) }}"
                subtitle="Balance del Mes" actionText="Balance General" actionLink="" icon="fa-dollar-sign" />
            <x-grid-stat title="{{ '$' . number_format($balance->capital_prestado, 2) }}" subtitle="Capital Prestado"
                actionText="Ver Préstamos" actionLink="{{ route('deudas.index') }}" icon="fas fa-file-invoice-dollar" />
            <x-grid-stat title="${{ number_format($partidas->sum('entrada'), 2) }}" subtitle="Ingresos del mes"
                actionText="Ver ingresos" actionLink="{{ route('partidas.ingresos') }}" icon="fa-arrow-circle-up transform rotate-180" />
            <x-grid-stat title="${{ number_format($partidas->sum('salida'), 2) }}" subtitle="Gastos del mes"
                actionText="Ver egresos" actionLink="{{ route('partidas.egresos') }}" icon="fa-arrow-circle-down transform  rotate-180" />



        </div>
    </div>
@endsection
