@extends('layouts.master')

@section("head.title") 
    <title>List Products</title>
@stop


@section("head.style")  
   
@stop

@section('body.content')
    <div id="welcome">
        @foreach($templates as $template)
            {{$template->prototype_id}}
            {{$template->category_id}}
        @endforeach
    </div>
@stop

@section("body.js")
    
@stop