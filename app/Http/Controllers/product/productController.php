<?php

namespace App\Http\Controllers\product;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateValidateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{

   public  $product_object  ;

    /**
     * productController constructor.
     * @param $product_object
     */
    public function __construct(Product $product_object)
    {
        $this->product_object = $product_object;
    }
    /**
     * productController constructor.
     */




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()


    {

        $ProductList  = Product::latest()->paginate();
        return view('admin.pages.products.index', [
            'productList'=>$ProductList
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\StoreUpdateValidateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateValidateRequest $request)


    {
           $data= $request->only('product_name','product_desc');

           if($this->product_object->isImageValid($request,'product_image')){
               $image = $request->file('product_image');
//               dd($image->storeAs("products/images",$image->getClientOriginalName()));  colocas o nome do file
               $imageServerPath = $image->store("products/images");
               $data['product_image'] = $imageServerPath ;


           }
        if(Product::create($data)){
            return  redirect()->route('products.index');
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if(!Product::where('product_id',$id)){
            return redirect()->back();
        }

        $product =Product::where('product_id',$id)->first();
        return view('admin.pages.products.show',[
            'product'=>$product
        ]);
        //
//        dd($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        if(Product::where('product_id',$id)->first()){
        $product = Product::where('product_id',$id)->first();
        return  view('admin.pages.products.edit',[
                'product'=>$product
            ]);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateValidateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateValidateRequest $request, $id)

    {

        if(!Product::where('product_id',$id)->first()){
            return redirect()->route('products.edit');
        }
        $data =  $request->only('product_name','product_desc');
        $product = Product::where('product_id',$id);

        if($this->product_object->isImageValid($request,'product_image')){

            $image  = $request->product_image->store("products/images");
            $data['product_image'] =  $image ;

        }

        $product->update($data);
        return  redirect()->route('products.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

//        O first() eh para pegar o primeiro registro
        if(Product::where('product_id',$id)){
           $product =  Product::where('product_id',$id);
           $product->delete();
           return  redirect()->route('products.index');
        }else {
            return redirect()->back();
        }

        //
    }

    public function search(Request $request){

//        $request->validate([
//            'serach' => 'required|min:1|max:500'
//        ]);

        $result = $this->product_object->search($request->search);
        $elements =  $request->except('_token');
        return view('admin.pages.products.index',[
            'productList' => $result->paginate(),
            'elements'=>$elements
        ]);



    }
}
