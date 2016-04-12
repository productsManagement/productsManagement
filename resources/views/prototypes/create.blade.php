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
                {!! Form::number('category_id', 1, array('class' => 'form-control')) !!}
            </div>

  			<div class="form-group">
                {!! Form::label('name', 'Prototype name') !!}
                {!! Form::text('name', null, array('class' => 'form-control')) !!}
            </div>

  			<div class="form-group">
                {!! Form::label('value', 'Values') !!}
                {!! Form::number('value_length', 4, array('class' => 'form-control')) !!}
                  <div class="form-inline">
                    {!! Form::text('value0', $value=null, array('class' => 'form-control')) !!}
                  	{!! Form::text('value1', $value=null, array('class' => 'form-control')) !!}
                  	{!! Form::text('value2', $value=null, array('class' => 'form-control')) !!}
                  	{!! Form::text('value3', $value=null, array('class' => 'form-control')) !!}
                  </div>
            </div>

            <div>
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea('description', null, array('class' => 'form-control'), ['size' => '30x5']) !!}
            </div>

  			<div class="form-group">
                {!! Form::label('type', 'Type View') !!}
                {!! Form::select('type', array('text' => 'Text', 'check' => 'Checkbox', 'select' => 'Select'), 'text', array('class' => 'form-control')) !!}
            </div>

                {!! Form::submit('Save', ['class'=>"btn btn-default"]) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section("body.js")

@stop