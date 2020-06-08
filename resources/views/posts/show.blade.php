@extends('layouts.master')
@section('content')
<a href="/" class="btn btn-dark">Go Back</a><br><br>
<h1>{{$post->title}}</h1>
<a href="/profile/{{$post->user_id}}" style="text-decoration: none; color: black;"><small>geschreven door {{$post->user->name}} op {{$post->created_at}}</small></a>
<div>
    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
    <hr>
    <h4>
    {{$post->body}}
    </h4>
</div>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
        <a href="/posts/{{$post->id}}/edit" class="btn btn-success">edit</a>
        <br>
        <br>
        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'col-xs-offset-2'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
        <br>
        <br>
    @elseif(Auth::user()->role == 'admin')
        <a href="/posts/{{$post->id}}/edit" class="btn btn-success">edit</a>
        <br>
        <br>
        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'col-xs-offset-2'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
        <br>
        <br>
    @endif
    <div class='row'>
        <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 30px;">
            {!!Form::open(['route' => ['comments.stored', $post->id], 'method' => 'POST'])!!}
                <div class="row">
                    <div class="col-md-12">
                        {{Form::label('comment', "Comment:")}}
                        {{Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5'])}} 

                        {{Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top: 15px;'])}}
                    </div>
                </div>
            {!!Form::close()!!}
        </div>
    </div>
@endif
<div class="row">
    <div class="col-md-8 col-md-offset-2" style="margin-top: 30px;">
        @foreach($post->comments as $comment)
            <p><strong>Name: </strong> {{$comment->name}}</p>
            <p><strong>Comment:</strong><br/>{{$comment->comment}}<p>
            {!!Form::open(['action' => ['CommentsController@destroy', $comment->id], 'method' => 'POST', 'class' => 'col-xs-offset-2'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            <br>
        @endforeach
    </div>
</div>
@endsection