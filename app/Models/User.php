<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar',
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        return asset($value?: '/images/default-avatar.png');
    }

    public function follow(User $user)
    {
        $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
        if($this->following($user))
        {
            return $this->unfollow($user);
        }
        return $this->follow($user);
        
    }

    public function follows()
    {
        return $this->belongsToMany(User::class,'follows','user_id','following_user_id');
    }

    public function following(User $user){
        return $this->follows()->where('following_user_id',$user->id)->exists();
    }

    public function timeline()
    {
        $friends_ids = $this->follows()->pluck('id');
        return Tweet::whereIn('user_id', $friends_ids)
                    ->orwhere('user_id',$this->id)
                    ->withLikes()
                    ->latest()->get();
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

}