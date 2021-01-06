<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\FollowNotification;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        request()->user()->toggleFollow($user);
        return back();
    }
}
