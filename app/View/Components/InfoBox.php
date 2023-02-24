<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InfoBox extends Component
{
    public function __construct(
        public string $icon,
        public string $title,
        public string $description,
    )
    {
    }

    public function render(): View
    {
        return view('components.info-box');
    }
}
