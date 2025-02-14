<?php

namespace App\Providers;

use App\Events\BooktableUpdated;
use App\Listeners\BooktableListener;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        BooktableUpdated::class => [
            BooktableListener::class,
        ],
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
