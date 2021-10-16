<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
	
	<title>Index</title>
</head>
<body>
	<?php
	include_once 'conexao.php';

	$_SESSION['acao'] = $_POST['acao'] ?? '';
	$_SESSION['codigo'] = $_POST['codigo'] ?? '';

	 if(isset($_SERVER['usuario'])){
		header('location: ./login.php');
	 }else{

	 }

	if ($_SESSION['acao'] == 'Incluir Livros') {
		header("Location: ./incluir.php");
		exit();
	}

	if ($_SESSION['acao'] == 'Alterar Livros') {
		header("Location: ./alterar.php");
		exit();
	}

	if ($_SESSION['acao'] == 'Excluir Livros') {
		header("Location: ./excluir.php");
		exit();
	}

	if ($_SESSION['acao'] == 'Comprar Livros') {
		header("Location: ./comprar.php");
		exit();
	}

	if ($_SESSION['acao'] == 'Vender Livros') {
		header("Location: ./vender.php");
		exit();
	}
	if (!isset($_SESSION['ativo'])) {
		header('Location: ./login.php');
	}
	else
	{
		//echo 'fez login';
	}
	?>
	<?php
	include_once 'conexao.php';
	include_once 'navbar.php';	
	?>
	<h1 class="principal display-4 texte-center text-white">Menu Principal </h1>
	<p class="lead text-center text-white"> Este sistema faz o cadastro de livros e a sua manutenção. 
		Também permite registrar o entrada e saída de livros.</p>		
	<div class="container">
		<form action="index.php" method="POST" >
				<div class="form-group pt-4 row justify-content-center">
					<div class="col-sm-3">
						<div class="shadow  bg-white rounded">
						<input type="codigo" name="codigo" class="form-control" id="codigo1" aria-describedby="emailHelp" placeholder="Insira o código do livro " required>
					</div>
				</div>
			</div>
			<div class="class text-center pt-4">
				<div class="btn-group " role="group" aria-label="Toolbar com grupos de botões">
					<button  class="btn btn-dark" name="acao" value='Incluir Livros'>Incluir Livros</button>
					<button class="btn btn-dark" name="acao" value='Alterar Livros'>Alterar Livros</button>
					<button  class="btn btn-dark" name="acao" value='Excluir Livros'>Excluir Livros</button>
					<button  class="btn btn-dark" name="acao" value='Comprar Livros'>Comprar Livros</button>
					<button  class="btn btn-dark" name="acao" value='Vender Livros'>Vender Livros</button>
				</div>
			</div>	
		</form>
	</div>	
	<?php
	include_once 'footer.php';
	?>
</body>
</html>