<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::orderBy('idpost', 'asc')->get();
        return view('admin.post.index', compact('post'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.post.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:post',
            'content' => 'required',
            'date' => 'required',
            'username' => 'required'
        ]);

        Post::create($request->all());

        return redirect()->route('post.index');
    }

    public function edit($idpost)
    {
        $users = User::all();
        $post = Post::find($idpost);
        return view('admin.post.update', compact('post', 'users'));
    }

    public function update(Request $request, $idpost)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
            'username' => 'required'
        ]);

        $post = Post::find($idpost);
        $post->update($request->all());

        return redirect()->route('post.index');
    }

    public function destroy($idpost)
    {
        Post::find($idpost)->delete();
        return redirect()->route('post.index');
    }
}
