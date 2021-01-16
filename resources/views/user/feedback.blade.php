@extends('layouts.app')


@section("firstContainer")


<div class="container bg-light justify-content-center my-5">
    <div class="row justify-content-center my-5">
        <div class="col-12 justify-content-center my-5">
            <form autocomplete="off" action=" {{ route('feedback') }} " method="POST">
                @csrf


                <div class="row mb-3 justify-content-around">

                    <div class="col-3 select">
                        <select name="selectedUser">
                            <option selected disabled>Choose</option>
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-3 select">
                        <select name="fbType">
                            <option value="strength">Strength</option>
                            <option value="weakness">Weekness</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">

                    <div class="paper">
                        <div class="paper-content">

                            <textarea autofocus class="form-control @error('feedback') is-invalid @enderror"
                                id="feedback" name="feedback"></textarea>

                        </div>
                        @error('feedback')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-info col-2 my-3">Send</button>
                    </div>
                </div>


            </form>
        </div>
    </div>

    @if($feedbacks->count())

    @foreach($feedbacks as $feedback)

    <div class="cards-row justify-content-center">
        @if(($feedback->type) == "strength")
        <div class="card card-strength" title="{{$feedback->type}}">
            @else
            <div class="card card-weakness" title="{{$feedback->type}}">
                @endif
                <div>
                    <span class="feedback-info-span mr-5">To: {{$feedback->recieve->name}}</span>
                    <span class="feedback-info-span ml-5">{{$feedback->created_at->diffForHumans()}}</span>
                </div>
                <div class="my-5">
                    <p>{{$feedback->body}}</p>
                </div>
                @if($feedback->likes()->count())
                <div class="my-1 liked-msg"><span class="badge badge-info">{{ $feedback->recieve->name}} liked your
                        feedback</span>
                </div>
                @endif


                <div>
                    <form autocomplete="off" action=" {{ route('feedback.delete', $feedback) }} " method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary">Delete</button>
                    </form>
                </div>

            </div>


        </div>

        @endforeach

        @else
        No feedbacks sent yet.
        @endif

    </div>
</div>



@endSection