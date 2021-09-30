<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet">
    <title>Controle de Estoque</title>
  </head>
  <body>
    <?php
      include ("cabecalho.php");
    ?>

    <figure class="text-center">
        <h1>Mover/retirar material</h1>
    </figure>

    <div id="conteudo_principal">
      <div class="container">
        <form class="form-inline">

          <div class ="form-group">
              <label for="SeletorMaterial">Selecionar material</label>
              <select class="form-control" id="SeletorMaterial">
                <option value='Novo'>Novo</option>
                  <?php
                    $pesquisa = mysqli_query($con, "SELECT id, nome_produto from tbl_produto");
                    while($row = mysqli_fetch_array($pesquisa)) {
                      echo ("<option value='".$row['id']."'>".$row['nome_produto']."</option>");
                    }
                  ?>
                </select>
              </select>
          </div>

          <div class="form-group">
              <label for="quantidade">Quantidade</label>
              <input type="number" class="form-control" id="quantidade">
          </div>

          <div class="form-group">
              <label for="destino">Destino</label>
              <input type="text" class="form-control" id="destino">
          </div>
          
          <div class="form-group">
              <button type="submit" class="btn btn-primary">Cadastrar</button>
          </div>
          
        </form>
      </div>
     </div>
  </body>
</html>