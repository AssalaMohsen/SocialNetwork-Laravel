<?php

namespace App\Models;

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

    public function isLikedBy($user){
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', true)->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', false)->count();
    }

    public function like($user = null, $liked = true){
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
