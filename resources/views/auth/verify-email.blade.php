<x-guest-layout>
    <div style="max-width: 30rem">
    <div class="my-4">
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

            <button type="submit" class="btn btn-secondary">
                {{ __('Cerrar Sesión') }}
            </button>
        </form>
    </div>
    </div>
</x-guest-layout>
