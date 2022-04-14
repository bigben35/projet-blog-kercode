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
        // var_dump($articles);die;
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
        $recupCategory = new \ProjetBlogKercode\Models\ArticleManager;
        $categories = $recupCategory->afficheCategory();
        require "app/Views/Admin/ajoutArticle.php";
    }

    //ajout article en BDD
    public function validerAjoutArticle()
    {
        $image = $_FILES['url_image'];
        $repertoire = "app/Public/images/";
        $imageAjoute = $this->ajoutImageArticle($image, $repertoire);
        $this->articleManager->ajoutArticleBD($_POST['title'], $_POST['accroche'], $_POST['content'], $imageAjoute, $_POST['alt_image']);
      
    
        header('Location: indexAdmin.php?action=listeArticle');
    
    }

    // supprimer un article
    public function supprimerArticle($id)
    {
        $dataArticle = $this->articleManager->getArticleById($id);
        unlink("app/Public/images/".$dataArticle['url_image']);
        $this->articleManager->suppressionArticleBD($id);

        header('Location: indexAdmin.php?action=listeArticle');
    }


    
    public function modifierArticle($id)
    {
        $modifArticle = $this->articleManager->getArticleById($id);
        $article = new \ProjetBlogKercode\Models\Article($modifArticle['id'], $modifArticle['title'], $modifArticle['url_image'], $modifArticle['alt_image'], $modifArticle['accroche'], $modifArticle['content'], $modifArticle['created_at']);
        
        require 'app/Views/Admin/modifierArticle.php';
    }


    //modifier un article
    public function validerModifArticle()
    {
        $imageActuelle = $this->articleManager->getArticleById($_POST['identifiant']);
        $image = $_FILES['url_image'];

        if($image['size'] > 0){
            unlink("app/Public/images/".$imageActuelle);
            $repertoire = "app/Public/images/";
            $imageAjoute = $this->ajoutImageArticle($image, $repertoire);
        } else {
            $imageAjoute = $imageActuelle;
        }
        $this->articleManager->modificationArticleBD($_POST['identifiant'],$_POST['title'],$_POST['accroche'],$_POST['content'],$imageAjoute,$_POST['alt_image']);

        header('Location: indexAdmin.php?action=listeArticle');
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
            $tailleMax = 15000000;
    
            if(in_array($extension, $extensionsAutorisees) && $size <= $tailleMax && $error == 0){
    
                $uniqueName = uniqid('', true);
        
                $imageName = $uniqueName. '.' .$extension;
                $imageAjoute = 'app/Public/images/' . $imageName;
                //mettre image dans dossier images du Blog avec nom unique
                move_uploaded_file($tmpName, $imageAjoute);
                return $imageAjoute;
            }
            else{
                echo "La taille de votre image est trop importante et/ou mauvaise extension de l'image";
            }
        }
    }
}

    

