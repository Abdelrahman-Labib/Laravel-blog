@extends('layouts.template')

@section('title','Blog Admin Panel')

@section('content')
<div class="nav navbar-nav pull-right">
<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
</div>
<a href="http://127.0.0.1:8000">Go Back Home</a>
<h1>Admin Panel</h1>

<a href="{{route('posts.create')}}" class="btn btn-primary pull-right">Add New Blog Post</a>
<br><br><br>

<table class="table">
    <thead>
        <th>ID</th>
        <th>Title</th>
        <th>Body</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
    @foreach($posts as $post)
    <tr>
        <th>{{ $post->id }}</th>
        <td>{{ $post->title }}</td>
        <td>{{ $post->body }}</td>
        <td>edit button</td>
        <td>delete button</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection