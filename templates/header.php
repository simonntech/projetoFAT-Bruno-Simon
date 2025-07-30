<?php
    // Informações e conexão do Database
    require_once "db.php";
    
    // Declaração das variáveis Globais
    require_once "globals.php";

    //Importando models
    require_once "models/Message.php";

    //Bloquear usuário
    require_once("dao/UserDAO.php");

    $userData = $userDao->verifyToken(false);

    $message = new Message($BASE_URL);

    $flassMessage = $message -> getMessage();

    if(!empty($flassMessage["msg"])) {
        //Limpar a mensagem
        $message->clearMessage();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moviestar</title>
    <link rel="short icon" href="img/logo.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.css">
    <!-- CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
    <header>
        <nav id="main-navbar" class="navbar navbar-expand-lg">
            <a href="<?= $BASE_URL ?>" class="navbar-brand">
                <img src="img/logo.png" alt="Moviestar Filmes" id="logo"><span id="filmes-title">Filmes</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <form action="<?= $BASE_URL ?>search.php" method="GET" id="search-form" class="form-inline my-2 my-lg-0">
                <input type="search" name="q" id="search" class="form-control mr-sm-2" placeholder="Buscar Filmes" aria-label="Search">
                <button class="btn my-2 my-sm-0" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav">
                    <?php if($userData): ?>
                        <li class="nav-item">
                            <a href="<?=$BASE_URL ?>newmovie.php" class="nav-link">
                                <i class="far fa-plus-square"></i> Incluir Filme
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=$BASE_URL ?>dashboard.php" class="nav-link">Meus Filmes</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=$BASE_URL ?>editprogile.php" class = nav-link bold>
                                <?=$userData->name ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=$BASE_URL ?>logout.php" class="nav-link">Sair</a>
                        </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a href="<?= $BASE_URL?>auth.php" class="nav-link">Entrar/Cadastrar</a>
                    </li>
                <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    <?php if(!empty($flassMessage["msg"])): ?>
        <div class="msg-container">
            <p class="msg<?=$flassMessage["type"] ?>"><?= $flassMessage["msg"]?></p>
        </div>
    <?php endif; ?>
</body>
</html>