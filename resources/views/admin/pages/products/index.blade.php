@extends('admin.layout.main')

@section('title')

Ola sou eu titulo

@endsection


@section('content')

    <a href={{route('products.create')}} class="btn btn-primary">Adicionar produto </a>
    <form class="md-form form-inline float-right"  action={{route('product.search')}} method="post">
        @csrf
        <label for="search">Pesquisar</label>
        <input class="form-control" type="text" id="search" name="search" value="{{$elements['search']??''}}">
        <button type="submit" class="btn btn-blue">Pesquisar</button>
    </form>
    <table class="table table-striped">
        <tr>
        <th>Codigo</th>
        <th>Nome</th>
            <th>Actions</th>

        </tr>

            @foreach($productList as $item)

                <tr>
                <td>{{$item->product_id}}</td>
                <td>{{$item->product_name}}</td>
                    <td><a href={{route('products.show',$item->product_id)}}><i class="fas fa-info-circle"></i> </a>

                    <a href={{route('products.destroy',$item->product_id)}}><i class="fas fa-trash-alt"></i>  </a>
                    <a href={{route('products.edit',$item->product_id)}}><i class="fas fa-pen-square"></i>  </a>
                    </td>

                </tr>
            @endforeach




    </table>
    @if (isset($elements))
        {!! $productList->appends($elements)->links() !!}
        @else
        {!! $productList->links() !!}
{{--        Porque o index que nao eh de pesquisa nao tem valor de element--}}
    @endif

@endsection

@push('styles')

    <style>
        .product{
            background:red ;
        }


    </style>
@endpush

@push('scripts')
<script>

    console.log('estou no Laravel')
</script>
@endpush
