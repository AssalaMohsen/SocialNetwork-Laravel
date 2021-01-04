<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Response;

class TweetController extends Controller
{
    public function index()
    {
        $tweets = request()->user()->timeline();
        return view('tweets.index', ['tweets'=>$tweets]);
    }

    public function store()
    {
        $attributes = request()->validate(['body'=>'required|max:255']);
        Tweet::create([
            'user_id'=>auth()->id(),
            'body'=> $attributes['body']
        ]);

        return redirect('/tweets');
    }
}
