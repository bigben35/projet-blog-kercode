<?php
$title = "Page de Connexion";
$description = "Page de Connexion";
ob_start();
?>

<section class="bloc-connect-user">
    <div class="form-container">
        <h1>Login</h1>
        <img src="app/Public/images/iconLogin.webp" alt="icône de l'utilisateur">

        <div class="main-bloc-form">
            <form action="connectUser" method="POST">

                <!-- bloc confirmation || erreur  -->
                <?php if (isset($erreur)): 
        if ($erreur) : ?>
                <div class="message-erreur"><?= $erreur ?></div>
                <?php 
        endif;
          endif;
    ?>

                <div class="bloc-form">
                    <label for="mail">Email</label>
                    <input type="email" id="mail" name="mail" placeholder="Votre e-mail" required>
                </div>
                <div class="bloc-form">
                    <label for="password">Mot de passe</label>
                    <input type="text" id="password" name="password" required>

                    <button class="btn-form" name="submit" type="submit">Se connecter</button>
                </div>
            </form>
            <a href="home" class="retourAccueil">Retour à l'accueil</a>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';