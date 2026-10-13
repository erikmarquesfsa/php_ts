<?php
include "../script/conexao.php";
$id = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE id = ?";
$stmt_busca = mysqli_prepare($conexao,$sql);

if($stmt_busca){
    mysqli_stmt_bind_param($stmt_busca,"i",$id);
    mysqli_stmt_execute($stmt_busca);
    $resultado = mysqli_stmt_get_result($stmt_busca);

    $produto = mysqli_fetch_assoc($resultado);
}

?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Editar Produtos</h1>
    <p class="mb-4">Edite seus Produtos</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edite os Produtos</h6>
        </div>
        <div class="card-body">
            <form method="post" action="../script/salvar_produto.php">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nome do produto</label>
                        <input type="text" class="form-control" value="<?= $produto['nome']; ?>" required name="nome_produto">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Valor do Produto</label>
                        <input type="text" required class="form-control" value = "<?= $produto['valor']; ?>" name="valor_produto">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Tipo do Produto</label>
                    <input type="text" class="form-control" value = "<?= $produto['tipo']; ?>" name="tipo_produto">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Quantidade</label>
                    <input type="number" class="form-control" value = "<?= $produto['quantidade']; ?>" name="qtde_produto">
                </div>                
                <button type="submit" class="btn btn-primary">Alterar Produto</button>
            </form>
        </div>
    </div>
</div>