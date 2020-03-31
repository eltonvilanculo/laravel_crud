@extends('.admin.layout.main')

@section('title')
    Editar produto
 @endsection

@section('content')

    @if($errors->any())

        @foreach($errors->all() as $item)

            <p>{{$item}}</p>
        @endforeach
    @endif
    <form action="{{route('products.update',$product->product_id)}}" method="post" enctype="multipart/form-data" class="text-center border border-light p-5" >
        @method('PUT')
        @csrf
        <p class="h4 mb-4">Editar produto de codigo {{$product->product_id}}</p>

          @include('admin.includes.product.form')
        <button type="submit" class="btn btn-primary" >Editar</button>



    </form>
 @endsection
