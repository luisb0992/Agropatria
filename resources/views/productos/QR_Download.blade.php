<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<style type="text/css">
	.margin-abajo
    {
        width: 100%;
        bottom: 0;
        position: absolute;
        height: auto;
    }
    body
    {
        margin: 0 0 0px;
    }
	</style>
</head>
<body>
	<div style="border: dashed 1px #222; text-align: center;">
		<img src="data:image/png;base64,{{ $base64qr }}">
	</div>
	<footer style="border-top: solid 2px #353535; text-align: center;" class="margin-abajo">
		<span>
			Copyright &copy; {{ date("Y") }} Venezolana de Riego C.A. | All rights reserved.
		</span> 
	</footer>	
</body>
</html>