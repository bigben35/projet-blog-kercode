<?php
//empty — Détermine si une variable est vide
//isset — Détermine si une variable est déclarée et est différente de null
session_start();

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// GESTION DES ERREURS 
// function errorHandler($errno, $errstr) {
//     throw new Exception($errstr, $errno);
//   }
//   set_error_handler('errorHandler');
  
function eCatcher($e) {
    if($_ENV["APP_ENV"] == "development") {
        $whoops = new \Whoops\Run;
        $whoops->allowQuit(false);
        $whoops->writeToOutput(false);
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $html = $whoops->handleException($e);
        require "app/Views/front/errorCatch.php";
    //  var_dump($e);die;   //a commenter en production
    }
  }


try{
    $frontController = new \ProjetBlogKercode\Controllers\FrontController();//objet controler
    $backController = new \ProjetBlogKercode\Controllers\AdminController();//objet controler, on instancie la class adminController (copie de la class adminController)
    //on le stocke dans une variable pour pouvoir l'utiliser

    if(isset($_GET['action']) && !empty($_GET['action'])){
        
        
        if($_GET['action'] == 'home') {
            $frontController->home();
        }

        
        elseif($_GET['action'] == 'blog'){
            $query = $_GET['query'] ?? ""; //var_dump($_GET);die;
            $frontController->blog($query);
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
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mail = htmlspecialchars($_POST['mail']);
            $pass = htmlspecialchars($_POST['password']);
            $password = password_hash($pass, PASSWORD_DEFAULT); //crée une clé de hachage pour un password
            
            $erreur = $frontController->createUser($pseudo, $mail, $password);
            
        }
        

        // aller page connect.php 
        elseif($_GET['action'] == 'connexion'){
            $frontController->connect();
        }


        // aller page deconnexion 
        elseif($_GET['action'] == 'deconnexion'){
            $frontController->deconnexion();
        }

        // // connexion utilisateur 
        elseif ($_GET['action'] == 'connectUser'){
       
            $mail = htmlspecialchars($_POST['mail']);
            $password = $_POST['password'];
            if (!empty($mail) && !empty($password)){
               
                $frontController->connexion($mail, $password); //on passe les 2 paramètres
            } else {
                throw new Exception("Veuillez renseigner vos identifiants pour vous connecter à votre session");
            }
                
            }

    


        elseif($_GET['action'] == 'dashboardUser'){
            if(isset($_SESSION['id']) && (isset($_SESSION['role']) && ($_SESSION['role'] == "0"))){
                
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





        // --------------------PARTIE ADMIN -----------------------

         // dasboard Admin
         elseif($_GET['action'] == 'dashboard'){
            if(isset($_SESSION['id']) && (isset($_SESSION['role']) && ($_SESSION['role'] == "1"))){

                $backController->dashboard();
            }
            else {
                throw new Exception("Veuillez renseigner vos identifiants pour vous connecter à votre session");
            }
        }


        // ---------------UTILISATEURS --------------
        // voir liste membre
        elseif($_GET['action'] == 'listeMembre'){
            $backController->afficherListeMembre();
        }

        // bannir un membre 
        elseif($_GET['action'] == 'bannirMembre'){
            $backController->bannirMembre($_GET['id']);
        }

        //voir un membre
        elseif($_GET['action'] == 'montrerMembre'){
            $backController->montrerMembre($_GET['id']);
        }



        // ---------------ARTICLES -----------------

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


        // ----------------COMMENTAIRES--------------

        // voir liste commentaires 
        elseif($_GET['action'] == 'listeCommentaire'){
            $backController->afficherListeCommentaire();
        }

        // supprimer un commentaire 
        elseif($_GET['action'] == 'supprimerComment'){
            $backController->supprimerComment($_GET['id']);
        }

         //voir un commentaire
        elseif($_GET['action'] == 'montrerComment'){
            $backController->montrerComment($_GET['id']);
        }




        // -----------------MAILS ---------------------
        //voir la liste des mails
        elseif($_GET['action'] == 'listeMail'){
            $backController->afficherListeMail();
        }

        //supprimer un mail de la page listeMail
        elseif($_GET['action'] == 'supprimerMail'){
            $backController->supprimerMail($_GET['id']);
        }

        //voir un mail
        elseif($_GET['action'] == 'montrerMail'){
            $backController->montrerMail($_GET['id']);
        }

        else {
            throw new Exception("La page n'existe pas", 404);
        }
    
    

        
}else{
    // throw new Exception("Mauvais formattage d'url", 404);
    
        $frontController->home();
    
}

} catch(Exception $e){
    // $title = "Page d'erreur";
    // $description = "Page de gestion d'erreurs";
    eCatcher($e);
    if($e->getCode() === 404){
        require "app/Views/front/errorLoading.php";
  } else {
    require "app/Views/front/oups.php";
  }
} catch(Error $e) {
  eCatcher($e);
  require "app/Views/front/oups.php";
} 