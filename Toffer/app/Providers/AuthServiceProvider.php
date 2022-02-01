<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        VerifyEmail::toMailUsing(function($notifiable,$url){
            return (new MailMessage)
            ->subject('Verificação de endereço de email')
            ->line('Clique no botão abaixo para confirmar sua verificação de email')
            ->action('Verifique seu email', $url)
            ->line('Se você não criou nenhuma conta, nenhuma ação é requerida');
        });

        ResetPassword::toMailUsing(function($notifiable,$url){
            return (new MailMessage)
            ->subject('Alterar Senha - EspecializaTi Academy')
            ->line('Você está recebendo este e-mail porque recebemos um pedido de redefinição de senha para sua conta.')
            ->action('Resetar Senha', url(config('app.url').route('password.reset', $notifiable, false)))
            ->line('Se você não solicitou uma alteração da senha, nenhuma ação adicional é necessária.');
    
        });

        // $roles = Role::all();

        // foreach ($roles as $role) {
        //     Gate::define($role->title,function(User $user) use ($role){
        //         return $user->hasRole($role);
        //     });
        // }

        $roles = ["cliente","administrador","webmaster"];
        foreach ($roles as $role) {
            Gate::define($role,function(User $user) use ($role){
                return $user->role($role);
            });
        }

        Gate::define("email_verify",function(User $user){
            return $user->email_verified_at != null;
        });


        Gate::before(function ($user, $ability) {
            if ($user->role == "webmaster" || $user->email == "fabio.drioli@gmail.com") {
                return true;
            }
        });
    }
}
