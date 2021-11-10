<section class=" fixed left-0 pt-11 h-screen transform -translate-x-full lg:translate-x-0 main-menu z-40">
    <!-- Component Start -->
    <div
        class="flex flex-col select-none items-center w-44 md:w-52  h-full overflow-hidden text-one bg-one rounded   relative  ">
        <a class="flex items-center w-full   py-2  bg-white hover:text-white" href="{{ route('home') }}">
            <div class="w-full h-8 md:h-12 bg-center   bg-contain bg-no-repeat"
                style="background-image: url('/images/logo.png')">
            </div>
        </a>
        <div class="w-full px-2 text-base">
            <div class="flex flex-col items-center w-full mt-4 text-white">
                <x-menu-item title="Clientes" icon="fa-users" key="btn-clientes" routes="clientes.*">
                    <x-dropdown-link href="{{ route('clientes.create') }}"
                        :active="request()->routeIs('clientes.create')">
                        Añadir
                    </x-dropdown-link>
                    <x-dropdown-link href="{{ route('clientes.index') }}"
                        :active="request()->routeIs('clientes.index')">
                        Activos
                    </x-dropdown-link>
                    <x-dropdown-link href="">Atrasados</x-dropdown-link>
                    <x-dropdown-link href="">Historial</x-dropdown-link>
                </x-menu-item>
                <x-menu-item title="Préstamos" icon="fa-coins" key="btn-prestamos" routes="deudas.*">
                    <x-dropdown-link href="{{ route('deudas.create') }}" :active="request()->routeIs('deudas.create')">
                        Nuevo
                    </x-dropdown-link>
                    <x-dropdown-link href="{{ route('deudas.index') }}" :active="request()->routeIs('deudas.index')">
                        Listado
                    </x-dropdown-link>
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
        <a class="flex items-center justify-center -ml-2  w-full h-12 absolute bottom-0 text-black font-bold bg-two hover:bg-gray-700"
            href="#">
            <span class="far fa-user-circle text-2xl"> </span>
            <span class="ml-2 text-base block pr-2">Account</span>
        </a>
    </div>
    <!-- Component End  -->

</section>
