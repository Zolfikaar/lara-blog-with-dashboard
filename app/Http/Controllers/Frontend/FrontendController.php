<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $latestPosts = Post::orderBy('created_at', 'DESC')->get()->take(10);
        return view('frontend.index', compact('categories','latestPosts'));
    }

    public function viewCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $cat_id = $category->id;
        $posts = Post::where('category_id', $cat_id)->paginate(5);
        return view('frontend.post.index', compact('category', 'posts'));
    }

    public function viewPost($category_slug, $post_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        $cat_id = $category->id;
        $post = Post::where('category_id', $cat_id)->where('slug', $post_slug)->first();
        $latest_posts = Post::where('category_id', $cat_id)->orderBy('created_at', 'DESC')->get()->take(7);
        return view('frontend.post.view', compact('post', 'category', 'latest_posts'));
    }
}
