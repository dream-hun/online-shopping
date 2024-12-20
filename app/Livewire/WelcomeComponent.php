<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Title;
use Livewire\Component;

class WelcomeComponent extends Component
{
    #[Title('Home - Garden of Eden Produce')]
    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        seo()
            ->locale('en_GB')
            ->title('Home')
            ->description('Garden of Eden Produce is a Rwandan company that organically grows and delivers a variety of fresh groceries, including many previously unavailable on the Rwandan market')
            ->keywords(
                'online shopping in rwanda',
                'online shopping sites in rwanda',
                'kigali',
                'grocery store kigali',
                'organic produce rwanda',
                'fresh groceries kigali',
                'Garden of Eden Produce',
                'rwandan organic company'
            )
            ->url(url()->current())
            ->canonical(url()->current())
            ->canonicalEnabled(true)
            ->images(asset('images/garden-of-eden-produce.webp'))
            ->twitterCard('summary_large_image')
            ->twitterSite('@GardenofEdenPr')
            ->twitterCreator('@GardenofEdenPr')
            ->robots('index', 'follow');

        return view('livewire.welcome-component');
    }
}
