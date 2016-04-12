@extends('layouts.master')
@section("head.title") 
    <title> Homepage </title>
@stop


@section("head.style")	
    <p>Style</p>
@stop

@section("body.content")	
    @include("partials.header")
    <p> Homepage</p>
    <ul>        
        <li><a href="{{ route('products.index') }}"> List Product</a></li>
    	<li><a href="{{ route('products.show', 1) }}"> Show Product id = 1</a></li>   
        <li><a href="{{ route('products.export') }}"> Export Product example</a></li>  
        <li><a href="{{ route('products.edit', 1) }}"> Edit Product</a></li>  
        <li><a href="{{ route('products.createClassify') }}"> Select Product Category</a></li>  
        <li><a href="{{ route('products.createDetails', 1) }}"> Create Product Details</a></li>  
        <li><a href="{{ route('categories.index') }}"> List Categories </a></li> 	
    </ul>

    @include("partials.footer")
@stop

@section("body.js")
    <p> Body </p>
@stop