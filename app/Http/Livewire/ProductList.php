<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductList extends Component
{
    public $products = [
        ["category_id"=>"1","name"=>"Dilim Pasta","description"=>"col-span-2 row-span-2","img"=>"pasta.jpg"],
        ["category_id"=>"1","name"=>"Dilim Pasta","description"=>"col-span-2 row-span-2","img"=>"pasta.jpg"],
        ["category_id"=>"1","name"=>"Dilim Pasta","description"=>"col-span-2 row-span-2","img"=>"pasta.jpg"],
        ["category_id"=>"1","name"=>"Dilim Pasta","description"=>"col-span-2 row-span-2","img"=>"pasta.jpg"],
    ];

    public function render()
    {
        return view('livewire.product-list');
    }
}
