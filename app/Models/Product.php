<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
