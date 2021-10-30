@props(['disabled' => false, 'class' => '', 'money'=>false])


<div class="bg-white dark:bg-gray-800 rounded-md"> 
    
    <div class=" py-1 px-1 flex justify-between items-center rounde-md rounded-md border border-gray-600 relative overflow-hidden {{ $class }}">
        
        <input {{ $disabled ? 'disabled' : '' }}
            class=" w-full outline-none text-gray-600  py-2 px-2 leading-tight  dark:text-gray-300 dark:bg-gray-800 "
            {{ $attributes }} />
        <div class="mx-1 right-2 w-max">
            @if (isset($icon))
                {{ $icon }}
            @endif
        </div>
    </div>
</div>
