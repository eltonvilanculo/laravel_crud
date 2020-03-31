@if($errors->any())

    @foreach($errors->all() as $item)

        <p>{{$item}}</p>
    @endforeach
@endif
