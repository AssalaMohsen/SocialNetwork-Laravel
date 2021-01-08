<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show',['user'=>$user,'tweets'=>$user->tweets()->withLikes()->paginate(10)]);
    }
    public function edit(User $user)
    {
        $this->authorize('edit',$user);
        return view('profiles.edit',compact('user'));
    }
    public function update(User $user)
    {
        $attributes = request()->validate(['username' => [
            'string',
            'required',
            'max:255',
            'alpha_dash',
            Rule::unique('users')->ignore($user),
        ],
        'name' => ['string', 'required', 'max:255'], 
        'avatar' => ['image'],
        'cover' => ['image'],
        'description'=>['string','max:255'],
        'email' => [
            'string',
            'required',
            'email',
            'max:255',
            Rule::unique('users')->ignore($user),
        ],
        'password' => [
            'string',
            'required',
            'min:8',
            'max:255',
            'confirmed',//make sure the password confirmation match
        ]
        ]);
        $attributes['password']= Hash::make($attributes['password']);
        if(request('avatar')){
        $attributes['avatar']= request('avatar')->store('avatars');
        }
        if(request('cover')){
            $attributes['cover']= request('cover')->store('covers');
        }
        
        $user->update($attributes);
        return redirect('/profiles/'.$user->username);
    }

    public function followers(User $user){
        return view('profiles.followers',['followers'=>$user->followers()->paginate(10),'user'=>$user]);
    }

    public function following(User $user){
        return view('profiles.following',['followings'=>$user->follows()->paginate(10),'user'=>$user]);
    }
}
