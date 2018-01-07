@extends('layouts.publicHome')

@section('title','Blog Home Page')

@section('content')

    <!--container -->
    
<h2>{{ $organization }}</h2>
    @foreach($posts as $post)
        <div class="well well-lg">
            <h3>{{$post->title}}</h3>
            <p>{{$post->body}}</p>
            <br><br>
            @if(Auth::check())
            <p>Post Created At: {{date('F d, Y',strtotime($post->created_at))}} at {{date('g:i a',strtotime($post->created_at))}}</p>
            <p>Visit Count: {{$post->visit_count}}</p>
            @endif
            <a href="{{route('posts.show',['id'=>$post->id])}}" class="btn btn-default pull-right">View Post</a>
            &nbsp;
        </div>

    @endforeach

    {{$posts->links()}}      
        
    

@endsection   
