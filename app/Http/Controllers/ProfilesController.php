<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{
    //
    public function index(User $user)

    { 
       // Checking if the authenticated user follows the profile
        $follows=(auth()->user())? auth()->user()->following->contains($user->id):false;

       // dd($follows);
       
        return view('profiles.index',compact('user','follows'));
    }
    public function edit(User $user){

        //authorizing an update , requires a profile
        $this->authorize('update',$user->profile);
        return view('profiles.edit',compact('user'));

    }
    public function update(User $user){

        $this->authorize('update',$user->profile);

        $data = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=> 'url',
            'image'=>'',
        ]);
       

        if(request('image')){

            $imagePath=request('image')->store('profile','public');

            //using public_path helper to get the image path
            $image=Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            $imageArray= ['image'=>$imagePath];
    
        }
         //only the authenticated user can update the profile
         //performing an array merge such that the image key in the data array takes
         // up the image Path instead of the second array
         $user->profile->update(array_merge(
             $data,
             $imageArray ?? []
         ));

        return redirect("/profile/{$user->id}");

    }
    
}