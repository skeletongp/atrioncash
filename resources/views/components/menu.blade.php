<section class=" fixed left-0 pt-11 h-screen transform -translate-x-full lg:translate-x-0 main-menu z-40">
    <!-- Component Start -->
    <div
        class="flex flex-col select-none items-center w-44 md:w-52  h-full overflow-hidden text-one bg-one rounded   relative  ">
        <a class="flex items-center w-full   py-2  bg-white hover:text-white" href="{{ route('home') }}">
            <div class="w-full h-8 md:h-12 bg-center   bg-contain bg-no-repeat"
                style="background-image: url('/images/logo.png')">
            </div>
        </a>
        <div class="w-full px-2 pl-4 text-base">
            <div class="flex flex-col items-center w-full mt-4 text-white border-b-2">
                {{-- Clientes --}}
                <x-menu-item title="Clientes" icon="fa-users" key="btn-clientes" routes="clientes.*">
                    @role('owner')
                        <x-dropdown-link href="{{ route('clientes.create') }}"
                            :active="request()->routeIs('clientes.create')">
                            Añadir
                        </x-dropdown-link>
                    @endrole
                    <x-dropdown-link href="{{ route('clientes.index') }}"
                        :active="request()->routeIs('clientes.index')">
                        Todos
                    </x-dropdown-link>
                    <x-dropdown-link href="{{ route('clientes.activos') }}"
                        :active="request()->routeIs('clientes.activos')">
                        Activos
                    </x-dropdown-link>
                    <x-dropdown-link href="{{ route('clientes.atrasados') }}"
                        :active="request()->routeIs('clientes.atrasados')">
                        Atrasados
                    </x-dropdown-link>
                    <x-dropdown-link href="{{ route('clientes.historial') }}"
                        :active="request()->routeIs('clientes.historial')">
                        Historial
                    </x-dropdown-link>
                </x-menu-item>
                {{-- Préstamos --}}
                <x-menu-item title="Préstamos" icon="fa-coins" key="btn-prestamos" routes="deudas.*">
                    @role('owner')
                        <x-dropdown-link href="{{ route('deudas.create') }}"
                            :active="request()->routeIs('deudas.create')">
                            Nuevo
                        </x-dropdown-link>
                        <x-dropdown-link href="{{ route('deudas.cotizar') }}"
                            :active="request()->routeIs('deudas.cotizar')">
                            Cotizar
                        </x-dropdown-link>
                    @endrole
                    <x-dropdown-link href="{{ route('deudas.index') }}" :active="request()->routeIs('deudas.index')">
                        Listado
                    </x-dropdown-link>
                    <x-dropdown-link href="{{ route('deudas.activos') }}"
                        :active="request()->routeIs('deudas.activos')">
                        Activos
                    </x-dropdown-link>
                    <x-dropdown-link href="{{ route('deudas.atrasados') }}"
                        :active="request()->routeIs('deudas.atrasados')">
                        Atrasados
                    </x-dropdown-link>
                    <x-dropdown-link href="{{ route('deudas.historial') }}"
                        :active="request()->routeIs('deudas.historial')">
                        Historial
                    </x-dropdown-link>
                </x-menu-item>
                {{-- Sólo dueños --}}
                @role('owner')
                    {{-- Empleados --}}
                    <x-menu-item title="Empleados" icon="fa-user-tie" key="btn-empleados" routes="users.*">
                        <x-dropdown-link href="{{ route('users.create') }}" :active="request()->routeIs('users.create')">
                            Nuevo
                        </x-dropdown-link>
                        <x-dropdown-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                            Listado
                        </x-dropdown-link>
                    </x-menu-item>
                    {{-- Finanzas --}}
                    <x-menu-item title="Finanzas" icon="fa-hand-holding-usd" key="btn-ingresos" routes="">
                        <x-dropdown-link href="">Ingresos</x-dropdown-link>
                        <x-dropdown-link href="">Gastos</x-dropdown-link>
                        <x-dropdown-link href="">Balance</x-dropdown-link>
                    </x-menu-item>

                    {{-- Contratos --}}
                    <x-menu-item title="Contratos" icon="fa-file" key="btn-contratos" routes="contratos.*">
                        <x-dropdown-link href="{{ route('contratos.create') }}"
                            :active="request()->routeIs('contratos.create')">
                            Generar</x-dropdown-link>
                        <x-dropdown-link href="{{ route('contratos.index') }}"
                            :active="request()->routeIs('contratos.index')">Ver

                        </x-dropdown-link>
                    </x-menu-item>

                    {{-- Notarios --}}
                    <x-menu-item title="Notarios" icon="fa-user-tie" key="btn-notarios" routes="notarios.*">
                        <x-dropdown-link href="{{ route('notarios.create') }}"
                            :active="request()->routeIs('notarios.create')">
                            Crear</x-dropdown-link>
                        <x-dropdown-link href="{{ route('notarios.index') }}"
                            :active="request()->routeIs('notarios.index')">Ver

                        </x-dropdown-link>
                    </x-menu-item>
                @endrole

                {{-- Soporte --}}
                @role('admin')
                    {{-- Planes --}}
                    <x-menu-item title="Planes" icon="fa-dollar-sign" key="btn-planes" routes="plans.*">
                        <x-dropdown-link href="{{ route('plans.create') }}" :active="request()->routeIs('plans.create')">
                            Crear</x-dropdown-link>
                        <x-dropdown-link href="{{ route('plans.index') }}" :active="request()->routeIs('plans.index')">
                            Ver
                            planes
                        </x-dropdown-link>
                    </x-menu-item>
                @endrole

            </div>
        </div>
        <div
            class="flex items-center justify-center -ml-2  w-full h-12 absolute bottom-0 text-black font-bold bg-two 
            ">
           
                <span class=" ml-2 text-sm block pr-2">
                    @role('owner')
                        Saldo: ${{ number_format(Auth::user()->negocio->balance->saldo_actual, 2) }}
                    @endrole
                </span>
           

        </div>
    </div>
    <!-- Component End  -->

</section>
