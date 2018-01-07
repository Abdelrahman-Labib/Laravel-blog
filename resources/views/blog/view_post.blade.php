@extends('layouts.viewPost')

@section('title','Blog View Post')

@section('content')

<a href="http://127.0.0.1:8000">Go Back Home</a>

<form action="{{ route('posts.update', ['id'=>$id]) }}" style="display:none" method="POST">
{{ csrf_field() }}    
    <input type="text" name="visitCount" value="{{$post->visit_count}}" id="postVisitCount" >
</form>

    <!--container -->
        <h1>{{$post->title}}</h1>
        <p>{{$post->body}}</p>
        <div class="col-md-8 col-md-offset-2">
            <form action="{{ route('getComment', ['id'=>$id]) }}" method="POST">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-9" style="margin-top:20px;">
                        <label for="comment">Comment:</label>
                        <textarea name="comment" id="comment" cols="50" rows="5" class="form-control"></textarea>
                        <input type="submit" class="btn btn-primary pull-right" value="Add Comment" style="margin-top:10px;">
                    </div>
                    
                </div>        
            </form>
        </div>
        
    
<script>  

    setTimeout(function() {
        let visitCount = document.getElementById('postVisitCount').value;
        let visitCountplus = parseInt(visitCount) + 1;
        document.getElementById('postVisitCount').value = visitCountplus;

        let $formVar = $('form');        
        $.ajax({
        url: $formVar.prop('{{ route('posts.update', ['id'=>$id]) }}'),
        method: 'PUT',
        data: $formVar.serialize()
        });        
    }, 1000);
    
</script>
       

@endsection  