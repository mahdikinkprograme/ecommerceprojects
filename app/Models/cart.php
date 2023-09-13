<?php

namespace App\Models;
use App\Models\product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Auth;
class cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['prod_id','prod_qty'];
    use HasFactory;

    /**
 * Get the post that owns the comment.
 */
    public static function products(){
       // $getcart = session()->get('carts');
            $getcart = cart::with(['product' => function($query){
                $query->select('id','name','image','price','description');
            }])->orderBy('id','ASC')->get()->toArray();
           // session()->put('carts',$getcart);
           return $getcart;
    
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo('App\Models\product','prod_id');
    }


    
}
