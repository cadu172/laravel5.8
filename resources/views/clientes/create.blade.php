<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Inclusão de Novo Cliente</h2>
    <form action="{{route('clientes.store')}}" method="POST">
        <p>
            <label id="lblNome" for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="" style="width: 150px;" />
        </p>
        <p>
            <input type="submit"
                name="BtnGravar"
                id="BtnGravar"
                value="Gravar" />
        </p>
        @csrf
    </form>
</body>
</html>