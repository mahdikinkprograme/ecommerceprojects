<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\cart;
use App\Models\multiimg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Auth;
class watchController extends Controller
{
   public function indexs()
    {
        return view('student.index');
    }


    public function form(Request $req)
    {

        if($req->isMethod('post')){
            $datas = $req->all();
            $rules = [
                'name' => 'required',
                'price' => 'required',
                'descreption' => 'required',
                'image' => 'required|image|',

            ];
           $this->validate($req,$rules);
            if($req->hasFile('image')){
                 {
                    $image = $req->file('image');
                    $exstetion = $image->extension();
                    $imageName = time().'.'.$exstetion;  
                    $image->move(public_path('admin/img'), $imageName);
                   }

            }
           
            $data = new product();
            $data->name = $datas['name'];
            $data->price = $datas['price'];
            $data->description = $datas['description'];
            $data->image = $imageName;
            $data->date = date(('Y-m-d H:i:s'));
            $data->save();
            //dd($data);            
        }
        $images = [];
        if($req->hasFile('multiimg')){
            foreach($req->file('multiimg') as $multiimag){
                $exstetions = $multiimag->extension();
                $imageNames = rand(111,9999).'.'.$exstetions;  
                $multiimag->move(public_path('admin/img'), $imageNames);
                $images[] = $imageNames;
            }
        }
       
        multiimg::create([
            'multiimg' => implode('|',$images),
            'prod_id' => $data->id, 
        ]);
        return redirect()->back();
       
    }

    public function watchserve()
    {

        $datavalue = product::all();
        return view('watch',compact('datavalue'));

    }


    public function detaile($id)
    {
        $product = product::with('multiimg')->find($id)->toArray();
        return view('student.detail',compact('product'));
    }

    public function prodect(Request $req)
    {
       if($req->isMethod('post')){
        $cart = $req->all();
        $cartid = new cart();
        $cartid->prod_id = $cart['prod_id'];
        $cartid->prod_qty = $cart['prod_qty'];
        $cartid->save();
        return redirect()->back()->with('succes','add secces');

         }

    }

    public function products(){
        $getcart = cart::products();
        return view('student.include',compact('getcart'));
    }
       
    

       public  function changeqty(Request $req){
        if($req->ajax()){
            $data = $req->all();
            $total = 0;
            cart::where('prod_id',$data['prod_ids'])->update(['prod_qty' => $data['plusval']]);
            $total += $data['prod_qty'] * $data['price_ids'];
            $cartval = json_encode($total);
            $getcart = cart::products();
            return response()->json([
            'view' => (String)View::make('student.include')->with(compact('getcart'))]);
           }

        }

        public function delet(Request $req){
            if($req->ajax()){
                $data = $req->all();
                cart::where('id',$data['prod_id'])->delete();
                $getcart = cart::products();
                return response()->json([
                    'statuse' => (String)View::make('student.include')->with(compact('getcart'))]);
               
            }
         }
    }
   


  




 

