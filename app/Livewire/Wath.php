<?php

namespace App\Livewire;

use App\Models\product;

use Livewire\Component;

class Wath extends Component
{
    public function render()
    {
        $datavalue = product::orderBy('id','DESC')->get();
        return view('livewire.wath',['datavalue' => $datavalue]);
    }

   
}
