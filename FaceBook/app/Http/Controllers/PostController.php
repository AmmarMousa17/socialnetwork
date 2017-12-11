<?php
namespace App\Http\Controllers;
use App\Like;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{ 
    
    public function getpostsbytime()
    {

        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
             ->orderByRaw(' posts.created_at DESC')
            ->get();
          
            return view('profile.newsfeed',['posts'=>$posts]);
    }
    
    public function postCreatePost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        $post = new Post();
        $post->body = $request['body'];
        $message = 'There was an error';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post successfully created!';
        }
        return back();
    }
    
}