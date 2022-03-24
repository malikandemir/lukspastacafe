<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryList extends Component
{
    public $categories;

    public function __construct()
    {
        $this->categories = Category::whereStatus(1)->get();
    }

    public function render()
    {
        return view('livewire.category-list');
    }
}
