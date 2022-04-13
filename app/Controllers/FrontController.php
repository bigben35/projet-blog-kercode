<?php

namespace ProjetBlogKercode\Controllers;

class FrontController
{
    

    function home()
    {
        // slider 
        $slider = new \ProjetBlogKercode\Models\UserModel();
        $slides = $slider->getSlides();

        // presentation Admin 
        $presentationAdmin = new \ProjetBlogKercode\Models\UserModel();
        $presentation = $presentationAdmin->getPresentation();
        
        //derniers articles
        $lastArticle = new \ProjetBlogKercode\Models\UserModel();
        $lastarticles = $lastArticle->getLastArticles();
        require "app/Views/front/home.php";
    }

    
    function blog()
    {
        // récupérer tous les articles 
        $getArticles = new \ProjetBlogKercode\Models\UserModel();
        $articles = $getArticles->allArticles();
        require "app/Views/front/blog.php";
    }

    function article($id)
    {
        // afficher un article 
        $afficherArticle = new \ProjetBlogKercode\Models\UserModel();
        $article = $afficherArticle->afficherArticle();
    
        // nombre de commentaire par article
        $allCommentaires = new \ProjetBlogKercode\Models\UserModel();
        $nb_commentaires = $allCommentaires->countCommentaires($id);

        //afficher les commentaires de l'article
        $afficherCommentaire = new \ProjetBlogKercode\Models\UserModel();
        $commentaires = $afficherCommentaire->getCommentaires();

        // créer commentaire article
        $creationCommentaire = new \ProjetBlogKercode\Models\UserModel();
        $commenterArticle = $creationCommentaire->commenter();

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
        $mails = new \ProjetBlogKercode\Models\ContactModel();
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
        $userManager = new \ProjetBlogKercode\Models\UserModel();
        
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $user = $userManager->createUser($pseudo, $mail, $password);

        require 'app/Views/front/connect.php';
    } else {
        header('Location: app/Views/front/errorLoading.php');
    }
    }

    // connexion à la page de connexion
    function connexionUser()
    {
        if($_SESSION['role'] === "0"){
        require 'app/Views/front/dashboardUser.php';

        }
        else{
        require 'app/Views/front/errorLoading';

        }

        // require 'app/Views/front/connect.php';
    }

    

    // connexion au tableau de bord après comparaison du mdp

    function connexion($mail, $password)
    // récupère le password
    {
        $userManager = new \ProjetBlogKercode\Models\UserModel();
        $connectUser = $userManager->recupPassword($mail, $password);

        $result = $connectUser->fetch();
        $isPasswordOk = password_verify($password, $result['password']);

        // Les sessions permettent de conserver des variables sur toutes les pages de votre site même lorsque la page PHP a fini d'être générée.  
        $_SESSION['mail'] = $result['mail']; // transformation des variables recupérées en session
        $_SESSION['password'] = $result['password'];
        $_SESSION['id'] = $result['id'];
        $_SESSION['pseudo'] = $result['pseudo'];
        $_SESSION['role'] = $result['role'];


        if($isPasswordOk && ($_SESSION['role'] === "0")){
            
            header("Location: index.php?action=dashboardUser");
        }
        elseif($isPasswordOk && ($_SESSION['role'] === "1")){
            header('Location: indexAdmin.php');
        }
        else {
            echo 'Un problème avec vos identifiants?';
            
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
        header('Location: index.php?action=connexion');
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
            $mail = $postMail->postMail($lastname, $firstname, $mail, $phone, $objet, $msg);
            require 'app/Views/front/confirmSendMail.php';
        } else {
            header('Location: app/Views/front/errorLoading.php');
        }
    }
}