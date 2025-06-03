<?php
    // Informações e conexão do Database
    require_once("db.php");
    
    // Declaração das variáveis Globais
    require_once("globals.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moviestar</title>
</head>
<body>
    <header>
        <nav id="main-navbar" class="navbar navbar-expand-lg">
            <a href="<? $BASE_URL ?>" class="navbar-brand"><img src="<? $BASE_URL ?>img/logo.svg" alt="Moviestar"><span id="filmes-title">Filmes</span></a>
        </nav>
        <button></button>
        <input type="search" name="input" id="input">
    </header>
</body>
</html>