@extends('layouts.app')

@section('content')


<section class="col-4 offset-4">
    <h2>  ویرایش دسته {{ $category->title }}</h2>
</section>
<section class="col-6 offset-3 bg-info mt-3">

  
    <form action="{{ route('category.update') }}" method="post">
        @csrf
        @method('patch')
        <section class="form-group">
            <label for="my-input">title</label>
            <input id="my-input"   value="{{ $category->title  }}" class="form-control" type="text" name="title">
        </section>
        <section class="form-group">            
            <button class="btn btn-success"> send</button>   
        </section>
    </form>

</section>
    
@endsection