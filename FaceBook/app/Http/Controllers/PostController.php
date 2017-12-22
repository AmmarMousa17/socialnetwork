<?php
namespace App\Http\Controllers;
use App\Like;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

interface Sort {

  public function get() ;

}

class Bytime implements Sort{

 
    public function get()
    { 


        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
             ->orderByRaw(' posts.created_at DESC')
            ->get();
          
            return $posts;

    }

 

}
class Asc implements Sort {

public function get(){

 $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->join('likes','likes.user_id','=','users.id')
             ->orderByRaw(' posts.created_at ASC')
            ->get();
          
            return $posts;

}

} 

class PostController extends Controller
{ 
    
    public function getpost( ){

         $Bytime=new Bytime();
         $Bytime->get();
        
         return view('profile.newsfeed',['posts'=>$Bytime->get()]);
         
        

        
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

    public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 1;
        $update = 0;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = 1;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }
    
}