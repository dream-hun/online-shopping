<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class WelcomeComponent extends Component
{
    #[Title('Home - Garden of Eden Produce')]
    public function render()
    {
        return view('livewire.welcome-component');
    }
}
