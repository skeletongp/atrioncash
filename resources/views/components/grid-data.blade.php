@props(['title', 'subtitle', 'actionText', 'actionLink', 'icon', 'proxpago', 'pagado'=>false, 'estado'=>'al día'])
<div
    class="card transition select-none bg-white h-56 -py-8 w-72  m-auto top-0 bottom-0 shadow-2xl transform hover:scale-105 overflow-hidden rounded-xl">
    <h2 class="transition flex flex-col space-y-0 font-bold text-blue-500 mt-32 dto-num">
        <span class="w-72 px-3 overflow-hidden overflow-ellipsis whitespace-nowrap"> {{ $title }}</span>
        <small class="text-lg font-bold ">{{ $subtitle }}</small>
    </h2>
    <div class="cta-container transition text-center mt-72 absolute z-50 w-full">
        <a href="{{ $actionLink }}"
            class="cta text-white border-2 border-white bg-one py-2 px-6 rounded-full text-lg font-bold">
            {{ $actionText }}
        </a>
    </div>
    <div class="card_circle {{$estado=='al día'?'bg-one ':($estado=='atrasado'?'bg-red-400':'bg-green-400')}} h-96 -mt-72 transition flex items-end justify-center">
        <span class="text-2xl mb-8 font-bold text transition text-white flex flex-col space-y-0">
             <small class="text-xs">{{$pagado?'Pagado el':'Próx. Pago'}}</small>
            {{$proxpago}}
        </span>
    </div>
</div>
