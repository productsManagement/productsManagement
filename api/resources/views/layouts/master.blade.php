<!DOCTYPE html>
<html lang="en">
<head>
    @yield("head.title")

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    @yield("head.style")

</head>
<body>	
    @include("partials.header")

    @include("partials.nav")
    
	<div >
	    @yield("body.content")
	</div>
    
    @include("partials.footer")

    @yield("body.js")
</body>
</html>