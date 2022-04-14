<?php
//empty — Détermine si une variable est vide
//isset — Détermine si une variable est déclarée et est différente de null
session_start();

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try{
    $frontController = new \ProjetBlogKercode\Controllers\FrontController();//objet controler
    $backController = new \ProjetBlogKercode\Controllers\AdminController();//objet controler, on instancie la class adminController (copie de la class adminController)
    //on le stocke dans une variable pour pouvoir l'utiliser

    if(isset($_GET['action']) && !empty($_GET['action'])){
        
        
        if($_GET['action'] == 'home') {
            $frontController->home();
        }
        
        elseif($_GET['action'] == 'blog'){
            $frontController->blog();
        }

        elseif($_GET['action'] == 'article'){
            $frontController->article($_GET['id']);
        }

        elseif($_GET['action'] == 'meteo'){
            $frontController->meteo();
        }

        elseif($_GET['action'] == 'contact'){
            $frontController->contact();
        }

        elseif($_GET['action'] == 'createUser'){
            $frontController->createPageCreationCompte();

        }

        // creation d'un utilisateur 
        elseif($_GET['action'] == 'StoreUser'){
            $pseudo = $_POST['pseudo'];
            $mail = $_POST['mail'];
            $pass = $_POST['password'];
            $password = password_hash($pass, PASSWORD_DEFAULT); //crée une clé de hachage pour un password
            
            $frontController->createUser($pseudo, $mail, $password);
        }
        
        elseif($_GET['action'] == 'connexion'){
            $frontController->connect();
        }

        elseif($_GET['action'] == 'deconnexion'){
            $frontController->deconnexion();
        }

        // // connexion utilisateur 
        elseif ($_GET['action'] == 'connectUser'){
            $mail = htmlspecialchars($_POST['mail']);   //htmlspecialchars — Convertit les caractères spéciaux en entités HTML
            $password = $_POST['password'];
            if (!empty($mail) && !empty($password)){
                $frontController->connexion($mail, $password); //on passe les 2 paramètres
            } else {
                throw new Exception("Veuillez renseigner vos identifiants pour vous connecter à votre session");
            }

        }


        elseif($_GET['action'] == 'dashboardUser'){
            if(isset($_SESSION['id'])){

                $frontController->dashboardUser();
            }
            else {
                throw new Exception("Veuillez renseigner vos identifiants pour vous connecter à votre session");
            }
        }
        
        elseif($_GET['action'] == 'mentionsLegales'){
            $frontController->mentionsLegales();
        }

        // envois mail dans la bdd 
        elseif ($_GET['action'] == 'contactPost') {
            $lastname = htmlspecialchars($_POST['lastname']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $mail = htmlspecialchars($_POST['mail']);
            $phone = htmlspecialchars($_POST['phone']);
            $objet = htmlspecialchars($_POST['objet']);
            $msg = htmlspecialchars($_POST['msg']);
            if (!empty($lastname) && (!empty($firstname) && (!empty($mail) && (!empty($phone) && (!empty($objet) && (!empty($msg))))))) {
                $frontController->contactPost($lastname, $firstname, $mail, $phone, $objet, $msg);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis, A vous de jouer !!');
            }
        }

        elseif($_GET['action'] == 'error404'){
            throw new Exception("La page n'existe pas, error 404");
        }


        // PARTIE ADMIN 
         // dasboard Admin
         if($_GET['action'] == 'dashboard'){
            $backController->dashboard();
        }

        elseif($_GET['action'] == 'listeArticle'){
            $backController->afficherListeArticle();
        }

        elseif($_GET['action'] == 'afficheArticle'){
            $backController->afficherArticle($_GET['id']);
        }

        elseif($_GET['action'] == 'ajouterArticle'){
            $backController->ajouterArticle();
        }

        elseif($_GET['action'] == 'validerAjoutArticle'){
            $backController->validerAjoutArticle();
        }

        elseif($_GET['action'] == 'supprimerArticle'){
            $backController->supprimerArticle($_GET['id']);
        }

        elseif($_GET['action'] == 'modifierArticle'){
            $backController->modifierArticle($_GET['id']);
        }

        elseif($_GET['action'] == 'validerModifArticle'){
            $backController->validerModifArticle();
        }
        

    // } else {
    //     $backController->dashboard();
    // }


        
    }else{
        $frontController->home();
    }

} catch(Exception $e){
    $title = "Page d'erreur";
    $description = "Page de gestion d'erreurs";
    die('Erreur : ' . $e->getMessage());
    require 'app/Views/front/errorLoading.php';
}