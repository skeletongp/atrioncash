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
        <article class=" pb-8 border px-4">
            <h1 class="text-center font-bold uppercase text-xl my-3">Recibo de pago</h1>
            <table class=" relative border m-1">
                <tbody>
                    <tr>
                        <td data-label="Fecha" class="">
                            {{ date('d M Y') }}</td>
                        <td data-label="Monto">
                            <div class="flex items-center justify-end lg:justify-center space-x-2">
                                ${{ number_format($user->saldo, 2) }}
                            </div>
                        </td>

                        <td data-label="Entrega">{{ $user->fullname }}</td>
                        <td class="font-bold" data-label="Recibe">
                            {{ $admin->fullname }}</td>
                    </tr>
                </tbody>
            </table>
            <h1 class="text-center m-1 mt-4"><b>Recibió:</b>_____________________________</h1>



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



    table tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: .35em
    }


    table {
        border: 0
    }



    table tr {
        border-bottom: 3px solid #ddd;
        display: block;
        margin-bottom: .625em
    }

    table td {
        border-bottom: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
        font-size: .8em;
        text-align: right
    }

    table td::before {
        content: attr(data-label);
        float: left;
        font-weight: 700;
        text-transform: uppercase
    }

    table td:last-child {
        border-bottom: 0
    }

</style>
<script>
    $('document').ready(function() {
        window.print();
    })
    window.onafterprint = function() {
       location.href='/';
    }
</script>

</html>
