<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index()
    {
        $posts['posts'] = Post::all();
        return view('backend.pages.posts.index', $posts);
    }


    public function create()
    {
        $categories = Category::all();
        return view('backend.pages.posts.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'desc' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
        ]);


        if (Post::where('slug', Str::slug($request->title))->exists()) {
            return back()->with('error','Exists! Change your post title.');
        }


        $posts = new Post();
        $posts->title = $request->title;
        $posts->category = $request->category;
        $posts->slug = Str::slug($request->title);
        $posts->desc = $request->desc;

        $folderPath = public_path('upload/posts');


        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true, true);
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/posts/' . $posts->image));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/posts'), $fileName);
            $posts->image = $fileName;
        }

        $posts->save();
        return redirect()->route('posts')->with('msg', 'Created Successfully!');
    }


    public function edit(string $id)
    {
        $post['categories'] = Category::all();
        $post['post'] = Post::find($id);
        return view('backend.pages.posts.edit', $post);
    }


    public function update(Request $request, string $id)
    {
        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->category = $request->category;
        $posts->slug = Str::slug($request->title);
        $posts->desc = $request->desc;

        $folderPath = public_path('upload/posts');

        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true, true);
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/posts/' . $posts->image));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/posts'), $fileName);
            $posts->image = $fileName;
        }

        $posts->save();
        return redirect()->route('posts')->with('msg', 'Updated Successfully');
    }


    public function destroy(string $id)
    {
        $post = Post::find($id);
        @unlink(public_path('upload/posts/' . $post->image));
        $post->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
