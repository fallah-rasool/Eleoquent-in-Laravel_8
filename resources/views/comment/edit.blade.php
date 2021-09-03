@extends('layouts.app')

@section('content')

<section class="col-6 offset-3 p-3 mt-3 bg-light">
        
    <form action="{{ route('comment.update',$comment) }}" method="post">
        @method('patch')
        @csrf
        <input type="hidden"  name="comment_id" value="{{ $comment->id }}">
        <input type="hidden"  name="commentable_type" value="{{ $comment->commentable_type }}">
        <input type="hidden"  name="commentable_id" value="{{ $comment->commentable_id}}">
 

        <section class="form-group">
            <label for="my-input">fullName</label>
            <input id="my-input" value="{{ $comment->fullName }}" class="form-control" type="fullName" name="fullName">
        </section>
        <section class="form-group">
            <label for="my-input">email</label>
            <input id="my-input" value="{{ $comment->email }}" class="form-control" type="email" name="email">
        </section>
        <section class="form-group">
           
            <input id="my-input" class="btn btn-primary" type="submit" name="">
        </section>
      

    </form>
    
</section>

    
@endsection