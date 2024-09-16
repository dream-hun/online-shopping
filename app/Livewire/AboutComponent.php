<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class AboutComponent extends Component
{
    #[Title('About us - Garden of Eden Produce Rwanda ')]
    public function render()
    {
        return view('livewire.about-component');
    }
}
