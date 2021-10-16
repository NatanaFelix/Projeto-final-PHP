<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'livros';

if ($conexao = mysqli_connect($servidor,$usuario,$senha,$banco)) {
	// deu certo
	session_start();
}else{
	// deu errado
	die('não foi possivel acessar o banco de dados!' . $conexao->error);
}
?>