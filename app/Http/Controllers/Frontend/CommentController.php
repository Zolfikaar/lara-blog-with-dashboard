<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::check()){
            $validator = Validator::make($request->all(),[
                'comment_body' => 'required|string'
            ]);

            if($validator->fails()){
                return redirect()->back()->with('message', 'Please write a valid comment');
            }
            $post = Post::where('slug', $request->post_slug)->first();
            if($post){
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body
                ]);
                return redirect()->back()->with('success', 'Comment added successfully');
            }else{
                return redirect()->back()->with('message', 'Post Not found');
            }
        }else{
            return redirect('login')->with('message', 'Login first to comment');
        }
    }

    public function edit($id)
    {
        $comment = Comment::find($id);
        if($comment){
            return view('frontend.comments.edit', compact('comment'));
        }else{
            return redirect()->back()->with('message', 'Comment not found');
        }
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        if($comment){
            $validator = Validator::make($request->all(),[
                'comment_body' => 'required|string'
            ]);

            if($validator->fails()){
                return redirect()->back()->with('message', 'Please write a valid comment');
            }
            $comment->comment_body = $request->comment_body;
            $comment->save();
            return redirect()->back()->with('success', 'Comment updated successfully');
        }else{
            return redirect()->back()->with('message', 'Comment not found');
        }
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if($comment){
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully');
        }else{
            return redirect()->back()->with('message', 'Comment not found');
        }
    }
}
