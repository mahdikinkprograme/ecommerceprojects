<?php

namespace App\Livewire;
use App\Models\product;
use Livewire\WithFileUploads;
use App\Models\cart;
use App\Models\multiimg;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Livewire\Component;
use Carbon\Carbon;

class Watch extends Component
{
    use WithFileUploads;
    public $name;
    public $image;
    public $price;
    public $description;

    public function render()
    {
        return view('livewire.watch')->layout('layouts.indexs');
    }


    public function forms()
    {

           //$this->validate = [
           //    'name' => 'required',
           //    'price' => 'required',
           //    'descreption' => 'required',
           //    'image' => 'required|image|',
//
           // ];

           
            $data = new product();
            $data->name = $this->name;
            $data->price = $this->price;
            $data->description = $this->description;
            $data->date = date(('Y-m-d H:i:s'));
            //$imagename = Carbon::now()->timestamp. '.' .$this->image->extension();
            $imagename =  $this->image->storeAs('img','public');
            $data->image = $imagename;
            $data->save();
           // dd($data);            
        
       // $images = [];
       // if($this->hasFile('multiimg')){
       //     foreach($this->file('multiimg') as $multiimag){
       //         $exstetions = $multiimag->extension();
       //         $imageNames = rand(111,9999).'.'.$exstetions;  
       //         $multiimag->move(public_path('admin/img'), $imageNames);
       //         $images[] = $imageNames;
       //     }
       // }
       //
       // multiimg::create([
       //     'multiimg' => implode('|',$images),
       // ]);
       // return redirect()->back();
       
    }


    public function detail($id){

        $product = product::find($id);
        return view('livewire.detailes',['product'=> $product]);

    }

}
