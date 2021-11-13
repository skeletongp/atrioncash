<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>{{ $contrato->cliente->fullname() }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <style>
        @page {
            size: legal
        }

    </style>
</head>

<body class="legal">

    <section class=" mx-auto px-12 py-24  bg-white">
        <article class="mx-2 border-double   border-l-2 border-r-2 border-red-500 px-8">
            <h1 class="text-center font-bold text-2xl my-2 mb-4"> PAGARE NOTARIAL</h1>
            <h1 class="text-right font-bold text-lg my-2 mb-4"> ACTO No.________________</h1>
            {{-- Presentación de comparecientes --}}
            <p>
                En la ciudad de <b>{{ $contrato->notario->municipio->nombre }}, {{ $contrato->notario->municipio->provincia->nombre }}</b>, a los <b>{{ $dia }}
                    ({{ date_format($date, 'd') }})  días
                    del mes de {{ $mes }} del año {{ $año }} ({{ date_format($date, 'Y') }})</b>,
                por
                ante mí, <b class="uppercase">{{ $contrato->notario->titulo . ' ' . $contrato->notario->name }}</b>,
                Abogado
                Notario Público de los del Número de {{ $contrato->notario->municipio->nombre }}, de nacionalidad
                dominicana, mayor de edad, titular de la
                Cédula
                de Identidad y Electoral <b>No. {{ $contrato->notario->cedula }}</b>, miembro activo del Colegio de
                Notarios de la República
                Dominicana, bajo la Matrícula <b>No. {{ $contrato->notario->matricula }}</b>, con estudio Profesional
                abierto en {{ $contrato->notario->direccion }}, compareció quien se nombra <b
                    class="uppercase">{{ $contrato->cliente->name.' '.$contrato->cliente->lastname }}</b>,
                de nacionalidad dominicana,
                mayor de edad, titular de la cédula de Identidad y Electoral <b>No.
                    {{ $contrato->cliente->cedula }}</b>, quien, por medio del presente
                acto, se constituye en <b>DEUDOR</b>, y de la otra parte, quien se nombra <b
                    class="uppercase">{{ $contrato->user->fullname }}</b>, de nacionalidad dominicana, Mayor de
                Edad,
                titular de la cédula de Identidad y Electoral <b>No. {{ $contrato->user->cedula }}</b>, con domicilio
                en {{ $contrato->negocio->address }}, quien se constituye como <b>ACREEDOR</b>, declarándome lo
                siguiente:
            </p>
            {{-- Declaración de la deuda --}}
            <p>
                Que el motivo de su comparecencia ante mí, es para declararme que el <b>DEUDOR</b> le ha
                tomado prestada
                al <b>ACREEDOR</b>, la suma de <b
                    class="uppercase">{{ $f->format($contrato->deuda->saldo_inicial) }} PESOS
                    (${{ number_format($contrato->deuda->saldo_inicial, 2) }})</b>, suma ésta que
                declara
                haber recibido de manos de su <b>ACREEDOR</b>, a título de préstamo en efectivo, a su entera
                satisfacción en
                esta
                misma fecha, a razón de un <b class="uppercase">{{ $f->format($contrato->deuda->interes) }} por
                    ciento ({{ $contrato->deuda->interes }}%)</b> de interés {{$contrato->deuda->periodicidad}} sobre el saldo pendiente, hasta el
                vencimiento del presente pagaré, suma que se obliga y compromete a pagar en
                {{ $f->format($contrato->deuda->cuotas) }} ({{ $contrato->deuda->cuotas }}) cuotas
                {{ $contrato->deuda->periodicidad }}es ininterrumpidas, a partir del
                <b>{{ date_format(date_create($contrato->deuda->proxpago->fecha), 'd/M/Y') }}</b>.
            </p>
            {{-- Declaración de ganarantía --}}
            <p>
                Para la garantía del presente préstamo la parte
                <b>DEUDORA</b>
                autoriza a la parte <b>ACREEDORA</b>, A QUE EN CASO DE ESTE NO CUMPLIR CON LO QUE ESTÁ ESTABLECIDO EN EL
                PRESENTE
                CONTRATO, ESTE PUEDE APODERARSE DEL BIEN O INMUEBLE QUE ESTÉ A SU NOMBRE VALORADO POR EL MONTO DE LA
                DEUDA
                DESCRITA.
            </p>
            <p> Además, queda por entendido que, a la falta del pago del presente pagaré, se hará exigible la garantía
                detallada más arriba y sus intereses y gastos de ejecución en caso de que proceda. A los mismos
                términos,
                las partes <b>DEUDORA</b> y <b>ACREEDORA</b> declaran, que, si al vencimiento del presente préstamo no se ha concluido
                con
                lo previsto en el mismo, la parte <b>DEUDORA</b> pagará un <b class="uppercase">cinco por ciento (5%)</b> por el mes de retardo sobre el
                capital absoluto acreditado.<b>EL DEUDOR</b>, consiente y su <b>ACREEDOR</b> acepta que deberá liquidar la
                obligación
                convenida en pesos dominicanos. El DEUDOR compareciente hace saber que conoce la existencia del artículo
                <b class="uppercase">Mil
                    doscientos veintiséis (1226)</b> del <b>Código Civil Dominicano</b>, el cual establece que la cláusula penal es
                aquella
                por la cual una persona, para asegurar la ejecución de un convenio, se obliga a alguna cosa en caso de
                faltar a su cumplimiento.
            </p>

            {{-- Coletilla final --}}
            <div class="firma mt-16"></div>
            @if ($contrato->parrafo)
                <p>
                Párrafo:  {{$contrato->parrafo}}  
                </p>
            @endif
            <p >
                Hecho y firmado en mi estudio el día, mes y año antes señalados; acto que ha sido hecho en presencia de
                los
                arriba descritos, quienes, después de haber escuchado y entendido la lectura del presente acto, han
                procedido a firmarlo junto conmigo y ante mí, notario público infrascrito que <b class="uppercase">certifico y doy fe</b> ha
                sido el
                presente documento firmado y rubricado de buena fe, en dos originales de un mismo tenor y efecto
              <b>ACREEDOR</b> y
                <b>DEUDOR</b>, en la Ciudad de {{$contrato->notario->municipio->nombre}}, {{$contrato->notario->municipio->provincia->nombre}}, República Dominicana, a los <b>{{ $dia }}
                    ({{ date_format($date, 'd') }}) días
                    del mes de {{ $mes }} del año {{ $año }} ({{ date_format($date, 'Y') }})</b>

            </p>
            <div class="flex justify-between mt-16 mb-12">
                <div class="text-center flex flex-col items-center w-full uppercase">
                    <span class=" border-b-2 border-black font-bold">{{$contrato->cliente->fullname()}}</span>
                    <span>Deudor</span>
                </div>
                <div class="text-center flex flex-col items-center w-full uppercase">
                    <span class=" border-b-2 border-black font-bold"> {{$contrato->user->fullname}}</span>
                    <span> Acreedor</span>
                </div>
            </div>
            <div class="text-center flex flex-col items-center mt-6 uppercase">
                <span class=" border-b-2 border-black font-bold"> {{$contrato->notario->titulo.' '.$contrato->notario->name}}</span>
                <span> Abogado Notario</span>
            </div>
        </article>
        <div class="flex justify-center uppercase hide-print mt-10">
            <x-button id="print" class="bg-one text-white">Imprimir</x-button>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
<style>
    section {
        text-align: justify;
        line-height: 1.7;
        font-size: 12;
        width: 215.9mm;
        font-family: Arial, Helvetica, sans-serif
    }

    p {
        margin-bottom: 1rem;
    }

    @media print {
        .firma {
            page-break-before: always;
        }
        .hide-print{
            display: none;
        }
    }

</style>
<script>
    $('#print').click(function(){
        window.print();
    })
</script>
</html>
