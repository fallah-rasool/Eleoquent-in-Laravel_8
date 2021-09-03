@extends('layouts.app')

@section('content')


<section class="col-8 offset-2 ">
<section>
    <a class=" btn btn-primary " href=" {{ route('post.index') }}"> مشاهده همه پست ها </a>
</section>

    <section class="p-3  mt-3 bg-light">
        {{ $post->title }}    
    </section>
    <section class="p-3 mt-3 bg-light">
        <img  width="50" src="{{ asset('images/posts/'. $post->image)}}" alt="{{$post->image}}" srcset="">   
    </section>
    <section class="p-3 mt-3 bg-light">
        {{ $post->description }}    
    </section>

    <section class="p-3 mt-3 bg-light">
        
        <form action="{{ route('comment.store') }}" method="post">
            @csrf
            <input type="hidden"  name="post_id" value="{{ $post->id }}">
            <section class="form-group">
                <label for="my-input">fullName</label>
                <input id="my-input" class="form-control" type="fullName" name="fullName">
            </section>
            <section class="form-group">
                <label for="my-input">email</label>
                <input id="my-input" class="form-control" type="email" name="email">
            </section>
            <section class="form-group">
               
                <input id="my-input" class="btn btn-primary" type="submit" name="">
            </section>
          

        </form>
        
    </section>
</section>
    
@endsection