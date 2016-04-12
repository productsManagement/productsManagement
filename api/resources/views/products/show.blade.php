@extends('layouts.master')
@section("head.title") 
    <title>List Products</title>
@stop


@section("head.style")	
    <p>Style</p>
@stop

@section("body.content")	
    @include("partials.header")
    <ul>        
            <li>
                <p>Product ID: {{ $products->id }}</p>
                <p>Product Name: {{ $products->name }}</p>
                <p>Brand: {{ $products->brand }}</p>
            </li>
    </ul>

    @include("partials.footer")
@stop

@section("body.js")
    <p> Body </p>
@stop