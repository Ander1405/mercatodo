<?php

namespace App\Providers;

use App\Events\RegisterAdminEvent;
use App\Events\ProductMoreSaleByCategorie;
use App\Events\StoreExport;
use App\Listeners\AddExport;
use App\Listeners\RegisterAdminActionLog;
use App\Listeners\AddSaleByCategorie;
use App\Models\Products;
use App\Models\User;
use App\Observers\ModelObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ProductMoreSaleByCategorie::class => [
            AddSaleByCategorie::class,
        ],
        RegisterAdminEvent::class => [
            RegisterAdminActionLog::class,
        ],
        StoreExport::class => [
            AddExport::class,
        ]
    ];

    public function boot(): void
    {
        User::observe(ModelObserver::class);
        Products::observe(ModelObserver::class);
    }
}
