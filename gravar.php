<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
	<title>Gravar</title>
</head>
<body>

	<?php 
	include_once 'conexao.php';
	include_once 'navbar.php';

	$acao = $_SESSION['acao'];
	$chave = $_SESSION['codigo'];

	$titulo = $_POST['titulo'] ?? '';
	$editora = $_POST['editora'] ?? ''; 
	$autor = $_POST['autor'] ?? '';
	$publicacao = $_POST['publicacao'] ?? '';
	$quantidade = $_POST['quantidade'] ?? '';
	$entrada = $_POST['entrada'] ?? '';
	$entrada = $_POST['saida'] ?? '';

	if ($acao == 'Incluir Livros') {
	// fazer insert na tabela livro	
	$sql = "INSERT INTO tabelalivros (codigo,titulo,editora,autor,publicacao,quantidade) 
	VALUES ('$chave','$titulo','$editora','$autor','$publicacao','$quantidade')";
	//echo $sql;
	  if(mysqli_query($conexao, $sql)){
	  	echo "<div class='alert alert-success' role='alert'> Item incluido com sucesso! </div>";
	  	}else{
	 		echo "<div class='alert alert-danger' role='alert'> O item não pode ser incluido. <br> </div>";
	 		
	  	}
	}
	
	if ($acao == 'Alterar Livros') {
	// fazer update na tabela livro
	$sql = "UPDATE `tabelalivros` SET `codigo`='$chave',`titulo`='$titulo',`editora`='$editora',`autor`='$autor',`publicacao`='$publicacao',`quantidade`='$quantidade' 
	WHERE codigo = '$chave'";
		if (mysqli_query($conexao,$sql)) {
			echo "<div class='alert alert-success' role='alert'> Item alterado com sucesso! </div>";
		}else{
			echo "<div class='alert alert-danger' role='alert'> O item não pode ser alterado. <br> </div>";
			}
		}
	if ($acao == 'Excluir Livros') {
	// fazer delete na tabela livro
	$sql = "DELETE FROM `tabelalivros` WHERE codigo = '$chave'";
		if(mysqli_query($conexao, $sql)){
			echo "<div class='alert alert-success' role='alert'> Item excluido com sucesso! </div>";	
		}else{
			echo "<div class='alert alert-danger' role='alert'> O item não pode ser excluido. <br> </div>";
		}
	}
	
	if ($acao == 'Comprar Livros') {
	// adicionar da quantidade
	 $quantidade = $_SESSION['quantidade'];
	 $entrada = $_POST['entrada'];
		$sql = "UPDATE tabelalivros SET quantidade = ('$quantidade' + '$entrada') WHERE codigo = '$chave'";
		if(mysqli_query($conexao, $sql)){
		echo "<div class='alert alert-success' role='alert'> Entrada de item feita com sucesso! </div>";
		}else{
		echo "<div class='alert alert-danger' role='alert'> Entrada de item não pode ser feita </div>";
	}

	}
	if ($acao == 'Vender Livros') {
	// subitrair da quantidade
		$quantidade = $_SESSION['quantidade'];
		$saida = $_POST['saida'];
		$sql = "UPDATE tabelalivros SET quantidade = ('$quantidade' - '$saida') WHERE codigo = '$chave'";
		if(mysqli_query($conexao, $sql)){
			echo "<div class='alert alert-success' role='alert'> Saída de item feita com sucesso! </div>";
		}else{
			echo "<div class='alert alert-danger' role='alert'> Saída de item não pode ser feita </div>";
		}
	}

	?>

	<br>
	<br>

	<?php
	$conexao->close();
	?>

	<div class="class text-center pt-3">
		<a href="index.php" class="btn btn-secondary mb-2"><i class="fas fa-angle-left pr-2"></i>Voltar</button></a>
	</div>
	<?php
		include_once 'footer.php';
	?>
</body>
</html>


