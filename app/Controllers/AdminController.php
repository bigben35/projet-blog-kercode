<?php

namespace ProjetBlogKercode\Controllers;

require_once "app/Models/ArticleManager.php";

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

    
    
    // ----------------ARTICLES-----------------

    private $articleManager;

    public function __construct(){
        $this->articleManager = new \ProjetBlogKercode\Models\ArticleManager;
        $this->articleManager->chargementArticles();
    }
    // page liste articles 
    function afficherListeArticle()
    {
        $articles = $this->articleManager->getArticles();
        require 'app/Views/Admin/listeArticle.php';
    }
    
    
}