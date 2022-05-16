<?php

namespace App\Listeners;

use App\Events\StoreExport;
use App\Models\Export;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddExport
{

    public function handle(StoreExport $event)
    {
        Export::create([
            'user_id' => $event->user->id,
            'filename' => $event->filename,
            'type' => $event->type,
        ]);
    }
}
