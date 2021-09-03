@extends('layouts.app')

@section('css')
    <style>
        .error-input{
            color: red;
            text-align: center;
            font-weight: bolder;
            padding: 7px 0;
        }
        label{
            font-weight: bolder;
            padding: 7px ;
        }
        textarea {
            width: 300px;
            height:150px;
        }
    </style>
@endsection
@section('content')

<section class="col-8">

    <table class="table table-dark">
        <tbody>
            <tr>
                <td scope="col">#</td>
                <td scope="col">title</td>
                <td scope="col">image</td>
                <td scope="col">description</td>
                <td scope="col">fullName</td>              
                <td scope="col">email</td>
                <td scope="col">delete</td>
                <td scope="col">update</td>
            </tr>
                @forelse ($allPost as $item)
                <tr> 
                    <td>{{ $item->id }}</td>
                    <td>
                        <a href="{{ route('post.show',$item) }}">{{ $item->title }}</a>
                    </td>
                    <td>
                        <img  width="50" src="{{ asset('images/posts/'.$item->image)}}" alt="{{ $item->image }}" srcset="">
                    </td>
                    <td>{{\Illuminate\Support\Str::limit($item->description,20)}}</td>
                    <td>
                        @forelse ($item->comments as $comment)  
                           <a class="btn btn-primary mb-2" href="{{ route('comment.edit',$comment) }}"> {{ $comment->fullName }}</a>
                                     
                        @empty
                            no data                            
                        @endforelse               
                    </td>
                    <td>
                        @forelse ($item->comments as $comment) 
                             {{ $comment->email }}
                        @empty
                            no data                            
                        @endforelse               
                    </td>
                    <td>
                        <form action="{{ route('post.destroy',$item) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('post.edit',$item) }}" class="btn btn-primary">update</a>
                    </td>    
                </tr>               
              @empty
            <tr>
             <td colspan="7"> <h2> on data</h2></td>
            </tr>
              @endforelse
        </tbody>
    </table>
</section>


<section class="col-4 bg-light" >

    <h2> Creat new Post</h2>
    
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

        @csrf
        <section class="form-group  bg-success mt-3">
            <label class="" for="my-input ">title</label>
            <input id="my-input" value="{{old('title')}}" class="form-control" type="text" name="title">

            @error('title')
            <p class=" error-input" >   {{$message}}</p>
            @enderror
        </section>
        
        {{-- <section class="form-group  bg-success mt-3">
            <label class="" for="my-input ">fullName</label>
            <input id="my-input" value="{{old('fullName')}}"  class="form-control" type="text" name="fullName">

            @error('fullName')
            <p class=" error-input" >   {{$message}}</p>
            @enderror
        </section>
        
        <section class="form-group  bg-success mt-3">
            <label class="" for="my-input ">email</label>
            <input id="my-input" value="{{old('email')}}"  class="form-control" type="text" name="email">

            @error('email')
            <p class=" error-input" >   {{$message}}</p>
            @enderror
        </section>
         --}}
        
        <section class="form-group  bg-success mt-3">
            <label class=""  for="my-input ">description</label>

            <textarea   name="description" class="form-control " id="" >{{old('description')}}</textarea>

            @error('description')
            <p class=" error-input" >   {{$message}}</p>
            @enderror
        </section>
        
        <section class="form-group  bg-success mt-3">
            <label class="" for="my-input ">image</label>
            <input id="my-input" class="form-control" type="file" name="image">

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