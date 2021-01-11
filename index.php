<?php 
//Conexão

require_once 'db_connect.php';

//Sessao

session_start();


//botao enviar
if(isset($_POST['btn-entrar'])): 

   $erros = array();
   $login = mysqli_escape_string($connect, $_POST['login']);
   $senha = mysqli_escape_string($connect, $_POST['senha']);

   if(empty($login) or empty($senha)): 
    $erros[] = "<li> O campo login e senha precisa ser preenchido </li>";
   else:
           $sql = "SELECT login FROM usuarios WHERE login = '$login' AND senha = '$senha'";
           $senha = md5($senha);
           $resultado = mysqli_query($connect, $sql);

           if(mysqli_num_rows($resultado) > 0 ): 
            else : 
                $erros[] = "<li> Usuário inexistente </li>"; 
            endif;
   endif;
endif;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h1> Login: </h1>
<?php 

if(!empty($erros)): 
    foreach($erros as $erro): 
        echo $erro;
    endforeach;
endif;

?>

<hr>
<form action="<?php echo $_SELF['PHP_SELF']; ?>" method="POST">
    Login: <input type="text" name="login"> <br>
    Senha: <input type="password" name="senha"> <br>
    <button type="submit" name="btn-entrar"> Entrar </button>
</form>
</body>
</html>