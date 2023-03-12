<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Para completar el registro debes verificar tu email haciendo click en el link que se ha enviado a tu correo.
         Si no lo has recibido, pulsa el botón de reenvío para recibir otro.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4">
            {{ __('Un nuevo link de verificación ha sido enviado al email dispuesto en el registro.') }}
        </div>
    @endif

    <div class="mt-4 d-flex align-items-center justify-content-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Reenviar Correo') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Cerrar Sesión') }}
            </button>
        </form>
    </div>
</x-guest-layout>
