<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <style>
        @page {
            size: 80mm 297mm
        }

    </style>
</head>

<body class="legal">

    <section class=" mx-auto  py-12  bg-white">
        <article class="mx-1  px-1 pb-8">
            <h1 class="text-center font-bold mb-3">Amortización de préstamo</h1>
            <h1 class="font-bold mb-2 flex justify-between w-full">Préstamo: <span>${{ number_format($deuda, 2) }}</span>
            </h1>
            <h1 class="font-bold mb-2 flex justify-between w-full">No. Cuotas: <span>{{ count($data->pagos) }}</span>
            </h1>
            <h1 class="font-bold mb-2 flex justify-between w-full hide-print">Total:
                <span>${{ number_format($data->suma, 2) }}</span></h1>
            <div class=" " style="width:80mm">
                <div class="grid grid-cols-2 mb-2 border border-blue-100 p-2 text-xs">
                    @foreach ($data->pagos as $pago)
                        <div class="grid grid-cols-2 mb-2 border border-blue-100 p-2 text-xs">
                            <span class="font-bold">Fecha</span>
                            <span>{{ date_format(date_create($pago->fecha), 'd/m/Y') }}</span>
                            <span class="font-bold">Saldo</span>
                            <span>${{ number_format($pago->saldo, 2) }}</span>
                            <span class="font-bold">Cuota</span>
                            <span>${{ number_format($pago->deber, 2) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-full h-6">

            </div>


            <div class="flex justify-between uppercase hide-print mt-10">
                <x-button id="print" class="bg-one text-white">Imprimir</x-button>
                <x-button id="print" class="bg-one text-white">Imprimir</x-button>
            </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
<style>
    section {
        text-align: justify;
        line-height: 1.7;
        font-size: 10;
        width: 80mm;
        font-family: Arial, Helvetica, sans-serif
    }


    p {
        margin-bottom: 1rem;
    }

    @media print {
        .firma {
            page-break-before: always;
        }

        .hide-print {
            display: none;
        }
    }

</style>
<script>
    $('#print').click(function() {
        window.print();
    })
</script>

</html>
