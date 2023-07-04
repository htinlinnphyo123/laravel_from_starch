<?php

namespace App\Providers;

use App\Models\User;
use App\Service\Newspaper;
use MailchimpMarketing\ApiClient;
use App\Service\MailchimpNewspaper;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(Newspaper::class,function(){
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us17'
            ]);
            return new MailchimpNewspaper($client);
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();

        Gate::define('admin',function(User $user) {
            return $user->userName == 'admin123';
        });

        Blade::if('admin',function(){
            return auth()->user()->can('admin');
        });

    }
}
