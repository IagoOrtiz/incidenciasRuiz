<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Panel de administrador
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto border-collapse border text-center w-full">
                        <thead>
                        <tr>
                            <th>Profesor</th>
                            <th>Correo</th>
                            <th>Fecha Creación</th>
                            <th>Fecha Autenticación</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr class="border">
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->created_at}}</td>
                                <td>{{$usuario->email_verified_at}}</td>
                                <td>
                                    <form action="{{route('user.admin', $usuario->id)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <x-secondary-button>
                                            <input class="w-20" type="submit" value="DAR ADMIN">
                                        </x-secondary-button>
                                    </form>
                                    <form action="{{route('user.destroy', $usuario->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <x-danger-button>
                                            <input class="w-20" type="submit" value="BORRAR">
                                        </x-danger-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$usuarios->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>