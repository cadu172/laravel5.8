<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<a href="{{route('clientes.create')}}">NOVO CLIENTE</a><br />

<ul>
@foreach ($clientes as $item)
    <li>{{ $item['nome'] }}&nbsp;|&nbsp;<a href="{{route('clientes.edit',$item['id'])}}">Editar</a></li>
@endforeach    
</ul>
</body>
</html>