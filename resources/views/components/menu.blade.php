
<section class=" fixed left-0 pt-11 h-screen transform -translate-x-full lg:translate-x-0 main-menu z-40">
    <!-- Component Start -->
    <div
        class="flex flex-col select-none items-center pl-1 w-44 md:w-52 pt-2 h-full overflow-hidden text-one bg-one rounded   relative  ">
        <a class="flex items-center w-full h-12 px-3 mt-1 rounded hover:bg-gray-800 hover:text-white"
            href="{{ route('home') }}">
            <div class="w-full h-12 bg-white bg-center bg-contain bg-no-repeat"
                style="background-image: url('https://img.favpng.com/4/16/10/logo-mortgage-loan-debt-caliber-home-loans-png-favpng-n9UsRmfYLFsTJ5EuzRDPZyw5w.jpg')">

            </div>
        </a>
        <div class="w-full px-2">
            <div class="flex flex-col items-center w-full mt-4 text-white" >
                <x-menu-item title="Clientes" icon="fa-users" key="btn-clientes" routes="clientes.*">
                    <x-dropdown-link href="{{route('clientes.create')}}" 
                    :active="request()->routeIs('clientes.create')">
                    Añadir
                </x-dropdown-link>
                    <x-dropdown-link href="{{route('clientes.index')}}"
                    :active="request()->routeIs('clientes.index')">
                    Activos
                </x-dropdown-link>
                    <x-dropdown-link href="">Atrasados</x-dropdown-link>
                    <x-dropdown-link href="">Historial</x-dropdown-link>
                </x-menu-item>
                <x-menu-item title="Préstamos" icon="fa-coins" key="btn-prestamos" routes="">
                    <x-dropdown-link href="">Nuevo</x-dropdown-link>
                    <x-dropdown-link href="">Cotizar</x-dropdown-link>
                    <x-dropdown-link href="">Atrasados</x-dropdown-link>
                    <x-dropdown-link href="">Vencidos</x-dropdown-link>
                    <x-dropdown-link href="">Historial</x-dropdown-link>
                </x-menu-item>
                <x-menu-item title="Empleados" icon="fa-user-tie" key="btn-empleados" routes="">
                    <x-dropdown-link href="">Nuevo</x-dropdown-link>
                    <x-dropdown-link href="">Activos</x-dropdown-link>
                    <x-dropdown-link href="">Historial</x-dropdown-link>
                </x-menu-item>
                <x-menu-item title="Finanzas" icon="fa-hand-holding-usd" key="btn-ingresos" routes="">
                    <x-dropdown-link href="">Ingresos</x-dropdown-link>
                    <x-dropdown-link href="">Gastos</x-dropdown-link>
                    <x-dropdown-link href="">Balance</x-dropdown-link>
                </x-menu-item>

            </div>
        </div>
        <a class="flex items-center justify-center w-full h-12 absolute bottom-0 text-black font-bold bg-two hover:bg-gray-700"
            href="#">
            <span class="far fa-user-circle text-2xl"> </span>
            <span class="ml-2 text-base block">Account</span>
        </a>
    </div>
    <!-- Component End  -->

</section>
