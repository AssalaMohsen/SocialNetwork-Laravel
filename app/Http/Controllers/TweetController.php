<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        return view('tweets.index',[
            'tweets'=> request()->user()->timeline()
        ]);
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
