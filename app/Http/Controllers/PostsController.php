<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    //requiring authorization
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(){
        return view('posts.create');
    }
 
    public function store(){

        $data = request()->validate(
            [
                'caption'=>'required',
                'image'=> ['required', 'image'],
            ]

        );
        //storing the image in the uploads directory
        $imagePath=request('image')->store('uploads','public');

        //using public_path helper to get the image path
        $image=Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        //creating a post
        auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'image'=>$imagePath,
        ]);
        
        //redirecting the user to the profile path after making a post
        return redirect('/profile/'.auth()->user()->id);
    
    }
    public function show(\App\Post $post){

        return view ('posts.show',[
            'post'=>$post
        ]);

    }

}
