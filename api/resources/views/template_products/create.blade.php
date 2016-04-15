@extends('layouts.master')

@section("head.title") 
    <title>Create A Template</title>
@stop


@section("head.style")  
   
@stop

@section('body.content')
    <div id="welcome">
        <div class="container">            
            {!! Form::open(array('route' => 'templates.store', 'method' => 'post', 'role'=>'form')) !!}     

  			<div class="form-group">
                {!! Form::input('text', 'category_id', 1) !!}
            </div>

            @foreach($prototypes as $prototype)   
                <p>                    
                    {!! Form::label("prototype", $prototype->name." : ".$prototype->description) !!}
                    {!! Form::checkbox($prototype->name, $prototype->id) !!}
                </p>         
            @endforeach


  			<div class="form-group">
                {!! Form::label('required', 'Required') !!}
                {!! Form::checkbox('required', true) !!}
            </div>

                {!! Form::submit('Save', ['class'=>"btn btn-default"]) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section("body.js")
    
@stop