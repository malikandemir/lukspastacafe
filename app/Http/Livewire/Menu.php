<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Menu extends Component
{
    public $categories;
    public function __construct()
    {
        $this->categories = Category::with('products')->get();
    }
    public function render()
    {
        return view('livewire.menu');
    }
}
