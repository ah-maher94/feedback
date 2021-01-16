<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'recieverId',
        'type'
    ];

    public function likedBy(User $user){
        return $this->likes->contains('user_id', $user->id);
    }

    public function user(){
        return $this->belongsTo(User::class, 'senderId');
    }

    public function recieve(){
        return $this->belongsTo(User::class, 'recieverId');
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }
}
