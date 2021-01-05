<?php

namespace App\Http\Controllers;

use App\Models\Tweet;

class TweetController extends Controller
{
    public function index()
    {
        $tweets = request()->user()->timeline();
        return view('tweets.index', ['tweets' => $tweets]);
    }

    public function store()
    {
        $attributes = request()->validate(['body' => 'required|max:255']);
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);
        notify('Tweet Published Successfuly.');
        return back();
    }

    public function destroy(Tweet $tweet)
    {
        Tweet::where('id', $tweet->id)->delete();
        notify('Tweet Deleted Successfuly.');
        return back();
    }
}
