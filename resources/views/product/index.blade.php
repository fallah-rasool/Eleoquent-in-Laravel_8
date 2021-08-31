@extends('layouts.app')

@section('content')






<section class="col-8 ">
    <table class="table table-dark mt-3">

        <thead>
            <td>#</td>
            <td>name</td>
            <td>price</td>
            <td>image</td>
            <td>delete</td>
            <td>edit</td>
        </thead>
        <tbody>
            @forelse ($allProduct as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name}}</td>
                <td>{{ $item->price}}</td>
                <td>
                    <img width="50" src="{{ asset('/images/products/'.$item->image->image) }}" alt="{{ $item->image->image}}" srcset="">
                </td>

                <td>
                    <form action="{{ route('product.destroy',$item) }}" method="post">
                        @csrf
                        @method('delete')
                       
                        <button class="btn btn-danger" type="submit">delete</button>
                    </form>
                </td>
                <td>

                    <a class="btn btn-primary" href="{{ route('product.edit',$item->id) }}">edit</a>

                </td>
             </tr>
            @empty
                <td colspan="2">
                    <h2 >no data</h2>
                </td>
            @endforelse
        </tbody>

     
    </table>
  
</section>

<section class="col-4 bg-info mt-3">
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="form-group">
            <label for="my-input">name</label>
            <input id="my-input" class="form-control" type="text" name="name">
        </section>
        <section class="form-group">
            <label for="my-input">price</label>
            <input id="my-input" class="form-control" type="text" name="price">
        </section>
        <section class="form-group">
            <label for="my-input">image</label>
            <input id="my-input" class="form-control" type="file" name="image">
        </section>

        <section class="form-group">            
            <button class="btn btn-success"> send</button>   
        </section>
    </form>

</section>

@endsection