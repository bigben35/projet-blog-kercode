<?php

namespace ProjetBlogKercode\Controllers;

class FrontController extends Controller
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
        $articles = $lastArticle->getLastArticles();
        require "app/Views/front/home.php";
    }

    
    function blog()
    {
        require "app/Views/front/blog.php";
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
        $userManager = new \ProjetBlogKercode\Models\AdminModel();
        $user = $userManager->createUser($pseudo, $mail, $password);

        require 'app/Views/front/createUser.php';
    }

    // connexion à la page de connexion
    function connexionUser()
    {
        require 'app/Views/front/connect.php';
    }
    
    // connexion à la page connexion
    function createPageUser()
    {
        require 'app/Views/front/createUser.php';
    }


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