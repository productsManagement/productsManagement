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
                {!! Form::hidden('category_id', 1, array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Prototype name *:') !!}
                {!! Form::text('name', null, array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('value', 'Values *:') !!}
                {!! Form::number('value_length', null, array('class' => 'form-control', 'id' => 'numberValue')) !!}
                <button id='addValue' type='button' class='btn btn-default'>Add example value</button>
            </div>

            <div>
                {!! Form::label('description', 'Description :') !!}
                {!! Form::textarea('description', null, array('class' => 'form-control'), ['size' => '30x3']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('type', 'Type View *:') !!}
                {!! Form::select('type', array('text' => 'Text', 'check' => 'Checkbox', 'select' => 'Select'), 'text', array('class' => 'form-control')) !!}
            </div>

                {!! Form::submit('Save', ['class'=>"btn btn-default"]) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section("body.js")    
  <script src='/js/createInput.js'></script>
  <script>
    $(document).ready(function() {
      $('#addValue').on('click', function() {
        $(this).createInput($('#numberValue'), 'listOfInput');
      });
    });
  </script>
@stop