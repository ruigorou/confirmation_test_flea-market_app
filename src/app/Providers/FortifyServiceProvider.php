<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Laravel\Fortify\Contracts\LogoutResponse;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

   
    public function boot(): void
    {
        //メール認証
        // Fortify::verifyEmailView(function () {
        //     return view('auth.verify-email');
        // });

        Fortify::loginView(function () {
            return view('auth.login');
        });

        RateLimiter::for('login', function (Request $request){
            $email=(string)$request->email;
            return Limit::perMinute(10)->by($email . $request->ip());
        });
    }
}
