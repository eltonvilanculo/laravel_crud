@extends('admin.layout.main')

@section('title')
    Detalhes do produto


@endsection


@section('content')




    <!-- Card -->
    <div class="card col-md-4">

        <!-- Card image -->
        <img class="card-img-top" width="50" height="300" src={{url('storage/'.$product->product_image)}} alt={{$product->product_image}}>

        <!-- Card content -->
        <div class="card-body">

            <!-- Title -->
            <h4 class="card-title"><a>{{$product->product_name??''}}</a></h4>
            <!-- Text -->
            <p class="card-text">{{$product->product_desc ??''}}</p>
            <!-- Button -->
            <a href={{route('products.index')}} class="btn btn-primary">Voltar </a>

        </div>


        <form method="POST" action={{route('products.destroy',$product->product_id ?? '')}}>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Apagar {{$product->product_name ?? 'Producto nao existe'}}</button>
        </form>

    </div>
    <!-- Card -->




@endsection

@push('main_style')
    <style>

        .container{
            flex: 1;
            align-items: center;
            align-content: center;
            align-self: center;
            margin: auto;
            margin-left: 35%;
        }
    </style>

    @endpush
