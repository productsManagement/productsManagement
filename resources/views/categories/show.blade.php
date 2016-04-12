@extends('layouts.master')
@section("head.title") 
    <title>Categories Children</title>
@stop


@section("head.style")	
    <p>Style</p>
@stop

@section("body.content")	
    @include("partials.header")
    <ul>   
        @foreach($categories as $category)     
            <li>
                <p>Category ID: {{ $category->id }}</p>
                <p>Category Name: {{ $category->name }}</p>
                <p>Category description: {{ $category->description }}</p>
            </li>
        @endforeach
    </ul>

    @include("partials.footer")
@stop

@section("body.js")
    <p> Body </p>
@stop