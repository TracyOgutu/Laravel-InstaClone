@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-3">
            <img src="{{ $user->profile->profileImage()}}" class="rounded-circle w-100"
                alt="Profile picture">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                <div class="h4">{{ $user->username}}</div>

                 <button class="btn btn-primary ml-4">Follow</button>
                </div>
               
                @can('update',$user->profile)
                <a href="/p/create">Add new post</a>
                @endcan
            </div>
            <div>
            @can('update',$user->profile)
            <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
            @endcan
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