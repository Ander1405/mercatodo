<?php

namespace App\Listeners;

use App\Events\RegisterAdminEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class RegisterAdminActionLog
{
    public function handle(RegisterAdminEvent $event)
    {
        Log::info('Acción: ' . $event->message, [
            'user' => $event->user->email,
            'date' => Carbon::now(),
        ]);
    }
}
