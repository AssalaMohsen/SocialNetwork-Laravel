<?php

namespace App\Models;

use App\Notifications\DislikeNotification;
use App\Notifications\LikeNotification;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tweet extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function scopeWithLikes(EloquentBuilder $query){
        $query->leftJoinSub('select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
        'likes',
        'likes.tweet_id',
        'tweets.id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getAttachedAttribute($value)
    {
        if($value==null){
            return null;
        }
        return asset($value);
    }

    public function isLikedBy($user){
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', true)->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', false)->count();
    }

    public function like($user = null, $liked = true){

        if($this->isLikedBy(auth()->user()) && $liked==true ){
            return $this->likes()->where('user_id', auth()->user()->id)->delete();
        }
        elseif($this->isDislikedBy(auth()->user()) && $liked==false){
            return $this->likes()->where('user_id', auth()->user()->id)->delete();
        }

        if($liked==true && !($this->user->id==auth()->user()->id)){
            $this->user->notify(new LikeNotification($user,$this));
        }
        elseif($liked==false && !($this->user->id==auth()->user()->id)){
            $this->user->notify(new DislikeNotification($user,$this));
        }
        
        $this->likes()->updateOrCreate( [
            'user_id' => $user ? $user->id : auth()->id(),
        ],
        [
            'liked' => $liked,
        ]);
    }

    public function dislike($user = null){
        $this->like($user,false);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

}
