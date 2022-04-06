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

    
    
    // ----------------GESTION DES ARTICLES-----------------

    private $articleManager;

    public function __construct(){
        $this->articleManager = new \ProjetBlogKercode\Models\ArticleManager;
        $this->articleManager->chargementArticles();
    }
    // page liste articles 
    public function afficherListeArticle()
    {
        $articles = $this->articleManager->getArticles();
        require 'app/Views/Admin/listeArticle.php';
    }

    public function afficherArticle($id)
    {
        $articleData = $this->articleManager->getArticleById($id);
        $article = new \ProjetBlogKercode\Models\Article($articleData['id'], $articleData['title'], $articleData['url_image'], $articleData['alt_image'], $articleData['accroche'], $articleData['content'], $articleData['created_at']);
        // var_dump($article); die;
        require "app/Views/Admin/afficheArticle.php";
    }
    
    public function ajouteArticle()
    {
        require "app/Views/Admin/ajoutArticle.php";
    }
    
}