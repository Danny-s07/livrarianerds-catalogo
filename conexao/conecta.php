<?php
$servidor ='localhost';
$usuario = 'root';
$senha = '';
$banco = 'livraria_db';

$con = mysqli_connect($servidor,$usuario,$senha,$banco);

if(mysqli_connect_errno()){
    die('Falha na conexão: ' . mysqli_connect_error());
}
?>