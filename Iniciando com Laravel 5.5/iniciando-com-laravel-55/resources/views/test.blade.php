<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">    
    <title>Blade Template</title>
</head>
<body>

Hello World
<br>
{{$nome}}
<br>
{{$variavel1}}
<br>
concatenação = 
{{$variavel1.$nome}}
<br>
concatenação dos valores com espaço = 
{{$variavel1.' '.$nome}}
<br>
{{2 + 2}}
<br>
{{isset($test)?$test:"outro valor"}}
<br>
{{$test??"outro valor"}}
<br>
<h1>{{"School of Net"}}</h1>
</body>
</html>