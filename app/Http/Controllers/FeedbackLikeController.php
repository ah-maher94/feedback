<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackLiked;


class FeedbackLikeController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function store(Feedback $feedback, Request $request){

        if($feedback->likedBy($request->user())){
            return response(null, 409);
        }

        $feedback->likes()->create([
            'user_id'=>$request->user()->id
        ]);

        if(!$feedback->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()){
            // Mail::to($feedback->user)->send(new FeedbackLiked(auth()->user(), $feedback));
        }
        return back();
   }


    public function destroy(Feedback $feedback, Request $request){
        $request->user()->likes()->where('feedback_id', $feedback->id)->delete();
        return back();
    }

}
