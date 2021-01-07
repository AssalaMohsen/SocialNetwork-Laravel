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

    public function show(Tweet $tweet)
    {
        $tweet = Tweet::where('id', $tweet->id)
                    ->withLikes()->get();
        return view('tweets.show',['tweet'=>$tweet[0]]);
    }

    public function store()
    {
        $attributes = request()->validate(['body' => 'required|max:255','attached' => ['image']]);
        if(request('attached')){
            $attributes['attached']= request('attached')->store('attached');
        }
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body'],
            'attached'=>$attributes['attached']??null
        ]);
        
        notify('Tweet Published Successfuly.');
        return back();
    }

    public function destroy(Tweet $tweet)
    {
        Tweet::where('id', $tweet->id)->delete();
        notify('Tweet Deleted Successfuly.');
        if(url()->previous() == ("http://127.0.0.1:8000/tweets/".$tweet->id)){
            return redirect('/tweets');
        }
        return back();
    }
}
