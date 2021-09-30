<?php
include("conexao.php");
?>

<div class="container principal">
    <nav class="navbar navbar-expand-lg fixed-top nav-container">
    <a href="inicial.php" class="navbar-brand">
        <img id="logo" src="imgs/sti.png" alt="Logo STI FAO ODONTO"> </img>
        <img id="logo" src="imgs/fao_ufmg.png" alt="Logo STI FAO ODONTO"> </img> 
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links" aria-controls="navbar-links" 
    aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
        <div class="navbar-nav">
        <a href="inicial.php" class="nav-item nav-link" id="estoque-menu">ESTOQUE</a>
        <a href="entrada.php" class="nav-item nav-link" id="entrada-menu">ENTRADA</a>
        <a href="saida.php" class="nav-item nav-link" id="saida-menu">SAÍDA</a>
        <a href="relatorios.php" class="nav-item nav-link" id="relatorios-menu">RELATÓRIOS</a>
        </div>
    </div>

    </nav>
</div>