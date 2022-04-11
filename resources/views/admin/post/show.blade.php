@extends('admin.layouts.base')

@section('content')

  <div class="container">

    <h1>{{$post->title}}</h1>
    <div>Testo: {{$post->content}}</div>
    <div>Categoria: {{$post->category->name}}</div>
    <div>Slug: {{$post->slug}}</div>

    <div class="mt-5">
      <a href="{{route('admin.posts.index')}}" class="btn btn-success">Torna alla lista</a>
    </div>

  </div>

@endsection