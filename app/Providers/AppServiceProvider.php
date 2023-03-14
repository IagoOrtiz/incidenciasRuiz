<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        VerifyEmail::$toMailCallback = function ($notifiable, $verificationUrl) {
            return (new MailMessage)
                ->subject('Verifica tu Email')
                ->line('Por favor, verifica tu correo haciendo click en el botón.')
                ->action('Verificar Correo', $verificationUrl)
                ->line('Si no creaste una cuenta, puedes ignorar este mensaje.');
        };

        ResetPassword::$toMailCallback = function ($notifiable, $url) {
            return (new MailMessage)
                ->subject(('Reseteo de contraseña'))
                ->line(('Si has pedido un reinicio de contraseña haz clic en este botón para cambiarla.'))
                ->action(('Resetear contraseña'), $url)
                ->line(('Si no pediste un reseteo de contraseña no hace falta que hagas nada.'));
        };
    }
}
