<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\StoreUpdateValidateRequest;


class Product extends Model
{
    protected $fillable  =  ['product_name','product_desc','product_image'];
    //
    function  search ($element = ""){

        $result =  $this->where( function ($query) use ($element){
//            global $element; ou usar use $element;
           if($element!=null){
            $query->where('product_name','LIKE',"%$element%")->paginate();
           }
        });
        return $result;

    }

    public  function  isImageValid(StoreUpdateValidateRequest $request,string $image){

        if($request->hasFile($image) && $request->product_image->isValid()){

            return true ;
        }
        else{
            return false ;
        }

    }
}
