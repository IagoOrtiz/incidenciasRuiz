<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Incidencias
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex">
                <form action="{{route('dashboard', 'complete')}}" method="get">
                    @csrf
                    <x-secondary-button>
                        <input class="w-20" type="submit" value="REPARADAS">
                    </x-secondary-button>
                </form>
                <form action="{{route('dashboard', 'ongoing')}}" method="get">
                    @csrf
                    <x-secondary-button>
                        <input class="w-20" type="submit" value="EN PROCESO">
                    </x-secondary-button>
                </form>
                <form action="{{route('dashboard', 'pending')}}" method="get">
                    @csrf
                    <x-secondary-button>
                        <input class="w-20" type="submit" value="PENDIENTES">
                    </x-secondary-button>
                </form>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto border-collapse border text-center w-full">
                        <thead>
                        <tr>
                            <th>Profesor Solicitante</th>
                            <th>Fecha</th>
                            <th>Estancia</th>
                            <th>Dispositivo</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th @if (auth()->user()->admin)
                                colspan=2
                            @endif>Controles</th>
                            
                           
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($incidencias as $incidencia)
                            <tr class="border">
                                <td>{{$incidencia->name}}</td>
                                <td>{{$incidencia->updated_at}}</td>
                                <td>{{$incidencia->room}}</td>
                                <td>{{$incidencia->device}}</td>
                                <td>{{$incidencia->description}}</td>
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
                                        <form action="{{route('incidencias.destroy', $incidencia->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <x-danger-button>
                                                <input class="w-20" type="submit" value="BORRAR">
                                            </x-danger-button>
                                        </form>

                                        <form action="{{route('incidencias.edit', $incidencia->id)}}" method="get">
                                            @csrf
                                            <x-primary-button>
                                                <input class="w-20" type="submit" value="ACTUALIZAR">
                                            </x-primary-button>
                                        </form>
                                    @endif
                                </td>
                                @if (auth()->user()->admin)
                                    <td>
                                        <form action="{{route('incidencias.admin', $incidencia->id)}}" method="get">
                                            @csrf
                                            <x-secondary-button>
                                                <input class="w-20" type="submit" value="ADMINISTRAR">
                                            </x-secondary-button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$incidencias->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
