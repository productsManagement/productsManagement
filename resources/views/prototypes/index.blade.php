@extends('layouts.master')

@section("head.title") 
    <title>Prototypes List</title>
@stop


@section("head.style")  
   
@stop

@section('body.content')
    <div id="welcome">
        <div class="container">        
            @foreach($prototypes as $prototype)
                <p>                    
                    {{$prototype->name}}
                    {{$prototype->values}}
                    {{$prototype->type}}
                </p>
            @endforeach
        </div>
    </div>
@stop

@section("body.js")
    
@stop