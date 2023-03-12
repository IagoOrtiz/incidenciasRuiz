<x-app-layout>
    <x-slot name="header">
        <h2 class="py-3">
            Crear una incidencia
        </h2>
    </x-slot>
    <div>
        <div class="my-4 mx-auto" style="max-width: 25rem">
            <form action="{{ route('incidencias.store') }}" method="post" novalidate>
                @csrf
                <input type="hidden" name="teacherId" value="{{ auth()->user()->id }}">

                <x-input-label>Localización</x-input-label>
                <x-text-input type="text" name="room" required>
                    {{-- <input type="text" name="room"> --}}
                </x-text-input>

                <x-input-label class="mt-3">Dispositivo</x-input-label>
                <x-text-input type="text" name="device" required>
                    {{-- <input type="text" name="device"> --}}
                </x-text-input>


                <x-input-label class="mt-3">Descripción</x-input-label>
                <textarea class="form-control" name="description" style="height: 300px" required></textarea>

                <input class="btn btn-primary my-3 text-light" type="submit" value="AÑADIR INCIDENCIA">
            </form>
        </div>
    </div>
</x-app-layout>
