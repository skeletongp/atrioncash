@props(['title', 'subtitle', 'actionText', 'actionLink', 'icon'])
<div
    class="card transition select-none bg-white h-96 w-72  m-auto top-0 bottom-0 shadow-2xl transform hover:scale-105 overflow-hidden">
    <h2 class="transition dto-num">{{ $title }}<br><small
            class=" font-normal text-base">{{ $subtitle }}</small>
    </h2>
    <div class="cta-container transition text-center mt-72 absolute z-50 w-full">
        <a href="{{ $actionLink }}"
            class="cta text-white border-2 border-blue-500 bg-blue-500 py-2 px-6 rounded-full text-lg font-bold">
            {{ $actionText }}
        </a>
    </div>
    <div class="card_circle bg-one transition flex items-end justify-center">
        <span class="fas {{$icon}} text-6xl mb-8 icon transition text-white"></span>
    </div>
</div>
