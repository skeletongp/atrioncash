@extends('dashboard')
@section('body')
    <div class="md:h-full  flex flex-col justify-center items-center py-3 pb-16">
        <h1 class="uppercase text-center font-bold text-xl lg:text-3xl my-4">Listado de planes disponibles</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 ">
            @foreach ($plans as $plan)
                <div class="container relative  md:py-16 w-full">
                    <div class="card relative bg-white shadow-2xl rounded-xl overflow-hidden mx-auto"
                        style="width: 320px; height:350px">
                        <div class="imgBx">
                            <img src="/images/logo.png" alt="Atrioncash" class="ml-3">
                        </div>
    
                        <div class="contentBx">
    
                            <h2 class="uppercase text-one font-bold text-xl lg:text-3xl flex flex-col">
                                <span class="text-sm">Plan</span>
                                {{$plan->name}}</h2>
    
    
                            <div class="color flex">
                                <p class=" font-bold">
                                   Paga sólo ${{number_format($plan->price,2)}}
                                </p>
                            </div>
                            <a class="confirm cursor-pointer" data-label="¿Contratar el plan: {{$plan->name}}?" form="f{{$plan->id}}">Contratar</a>
                            <form action="{{route('plans.suscribe', $plan->id)}}" id="f{{$plan->id}}"></form>
                        </div>
    
                    </div>
                </div>
    
            @endforeach
        </div>
    </div>
@endsection
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:100,300,400,500,600,700,800, 800i, 900&display=swap');


    .container .card:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height:50%;
        background: #142F43;
        transition: 0.5s ease-in-out;
    }

    .container .card:hover:before {
        clip-path: circle(300px at 80% 25%);
        background: #010b13;
    }

    .container .card:after {
        content: "Atrion";
        position: absolute;
        top: 45%;
        left: 10%;
        font-size: 5.5em;
        font-weight: 800;
        font-style: italic;
        color: rgba(255, 255, 255, 0.04);

    }

    .container .card .imgBx {
        position: absolute;
        top: 55%;
        transform: translateY(-50%);
        width: 100%;
        height: 100%;
        transition: .5s;
    }

    .container .card:hover .imgBx {
        top: 0%;
        transform: translateY(-28%);
        /* bug  */
    }

    .container .card .imgBx img {
        position: absolute;
        top: 60%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(20deg);
        width: 180px;
        transition: 0.5s ease-in-out;
    }
    .container .card:hover .imgBx img {
        top: 55%;
        width: 270;
    }

    .container .card .contentBx {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 100px;
        text-align: center;
        transition: 1s;
    }

    .container .card:hover .contentBx {
        height: 200px;
    }

    .container .card .contentBx h2 {
        position: relative;
        font-weight: 600;
        letter-spacing: 1px;
        color: #000;
    }


    .container .card .contentBx .color {
        justify-content: center;
        align-items: center;
        padding: 8px 20px;
        transition: .5s;
        opacity: 0;
        visibility: hidden;
    }


    .container .card:hover .contentBx .color {
        opacity: 1;
        visibility: visible;
        transition-delay: .6s;
    }

    .container .card .contentBx a {
        display: inline-block;
        padding: 10px 20px;
        background: #142F43;
        border-radius: 4px;
        margin-top: 10px;
        text-decoration: none;
        font-weight: 600;
        color: #fff;
        opacity: 0;
        transform: translateY(50px);
        transition: .5s;
    }

    .container .card:hover .contentBx a {
        opacity: 1;
        transform: translateY(0px);
        transition-delay: .7s;
    }

</style>
