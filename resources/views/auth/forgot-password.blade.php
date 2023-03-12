<x-guest-layout>
    <div class="my-3" style="max-width: 20rem">
        ¿Olvidaste tu contraseña? Simplemente escribe tu correo y se te enviará un enlace para que escribas una nueva contraseña.
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" novalidate>
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Correo" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="d-flex align-items-center justify-content-end mt-4">
            <x-primary-button>
                Enviar Correo de Recuperación
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
