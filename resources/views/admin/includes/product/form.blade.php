
<div class="md-form">
    <input  class="form-control" id="productName" type="text" name="product_name" value="{{$product->product_name??old('p_name')}}">

    <label for="productName">Nome do produto</label>
</div>


<div class="md-form">
    <input id="p_desc" class="form-control" type="text" name="product_desc" value="{{$product->product_desc??old('p_desc')}} ">
    <label for="p_desc">Descricao do produto</label>
</div>

<div class="md-form">

    <input class="form-control-file"  type="file" name="product_image"/>
</div>
