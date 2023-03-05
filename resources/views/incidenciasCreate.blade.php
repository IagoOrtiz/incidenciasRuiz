<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Crear una incidencia
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col items-center">
            <form action="{{route('incidencias.store')}}" method="post">
                @csrf
                <input type="hidden" name="teacherId" value="{{auth()->user()->id}}">
                
                <x-input-label>Localización</x-input-label>
                <x-text-input type="text" name="room" required>
                    {{-- <input type="text" name="room"> --}}
                </x-text-input>

                <x-input-label>Dispositivo</x-input-label>
                <x-text-input type="text" name="device" required>
                    {{-- <input type="text" name="device"> --}}
                </x-text-input>
                <x-input-label>Descripción</x-input-label>
                <textarea name="description" style="height: 300px" required></textarea><br>

                <x-primary-button>
                    <input type="submit" value="AÑADIR INCIDENCIA">
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>