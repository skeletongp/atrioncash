<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <h3 class="h-info" style="float: right">{{ date('d M, Y', strtotime($cuota->created_at)) }}</h3>
</head>
<div class="body">
    @if ($status==0)
    <div class="cancelado">

    </div>
@endif
    <div class="div-title">
        <div class="logo"></div>
        <h3 class="h-title">{{ $negocio->name }}</h3>
        <h3 class="h-subtitle"><i class="icon-phone-sign"></i>
            {{ $negocio->phone }}</h3>
        <h3 class="h-subtitle">{{ $negocio->location }}</h3>
        <h3 class="h-subtitle">{{ $negocio->address }}</h3>
    </div>
    <hr>

    {{ setlocale(LC_ALL, 'es_ES.UTF-8') }}
    <div class="info">
        <table style="width: 70mm; margin: 0 auto 0 auto">
            <tr>
                <td style="width:30mm; text-align:center">

                    <h3 class="h-name">Pagado por:</h3>
                    <h3 class="h-info">{{ $cliente->fullname() }}</h3>
                    <h3 class="h-info">Tel.: {{ $cliente->phone }}</h3>
                </td>
                <td style="width:30mm; text-align:center; border-left: dotted 0.3px black;">

                    <h3 class="h-name">Cobrado por:</h3>
                    <h3 class="h-info">{{ $user->fullname() }}</h3>
                    <h3 class="h-info">Tel.: {{ $user->phone }}</h3>

                </td>
            </tr>
        </table>
    </div>
    <hr>
    <div class="details">
        <table class="table">

            <tbody class="tbody">
                <tr class="trbody" style="font-size: large">
                    <td
                        style="width:35mm; max-width: 35mm; font-weight:bold; text-transform:uppercase; font-size:1.25rem">
                        Saldo Inicial</td>
                    <td style="max-width: 5mm; font-weight: bold; font-size:1.1rem">
                        ${{ number_format($cuota->deuda->saldo_inicial, 2) }}</td>
                </tr>
                <tr class="trbody" style="font-size: large">
                    <td
                        style="width:35mm; max-width: 35mm; font-weight:bold; text-transform:uppercase; font-size:1.25rem">
                        Saldo Pendiente</td>
                    <td style="max-width: 5mm; font-weight: bold; font-size:1.1rem">
                        ${{ number_format($cuota->deuda->saldo_actual+$cuota->capital, 2) }}</td>
                </tr>
                <tr style="margin-top:10rem; background-color: #fff">
                    <td colspan="2" class="td-total" style="color: #fff">
                        ------------------------------------------------------------------------------------</td>
                </tr>

                <tr class="trbody" style="font-size: large">
                    <td
                        style="width:35mm; max-width: 35mm; font-weight:bold; text-transform:uppercase; font-size:1.25rem">
                        Capital abonado</td>
                    <td style="max-width: 5mm; font-weight: bold; font-size:1.1rem">
                        ${{ number_format($cuota->capital, 2) }}</td>
                </tr>
                <tr class="trbody" style="font-size: large">
                    <td
                        style="width:35mm; max-width: 35mm; font-weight:bold; text-transform:uppercase; font-size:1.25rem">
                        Interés abonado</td>
                    <td style="max-width: 5mm; font-weight: bold; font-size:1.1rem">
                        ${{ number_format($cuota->interes, 2) }}</td>
                </tr>
                <tr class="trbody" style="font-size: large">
                    <td
                        style="width:35mm; max-width: 35mm; font-weight:bold; text-transform:uppercase; font-size:1.25rem">
                        Cuota total</td>
                    <td style="max-width: 5mm; font-weight: bold; font-size:1.1rem">
                        ${{ number_format($cuota->deber, 2) }}</td>
                </tr>

                <tr style="margin-top:10rem; background-color: #fff">
                    <td colspan="4" class="td-total" style="color: #fff">
                        ------------------------------------------------------------------------------------</td>
                </tr>

            </tbody>
        </table>
    </div>
    <table class="tb_firm">
        <tbody>
            <tr>
                <td>
                    <div class="firm">
                        <h3>Cajero: </h3>
                        <span>{{ $cuota->name }}</span>
                    </div>
                </td>
               
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <h3>¡GRACIAS POR PREFERIRNOS!</h3>
        @if ($cuota->cash)
            <h4>**{{ $cuota->note }} **</h4>
            <h4>** Favor revisar su factura al momento de pagar.**</h4>
            <h4>** No se aceptan devoluciones.**</h4>
        @else
            <h4>** Ticket para fines de estimación.**</h4>
            <h4>** Los precios pueden variar al momento de la compra.**</h4>
            <h4>** Trabajamos con un abono del 50% antes de iniciar un trabajo.**</h4>
        @endif
    </div>
</div>
<script type="text/javascript">
    try {
        this.print();
    } catch (e) {
        window.onload = window.print;
    }
</script>


<style>
    * {
        font-size: 10px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        transform: scale(0.99)
    }


    @page {
        size: 80mm 257mm;
        padding: 0;
        margin: 3mm 1mm 0 1mm
    }

    .body {
        max-width: 80mm;
        min-width: 80mm;
        margin: 0 auto 0 auto;
        padding: 0;
        position: relative;
    }

    .div-title {
        text-align: center
    }

    .logo {
        width: 20mm;
        height: 20mm;

        border-radius: 3.8rem 3.8rem 3.8rem 3.8rem;
        background-color: #BC544B;
        margin: 0 auto 0 auto;
        background-position: center;
        background-size: cover;
        background-image: url(<?php echo $negocio->photo(); ?>);
    }

    .h-title {
        margin-top: 5px;
        font-size: 15px;
        text-transform: uppercase;
        font-weight: bold;
    }

    .h-subtitle {
        margin-top: 5px;
        font-size: 12px;
        text-transform: capitalize;
        font-weight: bold;
    }

    .div-title h3 {
        margin-bottom: -4px;
    }

    hr {
        border-top: #888 1px;
        margin: 10px 2px 10px 2px;
    }

    .info {

        margin: 0px 5px 0px 5px;
    }

    .info-factura {
        text-align: right;
    }

    .cliente {}

    .info div {
        height: 18mm;
        width: 46%;
        padding: 0.3rem;
    }

    .h-name {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 13px;
        margin-bottom: 4px;
        margin-top: -1px
    }

    .h-info {
        font-weight: 300;
        font-size: 13px;
        margin-bottom: -2px;
        margin-top: 1px
    }

    .details {}

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-left: 30%
    }

    .thead th {
        padding: 4px 2px 4px 2px;
        text-transform: uppercase
    }

    .tbody td {
        padding: 1px 2px 1px 2px;

    }

    .tbody .trbody {
        border-top: rgba(200, 200, 200, 0.25) solid 0.05px;
        text-align: left;
    }

    .td-total {
        text-align: right;
        font-weight: bold;
        font-size: 11px;
        text-transform: uppercase;
    }



    .footer {
        margin-top: 20px;
        text-align: center;
        height: 7.5rem;
    }

    .footer h3 {
        font-size: 14px;
        text-align: center;
        width: fit-content;
        margin-bottom: 3px;
    }

    .footer h4 {
        font-size: 11px;
        text-align: center;
        width: 70%;
        margin: 0 auto 0 auto;
        word-wrap: break-word;
    }

    .tb_firm {
        width: 100%
    }

    .tb_firm td {
        text-align: center
    }

    .firm {
        font-size: 12px;
    }

    .firm span {
        text-transform: uppercase;
        font-size: 11px;
    }

    .firm h3 {
        margin-bottom: 5px;
    }

    .back {
        font-weight: bold;
        font-size: 1.5rem;
        cursor: pointer;
    }

    .cancelado {
        width: 50mm;
        margin: auto;
        z-index: 50;
        top: 2mm;
        height: 18mm;
        position: fixed;
        background-image: url('images/fueradefecha.png');
        background-repeat: no-repeat;
        background-size: contain;
        background-color: transparent;
    }

</style>
