@extends('layouts.app')

@section('content')

<section class="col-8  bg-light">

    <table class=" table table-darg">
        <tr>
            <td>id</td>
            <td>title</td>
            <td>description</td>
            <td>tg</td>
            <td>delete</td>
            <td>update</td>
        </tr>

        @forelse ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{\Illuminate\Support\Str::limit($post->description,20)}}</td>
            <td>
                @forelse ($post->tags as $item)

                <ul>
                    <li>{{ $item->name }}</li>

                </ul>
                    
                @empty
                    no data
                @endforelse
                
            </td>
            <td>
                <form action="{{ route('post.destroy',$post) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger " type="submit">delete</button>
                </form>
            </td>

            <td>       
                <a href="{{ route('post.edit',$post) }}" class="btn btn-primary"type="submit">
                    updata
                </a>
            </td>
        </tr>

            
        @empty
            no data
        @endforelse
    </table>
</section>




<section class="col-4 bg-light" >

    <h2> Creat new Post</h2>

    <form action="{{ route('post.store') }}" method="post" >

        @csrf
        <section class="form-group  bg-success mt-3">
            <label class="" for="my-input ">title</label>
            <input id="my-input" value="{{old('title')}}" class="form-control" type="text" name="title">

            @error('title')
            <p class=" error-input" >   {{$message}}</p>
            @enderror
        </section>

        <section class="form-group  bg-success mt-3">
            <label class=""  for="my-input ">description</label>

            <textarea   name="description" class="form-control " id="" >{{old('description')}}</textarea>

            @error('description')
            <p class=" error-input" >   {{$message}}</p>
            @enderror
        </section>

     
        <section>
            @forelse ($tags as $tag)

                <span class="m-3">
                    <label for="{{ $tag->id }}">{{ $tag->name }}</label>
                    <input type="checkbox" name="tag[]" class="form-group" value="{{ $tag->id }}" id="{{ $tag->id }}">
                </span>
                
            @empty
                
            @endforelse
        </section>


        <section class="form-group mt-3">

            <button type="submit" class="btn btn-primary"> create</button>

        </section>
    </form>
</section>    
    
@endsection