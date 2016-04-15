@extends('layouts.master')
@section("head.title") 
    <title>Product</title>
@stop


@section("head.style")	
@stop

@section("body.content")	
    {!!Form::open(array('route'=>array('products.update',$products->id)))!!}
    {!!Form::label('labid','ID :')!!}
    {!!Form::text('id',$products->id,['readonly'])!!}<br></br>
    {!!Form::label('labSKU','SKU :')!!}
    {!!Form::text('SKU',$products->SKU)!!}<br></br>
    {!!Form::label('labname','Name :')!!}
    {!!Form::text('name',$products->name)!!}<br></br>
    {!!Form::label('labbrand','Brand :')!!}
    {!!Form::text('brand',$products->brand)!!}<br></br>
    {!!Form::label('labdes','Description :')!!}
    {!!Form::text('description',$products->description)!!}<br></br>
    {!!Form::label('labprice','BuyPrice :')!!}
    {!!Form::text('buyPrice',$products->buyPrice)!!}<br></br>
    {{Form::submit('Sua thong tin chi tiet')}}
    {!!Form::close()!!}
@stop

@section("body.js")
@stop