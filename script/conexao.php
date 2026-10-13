<?php
$servidor = "localhost";
$usuario_bd = "root"; // Padrão do XAMPP/WAMP
$senha_bd = "";       // Padrão do XAMPP/WAMP geralmente é vazio
$banco = "aula_php";

// Cria a conexão procedural com mysqli
$conexao = mysqli_connect($servidor, $usuario_bd, $senha_bd, $banco);

// Verifica se houve erro na conexão
if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
?>