<?php

namespace ProjetBlogKercode\Controllers;

class AdminController
{
    // // connexion au tableau de bord après comparaison du mdp

    // function connexion($mail, $password)
    // // récupère le password
    // {
    //     $userManager = new \ProjetBlogKercode\Models\UserModel();
    //     $connectUser = $userManager->recupPassword($mail, $password);

    //     $result = $connectUser->fetch();
    //     $isPasswordOk = password_verify($password, $result['password']);

    //     // Les sessions permettent de conserver des variables sur toutes les pages de votre site même lorsque la page PHP a fini d'être générée.  
    //     $_SESSION['mail'] = $result['mail']; // transformation des variables recupérées en session
    //     $_SESSION['password'] = $result['password'];
    //     $_SESSION['id'] = $result['id'];
    //     $_SESSION['pseudo'] = $result['pseudo'];
    //     $_SESSION['role'] = $result['role'];



    //     if ($isPasswordOk && ($_SESSION['role'] === "1")) {

    //         require 'app/Views/Admin/dashboard.php';
    //     }
        
    //     else {
    //         echo 'Un problème avec vos identifiants?';
            
    //     }


    // }

     // connexion à la page de connexion
     function connexionUser()
     {
         if($_SESSION['role'] === "1"){
         require 'app/Views/Admin/dashboard.php';
 
         }
         else{
         require 'app/Views/front/errorLoading';
 
         }
 
         // require 'app/Views/front/connect.php';
     }


    // tableau de bord 
    function dashboard()
    {
        require 'app/Views/Admin/dashboard.php';
    }
}