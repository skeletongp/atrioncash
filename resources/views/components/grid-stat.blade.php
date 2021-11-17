@props(['title', 'subtitle', 'actionText', 'actionLink', 'icon'])
<div
    class="card transition select-none bg-white h-56 -py-8 w-72  m-auto top-0 bottom-0 shadow-2xl transform hover:scale-105 overflow-hidden rounded-xl" style="overflow: hidden">
    <h2 class="transition flex flex-col space-y-0 font-bold text-blue-500 mt-28 dto-num">
        <span> {{ $title }}</span>
        <small class="font-normal text-base">{{ $subtitle }}</small>
    </h2>
    <div class="cta-container transition text-center mt-72 absolute z-30 w-full">
        <a href="{{ $actionLink }}"
            class="cta text-black border-2 border-blue-100 bg-two py-2 px-6 rounded-full text-lg font-bold">
            {{ $actionText }}
        </a>
    </div>
    <div class="card_circle bg-one h-96 -mt-72 transition flex items-end justify-center">
        <span class="fas {{$icon}} text-6xl mb-5 icon transition text-white"></span>
    </div>
</div>
