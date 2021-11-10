@props(['url' => '', 'title', 'subtitle', 'edit', 'delete', 'bg', 'userId', 'isUser'=>false, 'show'=>''])
<div
    class="card transition select-none bg-white h-56 -py-8 w-72  m-auto top-0 bottom-0 shadow-2xl transform hover:scale-105 overflow-hidden">
    <h2 class="transition flex flex-col space-y-0 font-bold text-blue-500 mt-28 dto-num">
        <span class="w-72 mx-auto overflow-ellipsis overflow-hidden"> {{ $title }}</span>
        <small class="font-normal text-base">{{ $subtitle }}</small>
    </h2>
  <div class="cta-container transition text-center items-center flex space-x-2 mt-72 inset-x-1/4 absolute z-50 w-max">
    <x-dropdown-link href="{{ $edit }}"
        class="cta text-black border-2 border-blue-100 bg-two py-2 px-6 rounded-full text-lg font-bold">
        <span class="fas fa-pen"></span>
    </x-dropdown-link>
    <form action="{{$delete}}" method="POST" id="d{{ $userId }}">
        @csrf
        @method('delete')
        <x-dropdown-link form="d{{ $userId }}"
            class="confirm cursor-pointer cta text-black border-2 border-blue-100 bg-red-400 py-2 px-6 rounded-full text-lg font-bold">
            <span class="fas fa-trash"></span>
        </x-dropdown-link>
    </form>
</div>
    <div class="card_circle bg-one h-96 -mt-72 pb-2 transition flex items-end justify-center">
        <a href="{{$show}}">
            <div class="h-16 w-16 rounded-full icon transition " style="background-image: url({{ $bg }})">

            </div>
        </a>
    </div>
</div>
<style>
    @import url(https://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic);

    * {
        font-family: 'Noto Sans', serif;
    }

    .main-menu {
        transition: all .3s ease-in-out;
    }

    .transform {
        transition: all .3s ease-in-out;
    }

    .hidden-menu {
        transform: translate(-100%, 0px);
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        /* display: none; <- Crashes Chrome on hover */
        -webkit-appearance: none;
        margin: 0;
        /* <-- Apparently some margin are still there even though it's hidden */
    }

    input[type=number] {
        -moz-appearance: textfield;
        /* Firefox */
    }

    button:active {
        border-style: outset;
        outline: none;
        border: none;
    }

    button:focus {
        outline: none;
    }

    button {
        border-style: outset;
        outline: none;
        border: none;
    }


    /* Card from Here (Grid-stat */
    .card_circle {

        width: 450px;
        position: absolute;
        border-radius: 50%;
        margin-left: -75px;
    }

    .card:hover .card_circle {
        border-radius: 0;
        margin-top: -145px;
    }

    .card:hover .card_circle .icon {
        transform: scale(0.8);
        margin-bottom: 3.6rem;
    }

    .card:hover .card_circle .text {
        transform: scale(0.8);
        margin-bottom: 4.2rem;
    }
    .card:hover .dto-num{
        white-space: nowrap;

    }

    .dto-num {
        text-align: center;
        position: absolute;
        z-index: 9999;
        font-size: 26px;
        width: 100%;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        border-bottom: dotted 1px white;
    }

    .card:hover h2 {
        margin-top: 35px;
        color: #fff;
        padding-bottom: 0.5rem;
    }

    .transition {
        transition: .5s cubic-bezier(.3, 0, 0, 1.3)
    }

    .card:hover .cta-container {
        margin-top: 170px;
    }

</style>
