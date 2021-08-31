@extends('layouts.app')

@section('content')
<Section class="col-12">
    <a class="btn btn-primary" href="{{ route('product.index') }}">
    page Peoduct
    </a>
</Section>

<section class="col-8 offset-2 bg-info mt-3">
    <form action="{{ route('product.update',$product) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <section class="form-group">
            <label for="my-input">name</label>
            <input id="my-input" value="{{ $product->name }}" class="form-control" type="text" name="name">
        </section>
        <section class="form-group">
            <label for="my-input">price</label>
            <input id="my-input" value="{{ $product->price }}" class="form-control" type="text" name="price">
        </section>
        <section class="form-group ">
            <label for="my-input">image</label>
            <input id="my-input" class="" type="file" name="image">
            <img width="50" src="/images/products/{{$product->image->image }}" alt="" srcset="">
        </section>

        <section class="form-group">            
            <button class="btn btn-success"> send</button>   
        </section>
    </form>

</section>
    
@endsection