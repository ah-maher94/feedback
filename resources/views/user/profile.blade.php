@extends('layouts.app')


@section("firstContainer")


<div class="container bg-light justify-content-center my-5">



    @if($feedbacks->count())
    @foreach($feedbacks as $feedback)

    <div class="cards-row justify-content-center">
        @if(($feedback->type) == "strength")
        <div class="card card-strength" title="{{$feedback->type}}">
            @else
            <div class="card card-weakness" title="{{$feedback->type}}">
                @endif
                <div>
                    <span class="feedback-info-span mr-5">From: {{$feedback->user->name}}</span>
                    <span class="feedback-info-span ml-5">{{$feedback->created_at->diffForHumans()}}</span>
                </div>
                <div class="my-2">
                    <p>{{$feedback->body}}</p>
                </div>

                @if(!$feedback->likedBy(auth()->user()))
                <form autocomplete="off" action=" {{ route('feedback.like', $feedback) }} " method="POST">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Like</button>
                </form>
                @else
                <form autocomplete="off" action=" {{ route('feedback.like', $feedback) }} " method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-secondary">Unlike</button>
                </form>
                @endif

            </div>
        </div>
        @endforeach

        @else
        No feedbacks received yet.
        @endif

    </div>


</div>


@endSection