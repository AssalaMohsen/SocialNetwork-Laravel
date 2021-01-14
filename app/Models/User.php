<?php

namespace App\Models;

use App\Notifications\FollowNotification;
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
        'cover',
        'description',
        'username',
        'name',
        'email',
        'password',
        'provider_id',
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

    public function getCoverAttribute($value)
    {
        return asset($value?: '/images/default-profile-banner.jpg');
    }

    public function getDescriptionAttribute($value)
    {
        return $value?: "What's happening?!";
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
            notify('You unfollowed '.$user->name.'.');
            return $this->unfollow($user);
        }
        notify('You are now following '.$user->name.'.');
        $user->notify(new FollowNotification(request()->user()));
        return $this->follow($user);
        
    }

    public function follows()
    {
        return $this->belongsToMany(User::class,'follows','user_id','following_user_id');
    }

    public function followers()
    {
        $followers_ids = follow::where('following_user_id',$this->id)->pluck('user_id');
        $followers = User::whereIn('id',$followers_ids);
        return $followers;
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
                    ->latest()->paginate(20);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

}