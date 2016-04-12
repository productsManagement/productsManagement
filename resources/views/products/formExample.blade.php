@extends('layouts.master')
@section("head.title") 
    <title>List Products</title>
@stop


@section("head.style")	
@stop

@section("body.content")	
    @include("partials.header")
    
	{!! Form::open(array('route' => 'products.storeClassify', 'method' => 'post')) !!}
	    {!! Form::$product('name') !!}
	    {!! Form::text('brand') !!}
	    {!! Form::label('email', 'E-Mail Address') !!}
	    {!! Form::email('email', $value = null, $attributes = array()) !!}
	{!! Form::close() !!}
    

    @include("partials.footer")
@stop

@section("body.js")
@stop