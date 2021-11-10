<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryList extends Component
{
    public $categories = [
        ["name"=>"Pasta Çeşitleri","class"=>"col-span-2 row-span-2","img"=>"pasta.jpg"],
        ["name"=>"Baklava","class"=>"col-span-1","img"=>"baklava.jpg"],
        ["name"=>"Börek","class"=>"col-span-1","img"=>"borek.jpg"],
        ["name"=>"Sütlü Tatlı","class"=>"col-span-1","img"=>"sutlutatli.jpg"],
        ["name"=>"Ekler","class"=>"col-span-1","img"=>"ekler.jpg"],
        ["name"=>"Dilim Pasta","class"=>"col-span-1","img"=>"dilimpasta.jpg"],
        ["name"=>"Özel Sipariş Pastalar","class"=>"col-span-3","img"=>"ozelpasta.jpg"]
    ];
    public function render()
    {
        return view('livewire.category-list');
    }
}
