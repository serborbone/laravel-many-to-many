@extends('admin.layouts.base')

@section('content')
  <div class="container">

      {{-- Btn crea nuovo post --}}
      <a href="{{route('admin.posts.create')}}" class="btn btn-primary mb-4">Nuovo Post</a>

      <table class="table">
      <thead class="thead-dark">

        <tr>
          <th scope="col">#</th>
          <th scope="col">Titolo</th>
          <th scope="col">Testo</th>
          <th scope="col">Slug</th>
          <th scope="col">Categoria</th>
          <th scope="col"></th>
        </tr>

      </thead>

      <tbody>
          @foreach ($posts as $singlepost)
              <tr>
                  <td>{{$singlepost->id}}</td>
                  <td>{{$singlepost->title}}</td>
                  <td> {{Str::limit($singlepost->content, 70)}} </td>
                  <td>{{$singlepost->slug}}</td>
                  <td>{{isset($singlepost->category) ? $singlepost->category->name: 'N.D.'}}</td>

                  <td class="d-flex justify-content-between">
                    <a href="{{route('admin.posts.show', $singlepost->id)}}" class="btn btn-info pt-1 pb-1">Mostra</a>
                    <a href="{{route('admin.posts.edit', $singlepost->id)}}" class="btn btn-danger pt-1 pb-1">Modifica</a>
                    
                    <form method="POST" action="{{route('admin.posts.destroy', $singlepost->id)}}">

                    @csrf
                    @method('DELETE')

                        <button class="btn btn-warning pt-1 pb-1" type="submit">Elimina</a>
                    
                    </form>
                  </td>
              </tr>
          @endforeach
      </tbody>

    </table>
</div>
@endsection