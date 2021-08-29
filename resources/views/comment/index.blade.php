@extends('layouts.app')

@section('content')



<section class="col-12">
    <table class="table table-dark">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">email</th>
              <th scope="col">caption</th>
              <th scope="col">title Post</th>
              <th scope="col">delete</th>
              <th scope="col">update</th>
            </tr>
          </thead>
          <tbody>
       
            @forelse ($allComment as $item)

            <tr>
              <th scope="row">{{ $item->id }}</th>
              <td>{{ $item->name }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->caption }}</td>
              <td>@dd({{ $item->post()->title }})</td>
              <td>delete</td>
              <td>update</td>
            </tr>
              
            @empty
              
            @endforelse

          </tbody>
    </table>
</section>

    
@endsection