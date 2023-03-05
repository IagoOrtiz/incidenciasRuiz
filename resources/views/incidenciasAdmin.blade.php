<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Actualizar una incidencia
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="flex">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col items-center">
                <form action="{{route('incidencias.update', $incidencia)}}" method="post">
                    @csrf
                    @method('put')
                    <x-input-label>Localización</x-input-label>
                    <x-text-input disabled type="text" name="room" required value='{{$incidencia->room}}'>

                    </x-text-input>

                    <x-input-label>Dispositivo</x-input-label>
                    <x-text-input disabled type="text" name="device" required value='{{$incidencia->device}}'>
                
                    </x-text-input>
                    <x-input-label>Descripción</x-input-label>
                    <textarea disabled style="resize: none" name="description" required>{{$incidencia->description}}</textarea><br>
                </form>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col items-center">
                <form action="{{route('incidencias.update', $incidencia)}}" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="reviserId" value="{{auth()->user()->id}}">
                    <input type="hidden" name="revisionDate" value="{{date("Y-m-d")}}">
                    <x-input-label>Estado</x-input-label>
                    <select name="status">
                        <option value="pending">Pendiente</option>
                        <option value="ongoing">En Reparación</option>
                        <option value="complete">Completo</option>
                    </select>
                
                    <x-input-label>Observaciones</x-input-label>
                    <textarea name="notes" style="height: 300px">{{$incidencia->notes}}</textarea><br>

                    <x-primary-button>
                        <input type="submit" value="ACTUALIZAR">
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>