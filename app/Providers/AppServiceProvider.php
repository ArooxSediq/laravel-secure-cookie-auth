<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;
use Illuminate\Http\Request;

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
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);

        Auth::viaRequest('cookie', function (Request $request) {
            
            // Capture the token from the cookie and set is as Bearer Token.
            if ($request->cookie(env('AUTH_COOKIE_NAME','login'))) {
                $request->headers->set('Authorization', 'Bearer ' . $request->cookie(env('AUTH_COOKIE_NAME','login')));
            }

            // Return the user based on sanctum guard
            return Auth::guard('sanctum')->user();
        });

        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });
    }
}
