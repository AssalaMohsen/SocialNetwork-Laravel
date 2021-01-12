<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FollowUser extends Component
{
    public $user; 
    public $authUser;
    public $following;

    public function mount($user,$authUser){
        $this->user = $user;
        $this->authUser=$authUser;
        $this->following= $authUser->following($user);
    }

    public function updateFollow(){
        $this->authUser->toggleFollow($this->user);
        $this->toggleFollowing();
    }

    public function toggleFollowing(){
        if($this->following==0){
            $this->following=1;
        }
        else{
            $this->following=0;
        }
    }
    public function render()
    {
        return view('livewire.follow-user');
    }
}
