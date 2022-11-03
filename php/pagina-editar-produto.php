<?php
  include 'verificar-usuario-logado.php';
  include 'menu.php';
  include 'conexao.php';

  $id = $_GET['id'];

  $pdo = Conexao::conectar();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = 'SELECT * FROM produto WHERE id=?;';
  $query = $pdo->prepare($sql);
  $query->execute(array($id));

  $dados = $query->fetch(PDO::FETCH_ASSOC);

  $descricao = $dados['descricao'];
  $estoque = $dados['estoque'];
  $preco = $dados['preco'];

  Conexao::desconectar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../css/pagina-editar-produto.css">

  <title>Editar Produto</title>
</head>
<body>
  
  <div class="container-fluid col-12">
    <div class="text-center col-12" style="background-color: orange;">
      <h3>Editar Produto</h3>
    </div>
  </div>
  <div class="container">
    <div class="row form-group">
      <form action="editar-produto.php" method="POST" id="formulario-produto" class="">

        <div class="row input-field">
          <div class="col-2">
            <label for="lblId">ID do produto</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $id;?>" readonly>
          </div>
          <div class="col-10">
            <label for="lblDescricao">Informe a descrição do produto: </label>
            <input type="text" class="form-control" id="txtDescricao" name="txtDescricao" value="<?php echo $descricao?>" required>
          </div>
        </div>
        <div class="row input-field">
          <div class="col-6">
            <label for="lblEstoque">Informe a quantidade disponível: </label>
            <input type="text" class="form-control" id="txtEstoque" name="txtEstoque" value="<?php echo $estoque?>" required>
          </div>
          <div class="col-6">
            <label for="lblPreco">Informe o preço unitário: </label>
            <div class="input-group mb-3">
              <span class="input-group-text">R$</span>
              <input type="text" class="form-control" id="txtPreco" name="txtPreco" value="<?php echo $preco?>" required>
            </div>
          </div>
        </div>
        
        <br>

        <div class="buttons input-field col-12">
          <button class="btn btn-success" type="submit" name="btnGravar">
             Salvar
          </button>

          <button class="btn btn-warning" type="reset" name="btnLimpar">
             Limpar
          </button>

          <button class="btn btn-danger" type="button" name="btnVoltar" onclick="JavaScript:location.href='pagina-produtos.php'">
             Voltar
          </button>
        </div>

      </form>
    </div>
  </div>

</body>

<!-- JavaScript Bundle with Popper -->
<script src="../js/bootstrap.bundle.min.js"></script>

</html>

<?php
  include 'footer.php'
?>