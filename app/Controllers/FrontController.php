<?php

namespace ProjetBlogKercode\Controllers;

class FrontController
{
    function home()
    {
        // presentation Admin 
        $homeManager = new \ProjetBlogKercode\Models\UserModel();
        $presentation = $homeManager->getPresentation();
        
        //derniers articles
        $lastarticles = $homeManager->getLastArticles();
        require "app/Views/front/home.php";
    }

    
    function blog($query, $currentPage)
    {

        // compter le nb d'article 
        $articlesManager = new \ProjetBlogKercode\Models\UserModel();
        $nbarticles = $articlesManager->countArticles();
        
        // nb article par page 
        $parPage = 8;
        
        // calcul nb pages total 
        $pages = ceil($nbarticles / $parPage);
        
        $premierArticle = ($currentPage * $parPage) - $parPage;
        $articles = $articlesManager->articlePage($premierArticle, $parPage);
        
        //barre de recherche
        $search = $articlesManager->rechercheArticle($query);
        
        require "app/Views/front/blog.php";
    }
    
    function article($id)
    {
        // afficher un article 
        $articleManager = new \ProjetBlogKercode\Models\UserModel();
        $article = $articleManager->afficherArticle();
            
            // nombre de commentaire par article
            $nb_commentaires = $articleManager->countCommentaires($id);
    
            //afficher les commentaires de l'article
            $commentaires = $articleManager->getCommentaires();
    
            // créer commentaire article
            $commenterArticle = $articleManager->commenter();
    
            require "app/Views/front/article.php";
        }
    


    function temoignage()
    {
        require "app/Views/front/temoignages.php";
    }

    function meteo()
    {
        require "app/Views/front/meteo.php";
    }

    function contact()
    {
        $mails = new \ProjetBlogKercode\Models\AdminModel();
        $allMails = $mails->getMails();

        require "app/Views/front/contact.php";
    }

    // aller a la page de connexion 
    function connect(){
        require "app/Views/front/connect.php";
    }

    //aller à la page de création d'un compte
    function createPageCreationCompte()
    {
        require 'app/views/front/createUser.php';
    }

    //création de l'utilisateur
    function createUser($pseudo, $mail, $password)
    {
        extract($_POST);
        $userManager = new \ProjetBlogKercode\Models\UserModel();
        $validation = true;
        $erreur = [];

        if (empty($pseudo) || empty($mail) || empty($mailconf) || empty($password) || empty($passwordconf)) {
            $validation = false;
            $erreur[] = "Tous les champs sont requis !";
        }

        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $validation = false;
            $erreur[] = "L'adresse email n'est pas valide !";
         }

        elseif($mailconf != $mail){
            $validation = false;
            $erreur[] = "L'email de confirmation n'est pas correcte !";
        }
    
        elseif($passwordconf != $password){
            $validation = false;
            $erreur[] = "Le mot de passe de confirmation n'est pas correcte !";
        }

        if ($userManager->existe_pseudo($pseudo)) {
            $validation = false;
            $erreur[] = "Ce pseudo est déjà utilisé !";
        }
    
        if ($userManager->existe_mail($mail)) {
            $validation = false;
            $erreur[] = "Cet email est déjà utilisé !";
        }
         
        if ($validation && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $user = $userManager->createUser($pseudo, $mail, $password);

        require 'app/Views/front/connect.php';

    } else {
        
        // throw new \Exception("Il y a une erreur de connexion !");
        require "app/Views/front/createUser.php";
        return $erreur;
    } 
}
    

    // connexion au tableau de bord après comparaison du mdp

    function connexion($mail, $password)
    // récupère le password
    {
        extract($_POST);
        $userManager = new \ProjetBlogKercode\Models\UserModel();
        $connectUser = $userManager->recupPassword($mail, $password);
        $result = $connectUser->fetch();
        $erreur = "Les identifiants sont erronés !";
        
        
        // Les sessions permettent de conserver des variables sur toutes les pages de votre site même lorsque la page PHP a fini d'être générée.  
        if(!empty($result)) {   
            $isPasswordOk = password_verify($password, $result['password']);
            if($isPasswordOk){
                $_SESSION['mail'] = $result['mail']; // transformation des variables recupérées en session
                $_SESSION['password'] = $result['password'];
                $_SESSION['id'] = $result['id'];
                $_SESSION['pseudo'] = $result['pseudo'];
                $_SESSION['role'] = $result['role'];
                if($result['role'] == 0){
                header("Location: dashboardUser");
                }
                else{
                    header('Location: dashboard');
            }
        } else {
            $erreur;
            require "app/Views/front/connect.php";
        }
        
    }else {
        $erreur = 'Le mail est inconnu';
        require "app/Views/front/connect.php";
    }
}
    
    
    function dashboardUser()
    {
        
        $afficherCommentaire = new \ProjetBlogKercode\Models\UserModel();
        $commentaires = $afficherCommentaire->commentaireUser();

        require 'app/Views/front/dashboardUser.php';

    }

    // deconnexion d'une session 
    function deconnexion(){
        unset($_SESSION['id']);
        session_destroy();
        header('Location: connexion');
    }

    
    // page mentions legales 
    function mentionsLegales(){
        require "app/Views/front/mentionsLegales.php";
    }


    //------------- mail formulaire de contact ------------

    function contactPost($lastname, $firstname, $mail, $phone, $objet, $msg)
    {
        $postMail = new \ProjetBlogKercode\Models\ContactModel();

        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $Mail = $postMail->postMail($lastname, $firstname, $mail, $phone, $objet, $msg);
            require 'app/Views/front/confirmSendMail.php';
        } else {
            header('Location: app/Views/front/errorLoading.php');
        }
    }
}