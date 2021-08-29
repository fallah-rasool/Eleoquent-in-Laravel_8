@extends('layouts.app')

@section('content')


<section class="col-8 offset-2 mt-3">
    <table class="table table-dark">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">title</th>
              <th scope="col">image</th>
              
              <th scope="col">action</th>
              <th scope="col">name</th>
              <th scope="col">delete</th>
              <th scope="col">update</th>
            </tr>
          </thead>
          <tbody>
              @forelse ($allPost as $item)

                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->title }}</td>
                    <td><a href="{{ $item->image }}"><img width="100" src="{{ $item->image }}" alt="" srcset=""></a></td>
                    <td>{{ $item->action }}</td>
                    <td>
                    @forelse ($item->comment as $commant)
                        <ul ><li > {{ $commant->name }}</li>  </ul>
                    @empty
                        
                    @endforelse                    
                    </td>
                    <td>
                        <form action="{{ route('post.destroy', $item) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                    </td>
                    <td><button type="button" class="btn btn-primary">update</button></td>

  
                </tr>
                  
              @empty

              <h2> on data</h2>
                  
              @endforelse
    

          </tbody>
    </table>
</section>

    
@endsection