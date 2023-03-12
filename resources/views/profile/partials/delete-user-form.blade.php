<section>
    <header>
        <h2>
            Borrar Cuenta
        </h2>

        <p class="mt-1">
            Borrar tu cuenta es una acción irreversible, a si que piensalo dos veces antes de realizar esta acción.
        </p>
    </header>

    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#borrarCuenta">BORRAR CUENTA</button>

    <div class="modal" id="borrarCuenta" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title">¿Estas seguro de que quieres borrar la cuenta?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    <div class="modal-body">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            ¿Estas seguro de que quieres borrar la cuenta?
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Borrar tu cuenta es una acción irreversible, a si que piensalo dos veces antes de realizar
                            esta acción. Para mayor seguridad, introduce tu contraseña.
                        </p>

                        <div class="mt-6">
                            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                            <x-text-input id="password" name="password" type="password" class="mt-1" placeholder="Contraseña" />

                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                        </div>
                    </div>

                    <div class="modal-footer mt-6 d-flex justify-content-end">
                        <x-secondary-button class="mt-3" x-on:click="$dispatch('close')">
                            Cancelar
                        </x-secondary-button>

                        <x-danger-button class="ml-3 mt-3">
                            Borrar cuenta
                        </x-danger-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
