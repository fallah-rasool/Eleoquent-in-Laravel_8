@extends('layouts.app')

@section('content')
<Section class="col-12">
    <a class="btn btn-primary" href="{{ route('product.index') }}">
    page Peoduct
    </a>
</Section>
<section class="col-8 ">
    <table class="table table-dark mt-3">

        <thead>
            <td>#</td>
            <td>title</td>
            <td>delete</td>
            <td>edit</td>
        </thead>
        <tbody>
            @forelse ($allCategory as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title}}</td>
                <td>
                    <form action="{{ route('category.destroy',$item) }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" type="submit">delete</button>
                    </form>
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('category.edit',$item) }}">edit</a>


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
    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <section class="form-group">
            <label for="my-input">title</label>
            <input id="my-input" class="form-control" type="text" name="title">
        </section>
        <section class="form-group">            
            <button class="btn btn-success"> send</button>   
        </section>
    </form>

</section>
    
@endsection