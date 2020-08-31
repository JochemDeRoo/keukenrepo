@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

<div class="container">
<h2>Gegevens bewerken</h2>
<p>Pas hieronder je gegevens aan klik op opslaan om je wijzigingen toe te passen.<p>

    <div class="row">
        <div class="col-sm-6"">
        {!! Form::open(['action' => ['profileController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Naam')}}
            {{Form::text('name', $user->name, ['placeholder' => 'Name', 'class' =>'form-control'])}}
        </div>
        </div>
        <div class="col-sm-6"">
        <div class="form-group">
            {{Form::label('email', 'E-mail')}}
            {{Form::text('email', $user->email, ['id' => 'article-ckeditor', 'placeholder' => 'Email', 'class' =>'form-control'])}}
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            {{Form::hidden('_method','PUT')}}
                {{Form::submit('opslaan', ['class' =>'btn btn-success'])}}
            {!! Form::close() !!}
        </div>
        <div class="col-sm-6">
            {!!Form::open(['action' => ['profileController@destroy', $user->id], 'method' => 'POST'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Verwijder Account', ['class' => 'btn btn-delete'])}}
            {!!Form::close()!!}
        </div>
    </div>
    <br>
    <br>
    <br>
</div>

@endsection