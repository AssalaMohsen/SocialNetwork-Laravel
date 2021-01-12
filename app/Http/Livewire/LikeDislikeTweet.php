<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;
use SebastianBergmann\Environment\Console;

class LikeDislikeTweet extends Component
{
    public $tweet;
    public $liked;
    public $disliked;

    public function mount(Tweet $tweet)
    {
        $this->tweet = $tweet;
        $this->liked = $this->tweet->isLikedBy(auth()->user());
        $this->disliked = $this->tweet->isDislikedBy(auth()->user());
    }

    public function toggleLike()
    {
        if ($this->liked == 0) {
            $this->liked = 1;
        } else {
            $this->liked = 0;
        }
    }

    public function updateLike()
    {
        $this->tweet->like(auth()->user());
        $this->tweet = $this->tweet->getTweetWithLikes($this->tweet->id);
        $this->disliked = 0;
        $this->toggleLike();
    }

    public function toggleDislike()
    {
        if ($this->disliked == 0) {
            $this->disliked = 1;
        } else {
            $this->disliked = 0;
        }
    }


    public function updateDislike()
    {
        $this->tweet->dislike(auth()->user());
        $this->tweet = $this->tweet->getTweetWithLikes($this->tweet->id);
        $this->disliked = $this->tweet->isDislikedBy(auth()->user());
        $this->liked = 0;
        $this->toggleDislike();
    }

    public function render()
    {
        return view('livewire.like-dislike-tweet');
    }
}
