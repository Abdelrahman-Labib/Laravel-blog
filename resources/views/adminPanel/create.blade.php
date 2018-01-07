@extends('layouts.template')

@section('title','Add New Post')

@section('content')
<h1>Add New Post</h1>

<div class="col-sm-8 col-sm-offset-2">
    <form action="{{route('posts.store')}}" method="post">
    {{csrf_field()}}

        <div class="form-group">
        <label for="title">Title:</label>
        <input name="title" type="text" class="form-control">
        </div>
        <div class="form-group">
        <label for="body">Body:</label>
        <textarea name="body" cols="30" rows="10" class="form-control" resize: none></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('posts.index')}}" class="btn btn-default pull-right">Go Back</a>
    </form>
</div>

@endsection