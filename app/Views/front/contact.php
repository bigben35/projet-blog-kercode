<?php 

    $title = "Page Contact";
    $description = "";

ob_start(); ?>
<form action="index.php?action=contactPost" method="post">   
            <h2>Contactez-nous</h2>
            <div class="bloc-form">
                <label for="name">Nom : *</label>
                <input type="text" id="name" name="lastname" placeholder="Votre Nom" required>
            </div>
            <div class="bloc-form">
                <label for="firstname">Prénom : *</label>
                <input type="text" id="firstname" name="firstname" placeholder="Votre Prénom" required>
            </div>
            <div class="bloc-form">
                <label for="mail">e-mail: *</label>
                <input type="email" id="mail" name="mail" placeholder="Votre e-mail" required>
            </div>
            <div class="bloc-form">
                <label for="phone">Téléphone:</label>
                <input type="phone" id="phone" name="phone" placeholder="Votre Numéro de Téléphone" >
            </div>
            <div class="bloc-form">
                <label for="objet">Objet: *</label>
                <input type="objet" id="objet" name="objet" placeholder="objet de votre demande" required>
            </div>
            <div class="bloc-form msg-form">
                <label for="msg">Message :</label>
                <textarea id="msg" name="msg" placeholder="Votre message"></textarea>
            </div>
            <div class="bloc-form">
                    <input type="checkbox" id="autorisation" required>
                    <label for="autorisation">&nbsp; En soumettant ce formulaire, j'autorise ce site à conserver mes données personnelles. Aucune exploitation commerciale ne sera faite des données conservées.</label>
            </div>

            <button class="btn-form" type="submit" name="btn-submit">Envoyer</button>
        </form>

<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php'; ?>