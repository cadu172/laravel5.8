<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$titulo}}</title>
</head>
<body>

<h2>{{$titulo}}</h2>

@if ( (isset($clientes)) && (count($clientes)>0) )
    <ul>
    @foreach ($clientes as $item)
        <li>
            {{ $item['id'] }}&nbsp;-&nbsp;{{ $item['nome'] }}
            &nbsp;|&nbsp;
            <a href="{{route('clientes.edit',$item['id'])}}">Editar</a>
            &nbsp;|&nbsp;
            <a href="{{route('clientes.show',$item['id'])}}">Informações</a>
            <form action="{{route("clientes.destroy",$item["id"])}}}" method="POST">
                @csrf
                @method("delete")
                <button type="submit"
                    name="BtnExcluir">Excluir</button>

            </form>
        </li>
    @endforeach    
    </ul>
   
@else
    
    <h2>Não Existem Clientes Cadastrados</h2>

@endif

<hr />
<a href="{{route('clientes.create')}}">NOVO CLIENTE</a><br />
</body>
</html>