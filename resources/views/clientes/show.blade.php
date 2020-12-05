<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informações Sobre o Cliente</title>
</head>
<body>

    <h3>Informações sobre o Cliente</h3>
    <p>ID: {{$cliente['id']}}</p>
    <p>Nome: {{$cliente['nome']}}</p>
    <p><a href="{{route("clientes.index")}}">Voltar</a></p>
</body>
</html>