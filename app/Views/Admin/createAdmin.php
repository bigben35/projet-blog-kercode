<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>

<body>

    <h1>Administrateur</h1>
    <div id="inscription">
        <div>
            <form action="createAdmin" method="POST">
                <table>
                <tr>
                        <td><label for="name">Prénom</label></td>
                        <td><input type="text" placeholder="Prénom" name="firstname" id="name" required></td>
                    </tr>
                    <tr>
                        <td><label for="nom">email :</label></td>
                        <td><input type="text" placeholder="votre email" name="mail" id="pseudo" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Mot de passe :</label></td>
                        <td><input type="password" placeholder="votre mot de passe" name="password" id="password" required></td>
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