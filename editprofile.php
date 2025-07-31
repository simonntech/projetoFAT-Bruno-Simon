<?php
require_once("templates/header.php");

?>

<div class="container-fluid" id="main-container">
    <h1>Editar Perfil</h1>
    <div class="row">
        <div class="col-md-4">
            <h1><?= $fullName ?></h1>
            <p class="page-description">Altere seus dados no formulário abaixo:</p>
        </div>
    </div>
    <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Digite seu nome" value="<?= $userData->name ?>">
        <input type="submit" value="Alterar" class="btn card-btn">
    </div>
    <div class="form-group">
              <label for="lastname">Sobrenome:</label>
              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Digite o seu nome" value="<?= $userData->lastname ?>">
            </div>
            <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="text" readonly class="form-control disabled" id="email" name="email" placeholder="Digite o seu nome" value="<?= $userData->email ?>">
            </div>
    <div class="col-md-4">
        <div id="profile-image-container" style="background-image: url('<?=$BASE_URL?>img/users/<?=$userData->image ?>')"></div>
        <div class="form-group">
            <label for="image">Foto:</label>
            <input type="file" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="bio">Sobre você:</label>
            <textarea class="form-control" name="bio" id="bio" rows="5" placeholder="Conte quem é você, o que faz e onde trabalha..."><?= $userData->bio ?></textarea>
        </div>
    </div>
    <div class="row" id="change-password-container">
        <div class="col-md4">
            <h2>Alterar Senha:</h2>
            <p class="page-description">Digite a nova senha e confirme, para alterar sua senha:</p>
            <form action="<?= $BASE_URL ?>user_process.php" method="post">
                <input type="hidden" name="type" value="changepassword">
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" name="password" id="password" placeholder="Digite sua nova senha" class="form-control">
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Confirmação da senha:</label>
                    <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirme sua nova senha">
                </div>
                <input type="submit" value="Alterar senha" class="btn card-btn">
            </form>
        </div>
    </div>
</div>

<?php
require_once("templates/footer.php");
?>