<?php 

    $title = "Page Contact";
    $description = "Page de contact";

ob_start(); ?>

<section class="bloc-contact-user">
    <div class="form-container">
        <h1>Contactez-nous</h1>
        <div class="main-bloc-form">
            <form action="contactPost" method="POST">
                <div class="bloc-form">
                    <label for="lastname">Nom : *</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Votre Nom" required />
                </div>
                <div class="bloc-form">
                    <label for="firstname">Prénom : *</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Votre Prénom" required />
                </div>
                <div class="bloc-form">
                    <label for="mail">e-mail : *</label>
                    <input type="email" id="mail" name="mail" placeholder="Votre e-mail" required />
                </div>
                <div class="bloc-form">
                    <label for="phone">Téléphone : *</label>
                    <input type="tel" id="phone" name="phone" placeholder="Votre Numéro de Téléphone" required />
                </div>
                <div class="bloc-form">
                    <label for="objet">Objet : *</label>
                    <input type="text" id="objet" name="objet" placeholder="objet de votre demande" required />
                </div>
                <div class="bloc-form msg-form">
                    <label for="msg">Message : *</label>
                    <textarea id="msg" name="msg" placeholder="Votre message" required></textarea>
                </div>
                <div>
                    <input type="checkbox" id="autorisation" required />
                    <label for="autorisation">&nbsp; En soumettant ce formulaire, j'autorise ce site à conserver mes
                        données personnelles. Aucune exploitation commerciale ne sera faite des données
                        conservées.</label>
                </div>

                <button class="send-contact" type="submit" name="btn-submit">Envoyer</button>
                <p class="asterix">* Champs obligatoires</p>
            </form>
        </div>
    </div>
</section>

<script src="app/Public/front/js/contact.min.js" defer></script>
<?php $content = ob_get_clean(); ?>
<?php require 'template/template.php';