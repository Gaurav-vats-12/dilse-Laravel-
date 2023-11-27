<?php

namespace App\Modules\Users;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/user.php');

        Blade::component('user-app-layout', View\Components\UserAppLayout::class);
        Blade::component('user-guest-layout', View\Components\UserGuestLayout::class);
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->registerMiddleware();
        $this->injectAuthConfiguration();
    }

    /**
     * @see https://laracasts.com/discuss/channels/general-discussion/register-middleware-via-service-provider
     */
    protected function registerMiddleware(): void
    {
        $router = $this->app['router'];
        $router->aliasMiddleware('user.auth', Http\Middleware\RedirectIfNotUser::class);
        $router->aliasMiddleware('user.guest', Http\Middleware\RedirectIfUser::class);
        $router->aliasMiddleware('user.verified', Http\Middleware\EnsureUserEmailIsVerified::class);
        $router->aliasMiddleware('user.password.confirm', Http\Middleware\RequireUserPassword::class);
    }

  /**
   * @return void
   */
  protected function injectAuthConfiguration(): void
    {
        $this->app['config']->set('auth.guards.user', [
            'driver' => 'session',
            'provider' => 'users',
        ]);

        $this->app['config']->set('auth.providers.users', [
            'driver' => 'eloquent',
            'model' => Models\User::class,
        ]);

        $this->app['config']->set('auth.passwords.users', [
            'provider' => 'users',
            'table' => 'user_password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ]);
    }
}
