<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Cadastro de Protudos</h1>
    <p class="mb-4">Informe os dados do produto</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cadastre o produto</h6>
        </div>
        <div class="card-body">
            <form method="post" action="../script/salvar_produto.php">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nome do produto</label>
                        <input type="text" class="form-control" required name="nome_produto">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Valor do Produto</label>
                        <input type="text" required class="form-control" name="valor_produto">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Tipo do Produto</label>
                    <input type="text" class="form-control" name="tipo_produto">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Quantidade</label>
                    <input type="number" class="form-control" name="qtde_produto">
                </div>                
                <button type="submit" class="btn btn-primary">Salvar Produto</button>
            </form>
        </div>
    </div>

</div>