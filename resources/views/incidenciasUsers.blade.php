<x-app-layout>
    <x-slot name="header">
        <h2 class="py-3">
            Panel de administrador
        </h2>
    </x-slot>
    <div>
        <table class="table text-center mb-3 align-middle">
            <thead>
                <tr>
                    <th>Profesor</th>
                    <th>Correo</th>
                    <th class="ocultable">Fecha Creación</th>
                    <th class="ocultable">Fecha Autenticación</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr class="border">
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td class="ocultable">{{ $usuario->created_at }}</td>
                        <td class="ocultable">{{ $usuario->email_verified_at }}</td>
                        <td>
                            <form action="{{ route('user.admin', $usuario->id) }}" method="post">
                                @csrf
                                @method('put')
                                    <input class="btn btn-secondary mb-1" type="submit" value="DAR ADMIN">
                            </form>
                            <form action="{{ route('user.destroy', $usuario->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger" type="submit" value="BORRAR">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="m-2">
            {{ $usuarios->links() }}
        </div>
    </div>
</x-app-layout>
