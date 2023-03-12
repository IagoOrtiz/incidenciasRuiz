<x-app-layout>
    <x-slot name="header">
        <h2 class="py-3">
            Incidencias
        </h2>
    </x-slot>

    <div>
        <div class="d-flex align-items-center justify-content-center">
            <form action="{{ route('dashboard', 'complete') }}" method="get">
                @csrf
                <input class="btn btn-secondary m-2" type="submit" value="REPARADAS">
            </form>
            <form action="{{ route('dashboard', 'ongoing') }}" method="get">
                @csrf
                <input class="btn btn-secondary m-2" type="submit" value="EN PROCESO">
            </form>
            <form action="{{ route('dashboard', 'pending') }}" method="get">
                @csrf
                <input class="btn btn-secondary m-2" type="submit" value="PENDIENTES">
            </form>
        </div>
        <div>
            <table class="table text-center mb-3 align-middle">
                <thead>
                    <tr>
                        <th>Profesor Solicitante</th>
                        <th class="ocultable">Fecha</th>
                        <th class="ocultable">Estancia</th>
                        <th class="ocultable">Dispositivo</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Controles</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($incidencias as $incidencia)
                        <tr class="border">
                            <td>{{ $incidencia->name }}</td>
                            <td class="ocultable">{{ $incidencia->updated_at }}</td>
                            <td class="ocultable">{{ $incidencia->room }}</td>
                            <td class="ocultable">{{ $incidencia->device }}</td>
                            <td>{{ $incidencia->description }}</td>
                            @switch($incidencia->status)
                                @case('pending')
                                    <td>Pendiente</td>
                                @break

                                @case('ongoing')
                                    <td>En Reparación</td>
                                @break

                                @case('complete')
                                    <td>Resuelta</td>
                                @break

                                @default
                                    <td>Valor incorrecto</td>
                                @break
                            @endswitch
                            <td>
                                @if ($incidencia->teacherId == auth()->user()->id || auth()->user()->admin)
                                    <form action="{{ route('incidencias.destroy', $incidencia->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input class="btn btn-danger text-center" style="width: 7rem" type="submit"
                                            value="BORRAR">
                                    </form>

                                    <form action="{{ route('incidencias.edit', $incidencia->id) }}" method="get">
                                        @csrf
                                        <input class="btn btn-primary text-center text-light" style="width: 7rem" type="submit"
                                            value="EDITAR">
                                    </form>
                                @endif
                                @if (auth()->user()->admin)
                                    <form action="{{ route('incidencias.admin', $incidencia->id) }}" method="get">
                                        @csrf
                                        <input class="btn btn-secondary ml-1" type="submit" value="ADMINISTRAR">
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="m-2">
                {{ $incidencias->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
