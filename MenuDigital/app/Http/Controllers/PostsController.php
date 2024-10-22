<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(Request $request){

        $posts = Post::orderBy('post_date', 'desc')
            ->with('user')
            ->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function show(int $idPost){
        $post = Post::find($idPost);

        return view('posts.show', compact('post'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $credentials = $request->validate([
            'content' => ['required'],
        ]);

        $post = new Post();
        $post->content = $request->content;
        $post->post_date = now();
        $post->user_id = $request->session()->get('user_id');
        $post->save();

        return redirect()->route('posts.index');
    }

    public function edit(Request $request, int $idPost){
        $post = Post::where('id', '=', $idPost)->first();

        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy(Request $request, int $idPost){
        $post = Post::where('id', '=', $idPost)->first();
        $post->delete();

        return redirect()->route('posts.index');
    }


}
