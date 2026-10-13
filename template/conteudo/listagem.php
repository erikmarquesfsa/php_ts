<?php
include "../script/conexao.php";
$busca = "SELECT * FROM produtos order by id asc";
$resultado = mysqli_query($conexao,$busca);
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Listagem de Protudos</h1>
    <p class="mb-4">Verifique os dados dos produto</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Veja os Produtos</h6>
        </div>
        <div class="card-body">
            <table class="display" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="text-align: center;">Nome do Produto</th>
                        <th style="text-align: center;">Tipo</th>
                        <th style="text-align: center;">Valor do Produto</th>
                        <th style="text-align: center;">Quantidade</th>
                        <th style="text-align: center;" colspan="2">&nbsp;</th>
                    </tr>
                </thead>
                <?php while($produtos=mysqli_fetch_assoc($resultado)): ?>
                <tr>
                    <td style="text-align: center;"><?= $produtos['nome'] ?></td>
                    <td style="text-align: center;"><?= $produtos['tipo'] ?></td>
                    <td style="text-align: center;"><?= $produtos['valor'] ?></td>
                    <td style="text-align: center;"><?= $produtos['quantidade'] ?></td>
                    <td style="text-align: center;"><a href="index.php?r=editar&id=<?= $produtos['id'] ?>" class="btn btn-warning">Editar</a></td>
                    <td style="text-align: center;"><a href="../script/deletar_id.php?id=<?= $produtos['id'] ?>" class="btn btn-danger">Deletar</a></td>
                </tr>
                <?php endwhile; ?>
                <tfoot>
                    <tr>
                        <th style="text-align: center;">Nome do Produto</th>
                        <th style="text-align: center;">Tipo</th>
                        <th style="text-align: center;">Valor do Produto</th>
                        <th style="text-align: center;">Quantidade</th>
                        <th style="text-align: center;" colspan="2">&nbsp;</th>
                    </tr>
                </tfoot>
                </thead>
            </table>
        </div>
    </div>
</div>