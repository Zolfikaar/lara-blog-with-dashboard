<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $cats_count = Category::count();
        $posts_count = Post::count();
        $users_count = User::where('role_as', '0')->count();
        $admins_count = User::where('role_as', '1')->count();
        return view('admin.dashboard', compact('cats_count', 'posts_count', 'users_count', 'admins_count'));
    }
}
