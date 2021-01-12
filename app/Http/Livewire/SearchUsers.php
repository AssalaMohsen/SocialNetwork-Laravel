<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search = '';
    public $isActive = true;

    public function render()
    {
        $user = User::where('username', $this->search)->get();
        return view('livewire.search-users', [
            'users' =>$user,
        ]);
    }
}
