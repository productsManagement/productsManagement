@extends('layouts.master')
@section("head.title") 
    <title>List Products</title>
@stop


@section("head.style")	
    <p>Style</p>
@stop


@section("body.content")	
    <ul>        
        @foreach ($products as $product)
            <li>
                <p>Product ID: {{ $product->id }}</p>
                <p>Product Name: {{ $product->name }}</p>
                <p>Brand: {{ $product->brand }}</p>
                <p><a href="{{route('products.show', $product->id)}}"> Show details</a></p>
            </li>
        @endforeach   
    </ul>

@stop

@section("body.js")
    <p> Body </p>
@stop