@extends('admin.layouts.base')

@section('content')

  <div class="container">

    <h1>{{$post->title}}</h1>
    <div>Testo: {{$post->content}}</div>
    <div>Categoria: {{isset($post->category->name) ? $post->category->name: 'N.D.'}}</div>
    <div>Slug: {{$post->slug}}</div>
  
    @foreach ($post->tags as $tag)
        <span class="badge badge-primary p-2 mt-2">{{$tag->name}}</span>
    @endforeach

    <div class="mt-5">
      <a href="{{route('admin.posts.index')}}" class="btn btn-success">Torna alla lista</a>
    </div>

  </div>

@endsection