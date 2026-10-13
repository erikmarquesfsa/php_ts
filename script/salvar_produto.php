<?php
require_once 'conexao.php';

// Variável para guardar o código JavaScript do SweetAlert
$script_alerta = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome_produto']);
    $valor = $_POST['valor_produto'];
    $tipo = $_POST['tipo_produto'];
    $qtde_produto = $_POST['qtde_produto'];

    if (!empty($nome) && is_numeric($valor) && is_numeric($qtde_produto)) {
        
        $sql = "INSERT INTO produtos (nome, tipo, valor, quantidade) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexao, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssdi", $nome, $tipo, $valor, $qtde_produto);

            if (mysqli_stmt_execute($stmt)) {
                // Prepara o alerta de SUCESSO e redireciona (recarrega a página) ao clicar em OK
                $script_alerta = "
                    Swal.fire({
                        title: 'Sucesso!',
                        text: 'Produto cadastrado com sucesso!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../template/index.php'; 
                        }
                    });
                ";
            } else {
                // Alerta de ERRO
                $script_alerta = "
                    Swal.fire({
                        title: 'Erro!',
                        text: 'Ocorreu um erro ao salvar o produto.',
                        icon: 'error',
                        confirmButtonText: 'Tentar novamente'
                    });
                ";
            }
            mysqli_stmt_close($stmt);
        } else {
            $script_alerta = "Swal.fire('Erro!', 'Falha ao preparar o banco de dados.', 'error');";
        }
    } else {
        $script_alerta = "Swal.fire('Atenção!', 'Preencha todos os campos corretamente.', 'warning');";
    }
}
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php if (!empty($script_alerta)): ?>
        <script>
            <?= $script_alerta ?>
        </script>
    <?php endif; ?>

</body>
</html>