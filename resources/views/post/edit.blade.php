@extends('layouts.app')

@section('content')

<section class="col-8 offset-2">




        <form action="{{ route('post.update',$post) }}" method="post" >

            @method('patch')

            @csrf
            <section class="form-group  bg-success mt-3">
                <label class="" for="my-input ">title</label>
                <input id="my-input" value="{{ $post->title }}" class="form-control" type="text" name="title">
    
                @error('title')
                <p class=" error-input" >   {{$message}}</p>
                @enderror
            </section>
    
            <section class="form-group  bg-success mt-3">
                <label class=""  for="my-input ">description</label>
    
                <textarea   name="description" class="form-control"  id="" >{{ $post->description }}</textarea>
    
                @error('description')
                <p class=" error-input" >   {{$message}}</p>
                @enderror
            </section>
            <section>


                @foreach ($allTag  as $item)

                    <span class="m-3">
                        <label for="{{ $item->id }}">{{$item->name }}</label>  
                        <input type="checkbox"                         
                        @foreach($selectTag as $tag)                      
                        
                            @if ($tag->pivot->tag_id == $item->id) checked     @endif 

                        @endforeach                    
                        name="tag[]" class="form-group" value="{{ $item->id }}" id="{{ $item->id }}">
                    </span>
                        
                @endforeach

          
            </section>
    
    
            <section class="form-group mt-3">
    
                <button type="submit" class="btn btn-primary"> create</button>
    
            </section>
        </form>



</section>
    
@endsection