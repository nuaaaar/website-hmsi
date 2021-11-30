<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data['posts'] = Post::orderByDesc('updated_at')->get();

        return view('dashboard.post.index', $data);
    }

    public function create()
    {
        return view('dashboard.post.create');
    }

    public function store(Request $request)
    {
        $thumbnailPath = '/app-assets/images/icon/image.png';
        if ($request->hasFile('thumbnail'))
        {
            $fileName = time().'_'.$request->file('thumbnail')->getClientOriginalName();
            $thumbnailPath = '/storage/' . $request->file('thumbnail')->storeAs('thumbnails', $fileName, 'public');
        }
        Post::create([
            'title' => $request->title,
            'url' => $request->url,
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->back()->with('OK', 'Data berhasil ditambah.');
    }

    public function edit($id)
    {
        $data['post'] = Post::findOrFail($id);

        return view('dashboard.post.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $thumbnailPath = $post->thumbnail;
        if ($request->hasFile('thumbnail'))
        {
            $fileName = time().'_'.$request->file('thumbnail')->getClientOriginalName();
            $thumbnailPath = '/storage/' . $request->file('thumbnail')->storeAs('thumbnails', $fileName, 'public');
        }
        $post->update([
            'title' => $request->title,
            'url' => $request->url,
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->back()->with('OK', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('OK', 'Data berhasil dihapus.');
    }
}
