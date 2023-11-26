<?php

namespace App\Observers;

use App\Models\Support;

class SupportObserver
{
    /**
     * Handle the Support "creating" event.
     */
    public function creating(Support $support): void
    {
        $support->user_id = auth()->user()->id;
    }
}
