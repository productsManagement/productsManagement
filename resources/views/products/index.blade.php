@extends('layouts.master')

@section("head.title") 
    <title>List Products</title>
@stop


@section("head.style")  
   
@stop

@section('body.content')
    <div id="welcome">
        <div class="jumbotron">
            <div class="container">
                <p>
                    Product Management
                </p>
            </div>
        </div>
        @if(!empty($text))
            <div class="container">{!! $text !!}</div>
        @endif
        <div class="container">
            <style>
                #example_grid1 td {
                    white-space: nowrap;
                }
            </style>
            <?= $grid ?>
        </div>
    </div>
@stop

@section("body.js")
    
@stop