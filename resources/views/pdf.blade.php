<!DOCTYPE html>
<html lang="PT-BR">
<head>
	<title>Relatório - Movimentos do Estoque</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&display=swap');

        * {
            font-family: 'Baloo 2', cursive;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="row">
		<div class="col-md-12">
            <header class="text-center">
				<h2>RELATÓRIO - ESTOQUE</h2>
				<hr>
                <p><strong>RELATÓRIO EMITIDO EM: </strong>{{ date('H:i:s d/m/Y') }}</p>
                <hr>
            </header>

            <div class="row">
                
                <div class="col-md-12">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Marca</th>
                                <th>Nome</th>
                                <th>Tamanho</th>
                                <th>Gênero</th>
                                <th>SKU</th>
                                <th>Quantidade</th>
                                <th>Criado em</th>
                                <th>Última modificação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->tipo }}</td>
                                <td>{{ $product->marca }}</td>
                                <td>{{ $product->nome }}</td>
                                <td>{{ $product->tamanho }}</td>
                                <td>{{ $product->genero }}</td>
                                <td>{{ $product->sku }}</td>
                                <td>{{ $product->quantidade }}</td>
                                <td>{{ date('h:i:s d/m/Y', strtotime($product->created_at)) }}</td>
                                <td>{{ date('h:i:s d/m/Y', strtotime($product->updated_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            
            </div>
        </div>
    </div>
</body>
</html>