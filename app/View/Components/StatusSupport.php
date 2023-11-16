<?php

namespace App\View\Components;

use App\Enums\SupportStatus;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusSupport extends Component
{
    private SupportStatus $status;
    /**
     * Create a new component instance.
     */
    public function __construct(string $status)
    {
        $this->status = SupportStatus::tryFrom($status);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $color = 'blue';
        switch($this->status) {
            case SupportStatus::FECHADO:
                $color = 'emerald';
                break;
            case SupportStatus::PENDENTE:
                $color = 'red';
            break;
        }
        $textStatus = $this->status->getDescription();
        return view('components.status-support', compact('color', 'textStatus'));
    }
}
