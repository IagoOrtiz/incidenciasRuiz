<x-app-layout>
    <x-slot name="header">
        <h2 class="py-3">
            Actualizar una incidencia
        </h2>
    </x-slot>
    <div class="d-flex m-auto justify-content-evenly update">
        <div class="d-flex flex-column align-items-center">
            <form action="" method="post">
                <x-input-label>Localización</x-input-label>
                <x-text-input disabled type="text" name="room" value='{{ $incidencia->room }}'>

                </x-text-input>

                <x-input-label class="mt-3">Dispositivo</x-input-label>
                <x-text-input disabled type="text" name="device" value='{{ $incidencia->device }}'>

                </x-text-input>
                <x-input-label class="mt-3">Descripción</x-input-label>
                <textarea class="form-control" disabled style="resize: none" name="description">{{ $incidencia->description }}</textarea><br>
            </form>
        </div>
        <div class="d-flex flex-column align-items-center">
            <form action="{{ route('incidencias.update', $incidencia) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="reviserId" value="{{ auth()->user()->id }}">
                <input type="hidden" name="revisionDate" value="{{ date('Y-m-d') }}">
                <x-input-label>Estado</x-input-label>
                <select name="status" class="form-select">
                    <option value="pending">Pendiente</option>
                    <option value="ongoing">En Reparación</option>
                    <option value="complete">Completo</option>
                </select>

                <x-input-label>Observaciones</x-input-label>
                <textarea class="form-control" name="notes" style="height: 300px">{{ $incidencia->notes }}</textarea><br>

                <input class="btn btn-primary my-3 text-light" type="submit" value="ACTUALIZAR">
            </form>
        </div>
    </div>
</x-app-layout>
