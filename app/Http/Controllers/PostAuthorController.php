<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostAuthorController extends Controller
{
    public function index()
    {
        $post = Post::orderBy('idpost', 'asc')->where('username', Auth::user()->username)->get();
        return view('author.post.index', compact('post'));
    }

    public function create()
    {
        return view('author.post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:post',
            'content' => 'required',
            'date' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'username' => Auth::user()->username,
        ]);

        return redirect()->route('post-author.index');
    }

    public function edit($idpost)
    {
        $post = Post::find($idpost);
        return view('author.post.update', compact('post'));
    }

    public function update(Request $request, $idpost)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
        ]);

        $post = Post::find($idpost);
        $post->update($request->all());

        return redirect()->route('post-author.index');
    }

    public function destroy($idpost)
    {
        Post::find($idpost)->delete();
        return redirect()->route('post-author.index');
    }
}
