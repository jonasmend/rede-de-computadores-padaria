<?php 
  include 'verificar-usuario-logado.php';
  include 'menu.php';

  if(isset($_GET['busca']))
    $busca = $_GET['busca'];
  else $busca = '';

  include 'conexao.php';
  $pdo = Conexao::conectar();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if($busca != '')
    $sql = 'SELECT * FROM produto WHERE descricao LIKE "%'.$busca.'%" ORDER BY descricao';
  else $sql = 'SELECT * FROM produto ORDER BY descricao';
  $listaProdutos = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/pagina-produtos.css">

  <title>Lista de Produtos</title>
</head>
<body>

  <div class="container-fluid">
    <div class="">
      <div class="">
      <h3 class="titulo text-center">
      Lista de Produtos
      </h3>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row"> 
      
      <form action="pagina-produtos.php" method="GET">
        <div class="row">
          <div class="input-group mb-3">
            <input type="text" placeholder="Informe a descrição do produto para filtrar os resultados" class="form-control" id="txtBusca" name="busca">
            <button class="btn btn-primary" type="submit" name="action"><i class="fas fa-search"></i> Buscar</button>
          </div>
        </div>
      </form>
         
      <div class="col-12">
        <table class="table table-striped">
        
          <tr class="">
            <th>ID</th>
            <th>DESCRIÇÃO</th>
            <th>ESTOQUE</th>
            <th>PREÇO</th>
            <th colspan="2">AÇÃO</th>
          </tr>
          <?php
            foreach($listaProdutos as $produto){
          ?>
          <tr>
            <td><?php echo $produto['id'];?></td>
            <td><?php echo $produto['descricao'];?></td>
            <td><?php echo $produto['estoque'];?></td>
            <td><?php echo $produto['preco'];?></td>
            <td><button class="btn btn-warning" onclick="JavaScript:location.href='pagina-editar-produto.php?id=' + <?php echo $produto['id'];?>">EDIT</i></button></td>
            <td><button class="btn btn-danger" onclick="JavaScript:location.href='pagina-excluir-produto.php?id=' + <?php echo $produto['id'];?>">DEL</button></td>
          </tr>
          <?php
            }
          ?>
        </table>

        <div class="button col-12">
          <button type="button" class="btn btn-success" onclick="Javascript:location.href='pagina-inserir-produto.php'"> Cadastrar</button>
        </div>
        
      </div>
    </div>
  </div>
  
</body>

<!-- JavaScript Bundle with Popper -->
<script src="../js/bootstrap.bundle.min.js"></script>

</html>

<?php
  include 'footer.php'
?>