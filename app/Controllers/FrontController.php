<?php

namespace ProjetBlogKercode\Controllers;

class FrontController
{
    function home()
    {
        $slider = new \ProjetBlogKercode\Models\UserModel();
        $slides = $slider->getSlides();
        require "app/Views/front/home.php";
    }

    function contact()
    {
        $mails = new \ProjetBlogKercode\Models\ContactModel();
        $allMails = $mails->getMails();

        require "app/Views/front/contact.php";
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