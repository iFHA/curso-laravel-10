<?php

namespace App\Listeners;

use App\Enums\SupportStatus;
use App\Events\SupportReplied;
use App\Services\SupportService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStatusWhenSupportReplied
{
    /**
     * Create the event listener.
     */
    public function __construct(private readonly SupportService $supportService)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SupportReplied $event): void
    {
        $support = $event->support;
        if(SupportStatus::ABERTO->value === $support['status']) {
            $this->supportService->updateStatus($support['id'], SupportStatus::PENDENTE);
        }
    }
}
