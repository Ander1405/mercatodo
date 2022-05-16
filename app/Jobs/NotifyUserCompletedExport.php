<?php

namespace App\Jobs;

use App\Notifications\ExportReadyNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyUserCompletedExport implements ShouldQueue
{
    public $user;
    public $filepath;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $filepath)
    {
        $this->user =$user;
        $this->filepath =$filepath;
    }

    public function handle(): void
    {
        $this->user->notify(new ExportReadyNotification($this->filepath));



    }
}
