<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Menu extends Component
{
    public $categories = [
        ["id"=>1,"name"=>"Pasta Çeşitleri","class"=>"row-start-1 col-start-1 col-span-2","img"=>"pasta.jpg"],
        ["id"=>2,"name"=>"Baklava","class"=>"col-span-1","img"=>"baklava.jpg"],
        ["id"=>3,"name"=>"Börek","class"=>"col-span-1","img"=>"borek.jpg"],
        ["id"=>4,"name"=>"Sütlü Tatlı","class"=>"col-span-1","img"=>"sutlutatli.jpg"],
        ["id"=>5,"name"=>"Ekler","class"=>"col-span-1","img"=>"ekler.jpg"],
        ["id"=>6,"name"=>"Dilim Pasta","class"=>"col-span-1","img"=>"dilimpasta.jpg"],
        ["id"=>7,"name"=>"Özel Sipariş Pastalar","class"=>"col-span-3","img"=>"ozelpasta.jpg"]
    ];
    public function render()
    {
        return view('livewire.menu');
    }
}
