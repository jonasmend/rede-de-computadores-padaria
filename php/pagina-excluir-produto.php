<?php 
  include 'verificar-usuario-logado.php';
  include 'menu.php';
  $id = trim($_GET['id']);

  include 'conexao.php';
  $pdo = Conexao::conectar();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = 'SELECT * FROM produto WHERE id=?;';
  $query = $pdo->prepare($sql);
  $query->execute(array($id));

  $produto = $query->fetch(PDO::FETCH_ASSOC);
  Conexao::desconectar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/pagina-editar-clientes.css">

  <title>Exluir Produto</title>
</head>
<body>

  <div class="container-fluid col-12">
    <div class="text-center col-12" style="background-color: orange;">
      <h3>Exluir Produto</h3>
    </div>
  </div>

  <div class="container">
    <div class="row form-group">
      <form action="remover-produto.php" method="POST" id="remover-produto" class="">

        <div class="row">
          <label for="lblId"><h4><blockquote>ID: <?php echo $id ?></blockquote></h4></label>
          <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id;?>">
        </div>
        <div class="row">
          <label for="lblDescricao"><h4><blockquote>Descrição: <?php echo $produto['descricao'] ?></blockquote></h4></label>
        </div>
        <div class="row">
          <label for="lblEstoque"><h4><blockquote>Estoque: <?php echo $produto['estoque'] ?></blockquote></h4></label>
        </div>
        <div class="row">
          <label for="lblCPF"><h4><blockquote>Preço: R$<?php echo $produto['preco'] ?></blockquote></h4></label>
        </div>
        
        <br>

        <div class="buttons input-field col-12">
          <button class="btn btn-danger" type="button" name="btnVoltar" onclick="JavaScript:location.href='pagina-produtos.php'">
             Voltar
          </button>
          <button class="btn btn-success" type="submit" name="btnConfirmar">
             Confirmar
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