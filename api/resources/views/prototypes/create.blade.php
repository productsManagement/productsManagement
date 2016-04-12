@extends('layouts.master')

@section("head.title") 
    <title>Create A Prototype</title>
@stop


@section("head.style")  
   
@stop

@section('body.content')
    <div id="welcome">
        <div class="container">            
            {!! Form::open(array('route' => 'prototypes.store', 'method' => 'post', 'role'=>'form')) !!}     

  			<div class="form-group">
                {!! Form::number('category_id', 1) !!}
            </div>

  			<div class="form-group">
                {!! Form::label('name', 'Prototype name') !!}
                {!! Form::text('name') !!}
            </div>

  			<div class="form-group">
                {!! Form::label('value', 'Values') !!}
                {!! Form::number('value_length', 4) !!}
                	{!! Form::text('value0', $value=null) !!}
                	{!! Form::text('value1', $value=null) !!}
                	{!! Form::text('value2', $value=null) !!}
                	{!! Form::text('value3', $value=null) !!}
            </div>

            <div>             
                {!! Form::label('description', 'Description') !!}   
                {!! Form::textarea('description', null , ['size' => '30x5']) !!}
            </div>

  			<div class="form-group">
                {!! Form::label('type', 'Type View') !!}
                {!! Form::text('type') !!}
            </div>
            {!! Form::select('size', array('L' => 'Large', 'S' => 'Small')) !!}

                {!! Form::submit('Save', ['class'=>"btn btn-default"]) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section("body.js")
    
@stop