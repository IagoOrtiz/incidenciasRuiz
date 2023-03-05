<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Actualizar una incidencia
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col items-center">
            <form action="{{route('incidencias.update', $incidencia)}}" method="post">
                @csrf
                @method('put')
                <x-input-label>Localización</x-input-label>
                {{-- <x-text-input type="text" name="room" required > --}}
                <x-text-input type="text" name="room" required value='{{$incidencia->room}}'>

                </x-text-input>

                <x-input-label>Dispositivo</x-input-label>
                {{-- <x-text-input type="text" name="device" required > --}}
                <x-text-input type="text" name="device" required value='{{$incidencia->device}}'>
                
                </x-text-input>
                <x-input-label>Descripción</x-input-label>
                {{-- <textarea name="description" style="height: 300px" required ></textarea><br> --}}
                <textarea name="description" style="height: 300px" required>{{$incidencia->description}}</textarea><br>

                <x-primary-button>
                    <input type="submit" value="EDITAR INCIDENCIA">
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>