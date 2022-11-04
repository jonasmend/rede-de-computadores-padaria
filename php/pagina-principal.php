<?php
  include "verificar-usuario-logado.php";
  include "menu.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/pagina-principal.css">

  <title>Pagina Principal</title>
</head>
<body>

  <div class="container-fluid col-12">
    <div class="text-center col-12" style="background-color: orange;">
      <h3>Padaria Bread</h3>
    </div>
  </div>

  <div class="features text-center">
    <div class="col-md-10 col-md-offset-1 titulo">
        <h4>Sistema de controle de estoque da Padaria Bread©.</h4>
    </div>
    <div class="container">
      <div class="row">
          <div class="col-xs-6 col-md-4">
              <h3>Clientes</h3>
              <p>Manipulação de clientes.</p>
              <a href="#">
                <button class="btn btn-outline-light">Acessar</button>
              </a>
          </div>
          <div class="col-xs-6 col-md-4">
              <h3>Produtos</h3>
              <p>Manipulação de produtos.</p>
              <a href="pagina-produtos.php">
                <button class="btn btn-outline-light">Acessar</button>
              </a>
          </div>
          
          <div class="col-xs-6 col-md-4">
              <h3>Vendas</h3>
              <p>Manipulação de Vendas
              </p>
              <a href="#">
                <button class="btn btn-outline-light">Acessar</button>
              </a>
          </div>
      </div>
    </div>
  </div>
  
  
</body>

<!-- JavaScript Bundle with Popper -->
<script src="../js/bootstrap.bundle.min.js"></script>

</html>

<?php
  include "footer.php";
?>