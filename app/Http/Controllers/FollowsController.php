<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //To prevent a user from following while not logged in

    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function store(User $user){
        

        return auth()->user()->following()->toggle($user->profile);

    }
}
