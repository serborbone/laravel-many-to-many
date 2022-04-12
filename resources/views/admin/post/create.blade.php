@extends('admin.layouts.base')

@section('content')

  <div class="container">

    <form method="POST" action="{{route('admin.posts.store')}}">

        @csrf

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
          <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
        </div>

        <div class="form-group">
          <label for="content">Testo</label>
          <textarea class="form-control" name="content" id="content" value="{{old('content')}}"></textarea>
        </div>
        
        @foreach ($tags as $tag)
            
          <div class="form-check">
            <input name="tags[]" class="form-check-input" type="checkbox" value="{{$tag->id}}" id="checkbox_{{$tag->id}}" {{ in_array( $tag->id, old('tags', []) )? 'checked':''}}>
            <label class="form-check-label" for="checkbox_{{$tag->id}}"> {{$tag->name}} </label>
          </div>

        @endforeach


        <button type="submit" class="btn btn-primary mt-4 pl-5 pr-5 pt-2 pb-2" >Crea</button>


    </form>

  </div>

 @endsection 