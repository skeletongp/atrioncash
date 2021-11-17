@extends('dashboard')
@section('body')
    <div class="flex items-start lg:pt-16 justify-center">
        <div class="w-full max-w-md">
            <div class=" border shadow-xl w-full p-4 block bg-white  mx-auto md:space-y-4">
                <form action="{{ route('notarios.store') }}" method="POST" id="form"
                    class="lg:flex items-start lg:space-x-3">
                    @csrf
                    <div class="w-full">
                        <h1 class="my-2 text-lg lg:text-xl uppercase font-bold text-center">Ingrese los datos del notario
                        </h1>
                        <input type="hidden" name="negocio_id" value="{{ Auth::user()->negocio->id }}">
                        <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                            <x-input wLabel="w-28" class="w-full" type="text" name="name" value="{{old('name')}}"
                                placeholder="Nombre completo" required>
                                <x-slot name="label">
                                    Nombre
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-user"></span>
                                </x-slot>
                            </x-input>
                        </div>
                        <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                            <x-input wLabel="w-28" class="w-full" type="text" name="cedula" value="{{old('cedula')}}"
                                placeholder="No. Cédula con guiones" pattern="[0-9]{3}-[0-9]{7}-[0-9]{1}" required>
                                <x-slot name="label">
                                    Cédula
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-id-card"></span>
                                </x-slot>
                            </x-input>
                            <x-input-error for="cedula">Notario ya registrado</x-input-error>
                        </div>
                        <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                            <x-input wLabel="w-28" class="w-full" type="number" name="matricula" value="{{old('matricula')}}"
                                placeholder="No. Matrícula" required>
                                <x-slot name="label">
                                    Matrícula
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-id-badge"></span>
                                </x-slot>
                            </x-input>
                            <x-input-error for="matricula">Notario ya registrado</x-input-error>
                        </div>
                        <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                            <x-input wLabel="w-28" class="w-full" type="number" name="phone" value="{{old('phone')}}" placeholder="No. Teléfono"
                                required>
                                <x-slot name="label">
                                    Teléfono
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-phone"></span>
                                </x-slot>
                            </x-input>
                        </div>
                        <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                            <x-input wLabel="w-28" class="w-full" type="text" placeholder="Dirección de oficina" name="direccion" value="{{old('direccion')}}" required>
                                <x-slot name="label">
                                    <span class="font-bold uppercase  ">Dirección</span>
                                </x-slot>
                                <x-slot name="icon">
                                    <span class="fas fa-map"></span>
                                </x-slot>
                            </x-input>
                        </div>
                        <div class=" border-b px-3 shadow-sm py-2 md:py-4 ">
                            <x-select id="selMunicipio" wLabel="w-28" class="w-full" type="email" name="municipio_id"
                                required>
                                <x-slot name="label">
                                    <span class="font-bold uppercase  ">Municipio</span>
                                </x-slot>
                                <option value="">Seleccione un municipio</option>
                                @foreach ($municipios as $municipio)
                                    <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                                @endforeach
                                
                            </x-select>
                        </div>
                        <div class="flex justify-end">
                            <x-button form="form" class="bg-one ml-auto text-white my-2">
                                Guardar
                            </x-button>
                        </div>
                    </div>
            </div>

            </form>
            <script>
                $(document).ready(function() {
                    $('#selMunicipio').select2();

                });
            </script>
        </div>
    </div>
    </div>
@endsection
