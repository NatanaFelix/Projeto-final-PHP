<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <title>Login</title>
</head>
<body>

    <?php
    include_once 'conexao.php';
    include_once 'navbar.php';

    if (isset($_POST['usuario'])) {
        if ($_POST['usuario'] != '') {
            $_SESSION['usuario'] = $_POST['usuario'];
		    $_SESSION['senha'] = $_POST['senha'];
            $chave = $_POST['usuario'];
		    $senha = $_POST['senha'];
            $sql = "SELECT * FROM usuarios WHERE usuario = '$chave'";
            if ($resultado = mysqli_query($conexao,$sql)) {
                $campos = mysqli_fetch_array($resultado);
                $usuario = $campos['usuario'] ?? '';
                if ($usuario != '') {
                    if ( $campos['senha'] == $senha ) {
                        echo '<br>senha igual';
                        $_SESSION['usuario'] = $campos['usuario'];
                        $_SESSION['senha'] = $campos['senha'];
                        $_SESSION['incluir'] = $campos['incluir'];
                        $_SESSION['alterar'] = $campos['alterar'];
                        $_SESSION['excluir'] = $campos['excluir'];
                        $_SESSION['consultar'] = $campos['consultar'];
                        $_SESSION['ativo'] = $campos['ativo'];
                        $_SESSION['comprar'] = $campos['comprar'];
                        $_SESSION['vender'] = $campos['vender'];
                        if ($campos['ativo'] == 's') {
                            header('Location: ./index.php');
                        }else{
                            echo "<div class='alert alert-danger' role='alert'>Usuario não ativo. </div>";
                            $_SESSION['usuario'] = '';
                            $_SESSION['senha'] = '';
                        }
                    } else{
                        echo "<div class='alert alert-danger'role='alert'>Senha diferente.</div>";
				}
			}else{
                echo "<div class='alert alert-danger'role='alert'>Nao existe este usuário.</div>" . $usuario;
			}
		}else{
            //echo '<br><br><br><br><br>Nao executou a query' . $conexao->error;
			die('error');
		}
	}else{
    }
}else{
    
}
?>

    <div class="container pt-5">
        <div class="card bg-light">
			<div class="card-body">
                <h1 class="display-4 text-center">Login</h1>
                <div class="row justify-content-center align-items-center">
                    <form action="login.php" method="POST" class="form-inline pt-3">
                        <div class="form-group mb-2">
                            <label for="staticEmail2" class="sr-only">Email</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="usuario">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="inputPassword2" class="sr-only">Senha</label>
                            <input type="password" class="form-control" id="inputPassword2" placeholder="Senha" name="senha">
                        </div>
                        <button type="submit" class="btn btn-secondary mb-2"><i class="fas fa-sign-in-alt"></i> Login</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
<?php
include_once 'footer.php';
?>      
</body>
</html>