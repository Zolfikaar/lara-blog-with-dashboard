<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\PostFormRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::where('status', '0')->get();
        return view('admin.post.create', compact('categories'));
    }

    public function store(PostFormRequest $request)
    {
        $data = $request->validated();

        $post = new Post();
        $post->title = $data['title'];
        $post->slug = Str::slug($data['title'],'-');
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keywords = $data['meta_keywords'];
        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = Auth::user()->id;

        $post->save();

        return redirect(\route('admin.posts'))->with('success', 'Post created successfully');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::where('status', '0')->get();
        return view('admin.post.edit', compact('post','categories'));
    }

    public function update(PostFormRequest $request, $post_id)
    {
        $data = $request->validated();

        $post = Post::find($post_id);
        $post->title = $data['title'];
        $post->slug = Str::slug($data['title'],'-');
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keywords = $data['meta_keywords'];
        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = Auth::user()->id;

        $post->update();

        return redirect(\route('admin.posts'))->with('success', 'Post updated successfully');
    }

    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        $post->delete();

        return redirect(\route('admin.posts'))->with('success', 'Post deleted successfully');
    }
}
