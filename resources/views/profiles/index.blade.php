@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-3">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQg_-VIhTtZRxQXB77G1n0V-m6KbCWyjkjckg&usqp=CAU"
                alt="fire">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username}}</h1>
                <a href="/p/create">Add new post</a>
                
            </div>
            <div>
            <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
            </div>

            <div class="d-flex">
                <div class="pr-3"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="pr-3"><strong>2M</strong> followers</div>
                <div class="pr-3"><strong>530</strong> following</div>
            </div>
            <div class="pt-4">
                <a>{{ $user->profile->title}}</a>
                <div>{{$user->profile->description}}</div>
                <div><a href="#">{{$user->profile->url ?? 'N/A'}}</a></div>
            </div>
            <div></div>
            <div></div>
        </div> 
    </div>
    <div class="row " >
    @foreach($user->posts as $post)

    <div class="col-4 pb-4">
        <a href="/p/{{$post->id}}">  <img src="/storage/{{$post->image}}" alt="" class="w-100"></a>
         

         </div>
    @endforeach


       


    </div>

</div>
@endsection