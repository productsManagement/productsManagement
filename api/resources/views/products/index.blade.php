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
    
    <script>
    $(document).ready(function(){
        $('.popover-class').popover({ 
            html : true,
            placement : "bottom",
            trigger: 'click',
            title: 'You can change name of this product',
            content: function(){
                var row = $(this).closest('tr');
                var product_id = row.find('input[name=product_id]').val();
                var value = $(this).parent().find('.value').text();
                
                var res = '<form id="change-name" action="/products/change-name" method="POST">'+
                    'Name : <input type="text" name="name" id="newName" value="' + value  + '">'+
                    '<input type="text" name="id" value="'+ product_id + '">'+
                    '<input type="submit" id="change-name-submit" value="Save">'+
                    '<button type="button" class="close" onclick="$(&quot;.popover-class&quot;).popover(&quot;hide&quot;);">&times;</button>' +
                '</form>';
                return res;
            }
        }).on("show.bs.popover", function(e){
                // hide all other popovers
                $("[rel=popover]").not(e.target).popover("destroy");
                $(".popover").remove();                    
            });; 
    });
    </script>


    <script type="text/javascript">
        $(document).on('click', '#change-name-submit', function(e){
                var postData = $(this).parent().serializeArray();
                var formURL = $(this).parent().attr("action");

                var value_area = $(this).closest("div.product_name").find("p.value");

                $.ajax({
                    url : formURL,
                    type: 'POST',
                    data : postData
                }).done(function(data, textStatus, jqXHR) {
                    alert( "success");
                    value_area.text(data);      
                    $(".popover-class").popover('hide');
                  })
                  .fail(function(jqXHR, textStatus, errorThrown) {
                    alert( "error" );
                  });
                e.preventDefault(); //STOP default action
        });
    </script>
@stop