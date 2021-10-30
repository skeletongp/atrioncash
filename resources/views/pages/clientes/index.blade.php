@extends('dashboard')

@section('body')
    <div class=" overflow-auto h-screen pb-32 md:pb-2 md:pt-12 relative">
        <a href="{{route('clientes.create')}}" 
        class="w-10 h-10 rounded-full bg-one flex items-center justify-center hover:bg-blue-400 absolute top-0 left-1 text-white hover:text-blue-800 transform hover:scale-105 shadow-xl">
                <span class="fas fa-plus "> </span>
        </a>
        <h1 class="mt-3 mb-5 text-center font-bold text-lg uppercase lg:hidden">Listado de clientes</h1>
        <x-two-columns>
            <x-slot name="col1">
                <div class="flex flex-col justify-between h-full px-4  ">
                    <div class="hidden lg:flex flex-col justify-center h-full text-center space-y-4">
                        <h1 class="text-center font-bold uppercase text-xl md:text-2xl">Clientes {{ $status }}</h1>
                        <h2>
                            Aquí podrás ver un listado de los clientes {{ $status }} del negocio, con algunos detalles
                            y
                            un
                            acceso directo al perfil de cada uno. Si deseas añadir un nuevo cliente, presiona el botón
                            <code>+</code> ubicado en la esquina superior izquierda.
                        </h2>
                    </div>
                    <div class="flex flex-col justify-center h-full text-center space-y-4">
                        <form action="">
                            <div class="text-left space-y-2">
                                <x-label class="font-bold text-lg">Buscar cliente</x-label>
                                <x-input type="search" placeholder="Ingrese un término de búsqueda" name="s">
                                    <x-slot name="icon">
                                        <x-button class="">
                                            <span class="fas fa-search text-xl"></span>
                                        </x-button>
                                    </x-slot>
                                </x-input>
                            </div>

                        </form>
                    </div>
                </div>

            </x-slot>
            <x-slot name="col2">

                <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-rows-3 gap-6">
                    <div class=" border border-gray-300 p-4 block bg-three bg-opacity-40">
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Nombre</span>
                            <span class="font-semibold text-base">Ismael Conteras</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Teléfono</span>
                            <a href="https://api.whatsapp.com/send?phone=+18493153337&text=Edite+este+mensaje"
                                target="_blank">
                                <span class="font-semibold text-base "><span class="fab fa-whatsapp font-bold mr-1"></span>
                                    849-315-3337</span>
                            </a>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Deuda</span>
                            <span class="font-semibold text-base">${{ number_format(7540, 2) }}</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Estado</span>
                            <span class="{{ 'atrasado' == 'al día' ? '' : 'text-red-500' }} font-semibold text-base">Al
                                día</span>
                        </div>
                    </div>
                    <div class=" border border-gray-300 p-4 block bg-three bg-opacity-40">
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Nombre</span>
                            <span class="font-semibold text-base">Ismael Conteras</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Teléfono</span>
                            <a href="https://api.whatsapp.com/send?phone=+18493153337&text=Edite+este+mensaje"
                                target="_blank">
                                <span class="font-semibold text-base "><span class="fab fa-whatsapp font-bold mr-1"></span>
                                    849-315-3337</span>
                            </a>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Deuda</span>
                            <span class="font-semibold text-base">${{ number_format(7540, 2) }}</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Estado</span>
                            <span class="{{ 'atrasado' == 'al día' ? '' : 'text-red-500' }} font-semibold text-base">Al
                                día</span>
                        </div>
                    </div>
                    <div class=" border border-gray-300 p-4 block bg-three bg-opacity-40">
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Nombre</span>
                            <span class="font-semibold text-base">Ismael Conteras</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Teléfono</span>
                            <a href="https://api.whatsapp.com/send?phone=+18493153337&text=Edite+este+mensaje"
                                target="_blank">
                                <span class="font-semibold text-base "><span class="fab fa-whatsapp font-bold mr-1"></span>
                                    849-315-3337</span>
                            </a>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Deuda</span>
                            <span class="font-semibold text-base">${{ number_format(7540, 2) }}</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Estado</span>
                            <span class="{{ 'atrasado' == 'al día' ? '' : 'text-red-500' }} font-semibold text-base">Al
                                día</span>
                        </div>
                    </div>
                    <div class=" border border-gray-300 p-4 block bg-three bg-opacity-40">
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Nombre</span>
                            <span class="font-semibold text-base">Ismael Conteras</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Teléfono</span>
                            <a href="https://api.whatsapp.com/send?phone=+18493153337&text=Edite+este+mensaje"
                                target="_blank">
                                <span class="font-semibold text-base "><span class="fab fa-whatsapp font-bold mr-1"></span>
                                    849-315-3337</span>
                            </a>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Deuda</span>
                            <span class="font-semibold text-base">${{ number_format(7540, 2) }}</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Estado</span>
                            <span class="{{ 'atrasado' == 'al día' ? '' : 'text-red-500' }} font-semibold text-base">Al
                                día</span>
                        </div>
                    </div>
                    <div class=" border border-gray-300 p-4 block bg-three bg-opacity-40">
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Nombre</span>
                            <span class="font-semibold text-base">Ismael Conteras</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Teléfono</span>
                            <a href="https://api.whatsapp.com/send?phone=+18493153337&text=Edite+este+mensaje"
                                target="_blank">
                                <span class="font-semibold text-base "><span class="fab fa-whatsapp font-bold mr-1"></span>
                                    849-315-3337</span>
                            </a>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Deuda</span>
                            <span class="font-semibold text-base">${{ number_format(7540, 2) }}</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Estado</span>
                            <span class="{{ 'atrasado' == 'al día' ? '' : 'text-red-500' }} font-semibold text-base">Al
                                día</span>
                        </div>
                    </div>
                    <div class=" border border-gray-300 p-4 block bg-three bg-opacity-40">
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Nombre</span>
                            <span class="font-semibold text-base">Ismael Conteras</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Teléfono</span>
                            <a href="https://api.whatsapp.com/send?phone=+18493153337&text=Edite+este+mensaje"
                                target="_blank">
                                <span class="font-semibold text-base "><span class="fab fa-whatsapp font-bold mr-1"></span>
                                    849-315-3337</span>
                            </a>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Deuda</span>
                            <span class="font-semibold text-base">${{ number_format(7540, 2) }}</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Estado</span>
                            <span class="{{ 'atrasado' == 'al día' ? '' : 'text-red-500' }} font-semibold text-base">Al
                                día</span>
                        </div>
                    </div>
                    <div class=" border border-gray-300 p-4 block bg-three bg-opacity-40">
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Nombre</span>
                            <span class="font-semibold text-base">Ismael Conteras</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Teléfono</span>
                            <a href="https://api.whatsapp.com/send?phone=+18493153337&text=Edite+este+mensaje"
                                target="_blank">
                                <span class="font-semibold text-base "><span
                                        class="fab fa-whatsapp font-bold mr-1"></span>
                                    849-315-3337</span>
                            </a>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Deuda</span>
                            <span class="font-semibold text-base">${{ number_format(7540, 2) }}</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Estado</span>
                            <span class="{{ 'atrasado' == 'al día' ? '' : 'text-red-500' }} font-semibold text-base">Al
                                día</span>
                        </div>
                    </div>
                    <div class=" border border-gray-300 p-4 block bg-three bg-opacity-40">
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Nombre</span>
                            <span class="font-semibold text-base">Ismael Conteras</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Teléfono</span>
                            <a href="https://api.whatsapp.com/send?phone=+18493153337&text=Edite+este+mensaje"
                                target="_blank">
                                <span class="font-semibold text-base "><span
                                        class="fab fa-whatsapp font-bold mr-1"></span> 849-315-3337</span>
                            </a>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Deuda</span>
                            <span class="font-semibold text-base">${{ number_format(7540, 2) }}</span>
                        </div>
                        <div class="flex justify-between border-b py-1 border-gray-300">
                            <span class="font-bold uppercase">Estado</span>
                            <span class="{{ 'atrasado' == 'al día' ? '' : 'text-red-500' }} font-semibold text-base">Al
                                día</span>
                        </div>
                    </div>
                </div>

            </x-slot>
        </x-two-columns>
    </div>
@endsection
