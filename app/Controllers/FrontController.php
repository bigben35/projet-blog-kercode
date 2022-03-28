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
        require "app/Views/Front/home.php";
    }

    
    function blog()
    {
        require "app/Views/Front/blog.php";
    }

    function temoignage()
    {
        require "app/Views/Front/temoignages.php";
    }

    function meteo()
    {
        require "app/Views/Front/meteo.php";
    }

    function contact()
    {
        $mails = new \ProjetBlogKercode\Models\ContactModel();
        $allMails = $mails->getMails();

        require "app/Views/Front/contact.php";
    }

    function connect(){
        require "app/Views/Front/connect.php";
    }

    function mentionsLegales(){
        require "app/Views/Front/mentionsLegales.php";
    }


    //------------- mail formulaire de contact ------------

    function contactPost($lastname, $firstname, $mail, $phone, $objet, $msg)
    {
        $postMail = new \ProjetBlogKercode\Models\ContactModel();

        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $mail = $postMail->postMail($lastname, $firstname, $mail, $phone, $objet, $msg);
            require 'app/Views/Front/confirmSendMail.php';
        } else {
            header('Location: app/Views/Front/errorLoading.php');
        }
    }
}