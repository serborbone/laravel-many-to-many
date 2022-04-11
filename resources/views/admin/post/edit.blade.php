@extends('admin.layouts.base')

@section('content')

  <div class="container">

    <form method="POST" action="{{route('admin.posts.update', $post->id)}}">

        @csrf
        @method('PUT')

        <div class="form-group">

          <label for="category_id">Categoria</label>
          <select class="form-control" id="category_id" name="category_id">
            
            <option value="">Seleziona una categoria</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach

          </select>

        </div>

        <div class="form-group">
          <label for="title">Titolo</label>
          <input type="text" class="form-control" name="title" id="title" value="{{old('title', $post->title)}}">
        </div>

        <div class="form-group">
          <label for="content">Testo</label>
          <textarea class="form-control" name="content" id="content" value="{{old('content', $post->content)}}"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary pl-5 pr-5 pt-2 pb-2" >Salva</button>

    </form>

  </div>

 @endsection 