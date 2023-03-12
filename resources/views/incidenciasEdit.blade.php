<x-app-layout>
    <x-slot name="header">
        <h2 class="py-3">
            Actualizar una incidencia
        </h2>
    </x-slot>
    <div>
        <div class="my-4 mx-auto" style="max-width: 25rem">
            <form action="{{ route('incidencias.update', $incidencia) }}" method="post">
                @csrf
                @method('put')
                <x-input-label>Localización</x-input-label>
                {{-- <x-text-input type="text" name="room" required > --}}
                <x-text-input type="text" name="room" required value='{{ $incidencia->room }}'>

                </x-text-input>

                <x-input-label class="mt-3">Dispositivo</x-input-label>
                {{-- <x-text-input type="text" name="device" required > --}}
                <x-text-input type="text" name="device" required value='{{ $incidencia->device }}'>

                </x-text-input>
                <x-input-label class="mt-3">Descripción</x-input-label>
                {{-- <textarea name="description" style="height: 300px" required ></textarea><br> --}}
                <textarea class="form-control" name="description" style="height: 300px" required>{{ $incidencia->description }}</textarea>

                <input class="btn btn-primary my-3 text-light" type="submit" value="AÑADIR INCIDENCIA">
            </form>
        </div>
    </div>
</x-app-layout>
