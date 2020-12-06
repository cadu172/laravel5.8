<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informações Sobre o Cliente</title>
</head>
<body>

    <h3>Edição de Informações</h3>
    <form action="{{route("clientes.update",$cliente["id"])}}" method="POST">
        @csrf
        @method("PUT")
        <p>
            Nome:
            <input type="text"
                name="nome"
                value="{{$cliente["nome"]}}"
                style="width: 150px;"
                />
            <button type="submit"
                name="BtnGravar">Gravar Dados</button>
                
        </p>
    </form>
    <p><a href="{{route("clientes.index")}}">Voltar</a></p>
</body>
</html>