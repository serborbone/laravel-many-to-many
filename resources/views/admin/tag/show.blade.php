@extends('admin.layouts.base')

@section('content')

  <div class="container">

    <h1>Tag</h1>
    <div>{{$tag->name}}</div>
    <div>Slug: {{$tag->slug}}</div>
    
    <ul>
      @foreach ($tag->posts as $post)
        {{-- Lista dei post con questo tag --}}
        <li>
            {{-- Link che mi porta al post --}}
            <a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a>
        </li>
      @endforeach
    </ul>

    <div class="mt-5">
      <a href="{{route('admin.tags.index')}}" class="btn btn-success">Torna ai tag</a>
    </div>

  </div>

@endsection