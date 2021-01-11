<?php 

//conexão com o banco

$servername = "localhost";
$username = "root";
$password= "";
$db_name= "sistemalogin";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
        echo "falha na conexão".mysli_connect_error();
endif; 
?>