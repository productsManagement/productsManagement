@extends('layouts.master')
@section("head.title") 
    <title>List Root Categories</title>
@stop


@section("head.style")	
    <p>Style</p>
@stop

@section("body.content")	
    @include("partials.header")
    <ul>        
        @foreach ($categories as $category)
            <li>
                <p>Product ID: {{ $category->id }}</p>
                <p>Product Name: {{ $category->name }}</p>
                <p>Brand: {{ $category->description }}</p>
                <p><a href="{{route('categories.getchildren', $category->id)}}"> Show children</a></p>
            </li>
        @endforeach   
    </ul>

    @include("partials.footer")
@stop

@section("body.js")
    <p> Body </p>
@stop