<?php

namespace ProjetBlogKercode\Controllers;

class AdminController
{
     // connexion à la page de connexion Admin
     function connexionUser()
    {
        if($_SESSION['role'] === "1"){
        require 'app/Views/Admin/dashboard.php';
 
        }
        else{
        require 'app/Views/front/errorLoading';
 
        }
    }


    // tableau de bord 
    function dashboard()
    {
        require 'app/Views/Admin/dashboard.php';
    }

    // page liste articles 
    function afficherListeArticle()
    {
        require 'app/Views/Admin/listeArticle.php';
    }


    
}