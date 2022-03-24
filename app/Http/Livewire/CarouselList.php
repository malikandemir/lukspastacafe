<?php

namespace App\Http\Livewire;

use App\Models\Carousel;
use Livewire\Component;

class CarouselList extends Component
{
    public $carousels;

    public function __construct()
    {
        $this->carousels = Carousel::all();
    }
    public function render()
    {
        return view('livewire.carousel-list');
    }
}
