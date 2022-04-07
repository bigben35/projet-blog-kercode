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

    private $articleManager;//accessible attribut de l'Objet

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
    
    public function ajouterArticle()
    {
        require "app/Views/Admin/ajoutArticle.php";
    }

    
    public function validerAjoutArticle()
    {
        $image = $_FILES['url_image'];
        $repertoire = "app/Public/images/";
        $imageAjoute = $this->ajoutImageArticle($image, $repertoire);
        $this->articleManager->ajoutArticleBD($_POST['title'], $_POST['accroche'], $_POST['content'], $imageAjoute, $_POST['alt_image'], $_POST['created_at']);
      
        header('Location: app/Views/Admin/afficheArticle.php');
    
    }



    public function ajoutImageArticle()
    {
        if(isset($_FILES['url_image'])){
            $tmpName = $_FILES['url_image']['tmp_name'];
            $name = $_FILES['url_image']['name'];
            $size = $_FILES['url_image']['size'];
            $error = $_FILES['url_image']['error'];
            $type = $_FILES['url_image']['type'];
    
    
            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));
    
            // tableau des extensions autorisées
            $extensionsAutorisees = ['jpg', 'jpeg', 'png','gif', 'webp'];
            $tailleMax = 150000;
    
            if(in_array($extension, $extensionsAutorisees) && $size <= $tailleMax && $error == 0){
    
                $uniqueName = uniqid('', true);
        
                $imageName = $uniqueName. '.' .$extension;
                //mettre image dans dossier images du Blog avec nom unique
                move_uploaded_file($tmpName, 'app/Public/images/' . $imageName);
            }
            else{
                echo "La taille de votre image est trop importante et/ou mauvaise extension de l'image";
            }
        }
    }
}

    

