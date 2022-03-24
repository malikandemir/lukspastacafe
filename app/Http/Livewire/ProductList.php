<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Product;

class ProductList extends Component
{
    public $products;

    public function __construct()
    {
//        dd($request->all());
        $this->products = Product::whereStatus(1)->get();
    }

    public function render()
    {
        return view('livewire.product-list');
    }
}
