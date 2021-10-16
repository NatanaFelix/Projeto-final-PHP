<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/incluir.css">
	<title>Incluir</title>
</head>
<body>
<?php 
include_once 'conexao.php';
include_once 'navbar.php';

$chave = $_SESSION['codigo'];
$acao = $_SESSION['acao'];

$titulo = $_POST=['titulo'] ?? '';
$editora = $_POST['editora'] ?? ''; 
$autor = $_POST['autor'] ?? '';
$publicacao = $_POST['publicacao'] ?? '';
$quantidade = $_POST['quantidade']?? '';

$sql = "SELECT * FROM tabelalivros WHERE codigo = '$chave'";
if($resultado = mysqli_query($conexao, $sql)){
	//echo "achoou!" . '<br>';
	if($campos = mysqli_fetch_array($resultado)){
	   // echo "achou de novo";
	}else{
		echo "<div class='alert alert-danger' role='alert'>Livro não encontrado!</div>" . '<br>';
		//echo $conexao->error . '<br>' . $sql;
	}
}else{
	///echo "não achou" . '<br>';
	echo $conexao->error;
}


if (!isset($campos['titulo'])) {
?>

	<form action="gravar.php" method="POST">
		<div class="container">
			<div class="card bg-light">
				<div class="card-body">
					<h4 class="display-4 text-center ">Incluir Livros</h4>
					<div class="form-group row justify-content-center">
						<label for="codigo2" class=" col-form-label">Código</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="inputTitulo" name="codigo" value="<?php echo $chave; ?>" disabled>
						</div>
						<label for="titulo2" class=" col-form-label">Título</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="inputTitulo" name="titulo" >
						</div>
					</div>
					<div class="form-group row justify-content-center">
						<label for="editora2" class=" col-form-label">Editora</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="inputTitulo" name="ediora" >
						</div>
						<label for="autor2" class=" col-form-label">Autor</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="inputTitulo" name="autor" >
						</div>
					</div>	
					<div class="form-group row justify-content-center">
						<label for="publicacao2" class=" col-form-label">Publicação</label>
						<div class="col-sm-3">
							<input type="date" class="form-control " id="inputTitulo" name="publicacao" >
						</div>
						<label for="quantidade2" class=" col-form-label">Quantidade</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="inputTitulo" name="quantidade" >
						</div>
					</div>
					<div class="class text-center">
						<button class="btn btn-secondary mb-2">Incluir</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<?php 
		}
		else{
			echo "<div class='alert alert-warning' role='alert'> Já existe este código " . $chave . "</div>";
		}
	?>
	<div class="class text-center pt-3">
		<a href="index.php" class="btn btn-secondary mb-2"><i class="fas fa-angle-left pr-2"></i>Voltar</button></a>
	</div>
	<?php
		include_once 'footer.php';
	?>
</body>
</html>