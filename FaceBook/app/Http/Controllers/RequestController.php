<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\friendships;
interface requests {

  public function get() ;

}

class update implements requests{

 
    public function get()
    { 


         $uid = Auth::user()->id;
        $FriendRequests = DB::table('friendships')
                        ->rightJoin('users', 'users.id', '=', 'friendships.requester')
                        ->where('status', '=', Null)
                        ->where('friendships.user_requested', '=', $uid)->get();
                        return $FriendRequests;

    }

 

}


class RequestController extends Controller
{
   
    public function findFriends() {
        $uid = Auth::user()->id;
        $allUsers = DB::table('profiles')
        ->leftJoin('users', 'users.id', '=', 'profiles.user_id')
        ->where('users.id', '!=', $uid)->get();
    
        return view('profile.findFriends', compact('allUsers'));
    }
     public function sendRequest($id) {
        Auth::user()->addFriend($id);
        return back();

    }
     public function requests() {
        
         $requests=new update();
         $requests->get();
        
         return view('profile.requests',['FriendRequests'=>$requests->get()]);
    }


     public function accept($name, $id) {
        $uid = Auth::user()->id;
        $checkRequest = friendships::where('requester', $id)
                ->where('user_requested', $uid)
                ->first();
        if ($checkRequest) {
            // echo "yes, update here";
            $updateFriendship = DB::table('friendships')
                    ->where('user_requested', $uid)
                    ->where('requester', $id)
                    ->update(['status' => 1]);
                    return back()->with('msg', 'You are now Friend with this user');
            
        } else {
            return back()->with('msg', 'You are now Friend with this user');

        }
    }

}
