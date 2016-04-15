@extends('layouts.master')
@section("head.title") 
    <title>Categories Children</title>
@stop


@section("head.style")	
@stop

@section("body.content")	
    {!!Form::open(array('route'=>array('categories.update',$category->id)))!!}
    {!!Form::label('labid','Category ID')!!}
    {!!Form::text('id', $category->id ,['readonly'])!!}<br></br>
    {!!Form::label('labname','Category Name:')!!}
    {!!Form::text('name',$category->name)!!}<br></br>
    {!!Form::label('labdes','Category description: ')!!}
    {!!Form::text('description',$category->description )!!}<br></br>
    {!!Form::submit('Sua')!!}
    {!!Form::close()!!}
@stop

@section("body.js")
@stop