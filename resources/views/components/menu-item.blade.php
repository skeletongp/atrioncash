@props(['routes'=>'home', 'title', 'icon', 'key'])
<div class="w-full mb-6 pt-2 border-t border-gray-300">
    <div class="flex justify-between items-center cursor-pointer text-lg down-trigger" id="{{$key}}">
        <div class="flex items-center space-x-2 ">
            <span class="fas {{$icon}} w-6"></span>
            <span>{{$title}}</span>
        </div>
        <span class=" fas fa-angle-down {{$key}} transform {{request()->routeIs($routes)?'-rotate-90':''}}"></span>
    </div>
    <div class="{{request()->routeIs($routes)?'':'hidden'}} div-content {{$key}}">
      {{$slot}}
    </div>   
</div>