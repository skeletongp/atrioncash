@props(['disabled' => false, 'class' => '', 'inputClass'=>'', 'wLabel'=>'w-24'])


<div class="bg-white dark:bg-gray-800 rounded-md"> 
    
    <div class=" py-1 px-1 flex justify-between items-center rounde-md rounded-md border border-blue-200 relative overflow-hidden {{ $class }} hover:border-blue-400 hover:shadow-md">
        <div class="mx-1 left-2 w-max cursor-default select-none text-two">
            @if (isset($label))
                <div class="border-r-2 pr-2 {{$wLabel}}">
                    <span class="font-bold uppercase  ">{{$label}}</span>
                </div>
            @endif
        </div>
        <input {{ $disabled ? 'disabled' : '' }}
            class=" w-full outline-none text-gray-600  py-2 px-2 leading-tight  dark:text-gray-300 dark:bg-gray-800 {{$inputClass}}"
            {{ $attributes }} />
        <div class="mx-1 right-2 w-max">
            @if (isset($icon))
                {{ $icon }}
            @endif
        </div>
    </div>
</div>
