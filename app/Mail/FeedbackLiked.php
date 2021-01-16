<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Feedback;

class FeedbackLiked extends Mailable
{
    use Queueable, SerializesModels;


    public $liker;
    public $feedback;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $liker, Feedback $feedback)
    {
        $this->liker = $liker;
        $this->feedback = $feedback;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.feedbacks.feedback_liked');
    }
}
