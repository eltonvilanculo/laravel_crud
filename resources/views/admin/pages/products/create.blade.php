@extends('.admin.layout.main')

@section('title')
    Inserir produto
 @endsection

@section('content')

    @if($errors->any())

        @foreach($errors->all() as $item)

            <p>{{$item}}</p>
            @endforeach
        @endif
    <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data" class="text-center border border-light p-5">

        @csrf

        <p class="h4 mb-4">Cadastrar produto</p>
        @include('admin.includes.product.form')
        <button type="submit" class="btn btn-primary" >Inserir</button>



    </form>
 @endsection
