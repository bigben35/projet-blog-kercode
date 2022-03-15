<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>

<body>

    <h1>Connexion Administrateur</h1>
    <div id="inscription">
        <div>
            <form action="indexAdmin.php?action=connexionAdmin" method="post">
                <table>
                    <tr>
                        <td><label for="nom">email :</label></td>
                        <td><input type="text" placeholder="votre email" name="mail" id="pseudo-admin" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Mot de passe :</label></td>
                        <td><input type="password" placeholder="votre mot de passe" name="password" id="password-admin" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><br><input type="submit"></td>
                    </tr>
                </table>
            </form>
            <a href="/">Retour à l'accueil</a>
        </div>
    </div>
</body>

</html>