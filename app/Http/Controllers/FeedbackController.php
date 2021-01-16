<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;

class FeedbackController extends Controller
{

    public function __construct(){
        $this->middleware(["auth"]);
    }

    public function feedback(){
        // dd(auth()->user()->feedback);
        $userId = auth()->user()->id;
        $feedbacks = Feedback::orderBy('created_at', 'desc')->with(['user', 'likes'])->where('senderId', '=', $userId)->get();
        $users = User::get();
        return view('user.feedback', [
            "feedbacks" => $feedbacks,
            "users" => $users
        ]);
    }

    public function recievedFeedback(){
        // dd(auth()->user()->feedback);
        $userId = auth()->user()->id;
        $feedbacks = Feedback::orderBy('created_at', 'desc')->with(['recieve', 'likes'])->where('recieverId', '=', $userId)->get();
        return view('user.profile', [
            "feedbacks" => $feedbacks
        ]);
    }

    public function sendFeedback(Request $request){
        $this->validate($request, [
            "feedback"=>"required",
            "selectedUser"=>"required",
            "fbType"=>"required"
        ]);

        $request->user()->feedback()->create([
            "body"=> $request->feedback,
            "recieverId"=> $request->selectedUser,
            "type"=> $request->fbType
        ]);

        return back();
    }

    public function destroy(Feedback $feedback){
        $feedback->delete();
        return back();
    }


}
