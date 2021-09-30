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
        <h1>Controle de Estoque</h1>
    </figure>

    <div id="conteudo_principal">
      <div class="container">
        <form class="form-inline">
          <div class = "text-center">
            <label class="visually-hidden form-label" for ="produto">Nome do produto</label>
            <input type="text" placeholder="Digite o nome do produto..." class="form-control" id="produto">

            <button type="submit" class="btn btn-primary">Pesquisar</button>
          </div>
          
          
        </form>
      </div>
      
      <div class="container">
        <table class="table table-striped table-hover" >
          <thead class="table-dark">
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Quant.</th>
              <th scope="col">Prox. Vencimento</th>
              <th scope="col">Descrição</th>
              <th scope="col">Atualizado</th>
            </tr>
            <tbody>

              <?php
                $pesquisa = mysqli_query($con, "SELECT id, nome_produto, descricao from tbl_produto");
                date_default_timezone_set("Brazil/East");
                $datahoje = date("Y-m-d");
                while($row = mysqli_fetch_array($pesquisa)) {

            
                  $quantidade = mysqli_fetch_array(mysqli_query($con, "SELECT ( (SELECT SUM(quantidade) from tbl_entrada WHERE id_produto = ".$row['id'].") - (SELECT sum(quantidade) from tbl_saida WHERE id_produto = ".$row['id'].") ) AS dif"));

                  $prox_vencimento = mysqli_fetch_array(mysqli_query($con, "SELECT MAX(validade) FROM tbl_entrada WHERE id_produto = ".$row['id'])); 
                  $atualizacao = mysqli_fetch_array(mysqli_query($con, "SELECT MAX(data) FROM ( SELECT data from tbl_entrada WHERE id_produto = ".$row['id']." UNION ALL SELECT data from tbl_saida WHERE id_produto = ".$row['id'].") AS t"));
                  if ($atualizacao['MAX(data)'] != null) {
                    $atualizacao['MAX(data)'] = date('d/m/Y', strtotime($atualizacao['MAX(data)']));
                  }
                  echo("<tr>
                          <td>".$row['nome_produto']."</td>
                          <td>".$quantidade['dif']."</td>
                          <td>".implode('/', array_reverse(explode('-', $prox_vencimento['MAX(validade)'])))."</td>
                          <td>".$row['descricao']."</td>
                          <td>".implode('/', array_reverse(explode('-', $atualizacao['MAX(data)'])))."</td>
                        </tr>");
                  //$row['VENCIMENTO_FINANCEIRO']= implode('/', array_reverse(explode('-', $row['VENCIMENTO_FINANCEIRO'])));     
                  }
              mysqli_close($con);
              ?>   

            </tbody>
          </thead>
        </table>
      </div>
    </div>
  </body>
</html>