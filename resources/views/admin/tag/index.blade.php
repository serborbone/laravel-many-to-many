@extends('admin.layouts.base')

@section('content')
  <div class="container">

      <table class="table">
      <thead class="thead-dark">

        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Slug</th>
          <th scope="col"></th>
        </tr>

      </thead>

      <tbody>
          @foreach ($tags as $tag)
              <tr>
                  <td>{{$tag->id}}</td>
                  <td>{{$tag->name}}</td>
                  <td>{{$tag->slug}}</td>

                  <td class="d-flex justify-content-between">
                    <a href="{{route('admin.tags.show', $tag->id)}}" class="btn btn-info pt-1 pb-1">Mostra</a>
                  </td>
              </tr>
          @endforeach
      </tbody>

    </table>
</div>
@endsection