<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
          [
            'title'=>'required|min:5',
            'content' => 'required|min:10',
            'category_id' => 'nullable|exists:categories,id',
          ]
        );

        $data = $request->all();

        $slug = Str::slug($data['title']);

        //indice che definisco per gli slug già esistenti
        $counter = 1;

        //controllo se c'è un post con lo stesso slug
        while(Post::where('slug', $slug)->first() ) {

          //se esiste un post con lo stesso slug appendo un indice dopo il titolo
          $slug = Str::slug($data['title']) . '-' . $counter;
          $counter++;
        
        };

        //il valore slug è uguale allo slug definito sopra
        $data['slug'] = $slug;

        $post = new Post();

        $post->fill($data);

        $post->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

      $categories = Category::all();  

      return view('admin.post.edit', compact('post', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $request->validate(
          [
            'title'=>'required|min:5',
            'content' => 'required|min:10',
            'category_id' => 'nullable|exists:categories,id',
          ]
        );

        $data = $request->all();

        //ottengo lo slug del titolo
        $slug = Str::slug($data['title']);

        //se lo slug è modificato
        if ($post->slug != $slug) {
        
            $counter = 1;

            while(Post::where('slug', $slug)->first() ) {

            //se esiste un post con lo stesso slug appendo un indice dopo il titolo
            $slug = Str::slug($data['title']) . '-' . $counter;
            $counter++;
        
            };

            //il valore slug è uguale allo slug definito sopra
            $data['slug'] = $slug;


        }

        $post->update($data);
        $post->save();

        return redirect()->route('admin.posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
