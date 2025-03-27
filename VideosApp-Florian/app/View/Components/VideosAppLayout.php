<?php

// app/View/Components/VideosAppLayout.php

namespace App\View\Components;

use Illuminate\View\Component;

class VideosAppLayout extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('layouts.videos-app-layout');
    }
}
