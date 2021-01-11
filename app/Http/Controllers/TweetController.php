<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index(Request $request)
    {
        $tweets = request()->user()->timeline();
        if($request->ajax()) {
          
            $data = User::where('username',$request->username)
                ->get();
           
            $output = '';
           
            if (count($data)>0) {
              
                $output = '<ul class="suggestions stack-top" style="display: block; position: relative">';
              
                foreach ($data as $row){
                   
                    $output .= '<li><a href="/profiles/'.$row->username.'">'.$row->name.'</a></li>';
                }
              
                $output .= '</ul>';
            }
            else {
             
                $output .= '<ul class="suggestions stack-top" style="display: block; position: relative;">
                <li>'.'No results'.'</li></ul>';
            }
           
            return $output;
        }
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
