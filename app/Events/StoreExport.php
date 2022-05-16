<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StoreExport
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public User $user;
    public string $filename;
    public string $type;

    public function __construct(User $user, string $filename, string $type)
    {
        $this->user = $user;
        $this->filename = $filename;
        $this->type = $type;
    }

}
