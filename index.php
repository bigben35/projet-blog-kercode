<?php
//empty — Détermine si une variable est vide
//isset — Détermine si une variable est déclarée et est différente de null
session_start();

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try{
    $frontController = new \ProjetBlogKercode\Controllers\FrontController();//objet controler
    // $backController = new \ProjetBlogKercode\Controllers\AdminController();//objet controler, on instancie la class adminController (copie de la class adminController)
    //on le stocke dans une variable pour pouvoir l'utiliser

    if(isset($_GET['action'])){

        
        if($_GET['action'] == 'home') {
            $frontController->home();
        }
        
        elseif($_GET['action'] == 'blog'){
            $frontController->blog();
        }

        elseif($_GET['action'] == 'article'){
            $frontController->article();
        }

        elseif($_GET['action'] == 'temoignages'){
            $frontController->temoignage();
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
        elseif ($_GET['action'] == 'connexionUser'){
            $mail = htmlspecialchars($_POST['mail']);   //htmlspecialchars — Convertit les caractères spéciaux en entités HTML
            $password = $_POST['password'];
            if (!empty($mail) && !empty($password)){
                $frontController->connexion($mail, $password); //on passe les 2 paramètres
            } else {
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


        

       


        //----------- COTE ADMIN--------------------
        
        

        // elseif ($_GET['action'] == 'connexionUser'){
        //     $backController->connexionUser();
        // }

        // // dasboard 
        // elseif($_GET['action'] == 'dashboard'){
        //     $backController->dashboard();
        // }

        
    }else{
        $frontController->home();
    }

} catch(Exception $e){
    require 'app/Views/Front/home.php';
}