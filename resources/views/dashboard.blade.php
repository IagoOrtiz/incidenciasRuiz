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
                                        <x-danger-button >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                              </svg>
                                        </x-danger-button>
                                    </form>

                                    <form action="{{ route('incidencias.edit', $incidencia->id) }}" method="get">
                                        @csrf
                                        <x-primary-button class="text-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                              </svg>
                                        </x-primary-button>
                                    </form>
                                @endif
                                @if (auth()->user()->admin)
                                    <form action="{{ route('incidencias.admin', $incidencia->id) }}" method="get">
                                        @csrf
                                        <x-secondary-button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                                              </svg>
                                        </x-secondary-button>
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
