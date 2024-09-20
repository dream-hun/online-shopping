<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;

class NoticesComponent extends Component
{
    public function render()
    {
        seo()->title('Notices')
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
        $notices = Event::select(['title', 'description'])->get();
        return view('livewire.notices-component', ['notices' => $notices]);
    }
}
