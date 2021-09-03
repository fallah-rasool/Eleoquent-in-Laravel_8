

@extends('layouts.app')

@section('content')

<section class="col-6 offset-3 " >
    
    <form action="{{ route('post.update',$post) }}" method="post" enctype="multipart/form-data">

        @method('patch')
        @csrf
        <section class="form-group   mt-3">
            <label class="" for="my-input ">title</label>
            <input id="my-input" value="{{$post->title}}" class="form-control" type="text" name="title">

            @error('title')
            <p class=" error-input" >{{$message}}</p>
            @enderror
        </section>
        

        

        
        
        <section class="form-group   mt-3">
            <label class=""  for="my-input ">description</label>

            <textarea   name="description" class="form-control " id="" >{{$post->description}}</textarea>

            @error('description')
            <p class=" error-input" >   {{$message}}</p>
            @enderror
        </section>
        
        <section class="form-group   mt-3">
            <label class="" for="my-input ">image</label>
            <input id="my-input"  type="file" name="image">
            <img width="100"  src="{{'/images/posts/'.$post->image}}"  alt="">

            @error('image')
            <p class=" error-input" >   {{$message}}</p>
            @enderror
        </section>

        <section class="form-group mt-3">

            <button type="submit" class="btn btn-primary"> create</button>
        
        </section>
    </form>
</section>   
    
@endsection