@props(['disabled' => false, 'class' => '', 'wLabel'=>'w-24'])


<div class=" py-0 flex justify-between items-center overflow-hidden rounded-md border border-blue-200 relative w-full  {{ $class }}">
    <div class="mx-1 left-2 w-max cursor-default select-none text-two">
        @if (isset($label))
        <div class="border-r-2 pr-2 {{$wLabel}}">
            <span class="font-bold uppercase  ">{{$label}}</span>
        </div>
    @endif
    </div>
    <select {{ $disabled ? 'disabled' : '' }}
        style="padding-top: 0.70rem; padding-bottom:0.70rem; -webkit-appearance: none;"
        class=" flex-grow outline-none text-gray-900 dark:text-gray-300   px-2 leading-tight border border-white dark:bg-gray-800 dark:border-gray-800 overflow-hidden"
        {{$attributes}}>
        {{ $slot }}
    </select>
    <span class="absolute right-2">
        @if (isset($icon))
            {{ $icon }}
        @endif
    </span>
</div>
