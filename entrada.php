<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet">

    <script src="javascript/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
      function Oculta(oculta){
        var estado = oculta.value;
        var x = document.getElementsByClassName('material_novo');
        if(estado != 'Novo') {
          $(x).attr('style','display:none !important;');
        }
        else{    
          for(i = 0; i < x.length; i++){
            $(x).attr('style','display:inline-block !important;');
          }
        }
      }
    </script>

    <title>Controle de Estoque</title>
  </head>
  <body>
    <?php
      include ("cabecalho.php");
    ?>

    <figure class="text-center">
        <h1>Acrescentar novo lote</h1>
    </figure>

    <div id="conteudo_principal">

      <div class="container">
        <form class="form-inline">
  
          <div class ="form-group">
              <label for="SeletorMaterial">Selecionar material</label>
              <select class="form-control" id="SeletorMaterial" onchange="Oculta(this)">
                <option value='Novo'>Novo</option>
                <?php
                  $pesquisa = mysqli_query($con, "SELECT id, nome_produto from tbl_produto");
                  while($row = mysqli_fetch_array($pesquisa)) {
                    echo ("<option value='".$row['id']."'>".$row['nome_produto']."</option>");
                  }
                ?>      
              </select>
          </div>
          <br><br>

          <div id="material_novo" class="material_novo">
            <div class ="form-group">
                <label class="form-label" for ="material">Nome</label>
                <input type="text" placeholder="Digite o nome..." class="form-control" id="material">
            </div>

            <div class="form-group">
                <label for="data_validade">Descrição</label>
                <textarea class="form-control" id="data_validade"></textarea>
            </div>
          </div>

          <br><br>

          <div class="form-group">
              <label for="origem">Origem</label>
              <input type="text" class="form-control" id="origem">
          </div>

          <div class="form-group">
              <label for="quantidade">Quantidade</label>
              <input type="number" class="form-control" id="quantidade">
          </div>

          <div class="form-group">
              <label for="data_validade">Validade</label>
              <input type="date" class="form-control" id="data_validade">
          </div> 
          
          <div class="form-group">
              <button type="submit" class="btn btn-primary">Cadastrar</button>
          </div>
          
        </form>
      </div>
    </div>
  </body>
</html>