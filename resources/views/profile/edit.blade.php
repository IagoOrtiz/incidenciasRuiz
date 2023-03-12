<x-app-layout>
    <x-slot name="header">
        <h2 class="py-3">
            Perfil
        </h2>
    </x-slot>

    <div>
        <div>
            <div class="p-4">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="p-4">
                @include('profile.partials.update-password-form')
            </div>

            <div class="p-4">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
