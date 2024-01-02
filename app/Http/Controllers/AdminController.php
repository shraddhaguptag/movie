<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Traits\RequestTrait;
use Exception;

class AdminController extends Controller
{
    use RequestTrait;

    public function __construct()
    {
        $this->middleware(['auth','isAdmin']);
    }

    public function sendIndex()
    {
        if(Auth::user()->role_as == 1){          
        return view('admin.notification', ['users' => User::where('id', '<>', Auth::user()->id)->select(['id','name',])->get()->toArray()]);
        }
        elseif(Auth::user()->role_as == 0){
            Session::flush();
            Auth::logout();
            return redirect('login');
        }
        else{
            return redirect('/login')->with('status',"You don't have access. Need to login");

        }
    }


    public function sendMessage(Request $request) {
        try {
            $user = User::where('id', (int) $request->user)->select(['id', 'name'])->first();
            $channel = $user->getChannelName('messages'); //Function in User.php Model
            $response = $this->sendSocketIONotification($channel, $request->message);
            return response()->json(['status' => true, 'message' => 'Sent message!', 'response' => $response]);    
        } catch(Exception $e) {
            return response()->json(['status' => false, 'message' =>$e->getMessage().' '.$e->getLine()]);
        }
    }
}
