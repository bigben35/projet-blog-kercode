<?php

namespace ProjetBlogKercode\Models;
require_once "app/Models/ClassArticle.php";

class ArticleManager extends Manager{
    private $articles; //tableau d'articles

    public function ajoutArticle($article)
    {
        $this->articles[] = $article;
    }

    public function getArticles()
    {
        return $this->articles;
    }

    public function chargementArticles()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT * FROM article ORDER BY id DESC LIMIT 8");
        $req->execute();
        $mesArticles = $req->fetchAll(\PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesArticles as $article){
            $firstArticle = new Article($article['id'], $article['title'], $article['url_image'], $article['alt_image'], $article['accroche'], $article['content'], $article['created_at']);
            $this->ajoutArticle($firstArticle);
        }
    }

    public function getArticleById($id)
    {
       $bdd = $this->dbConnect();
       $req = $bdd->prepare("SELECT * FROM article WHERE id=?");
       $req->execute(array($id));
       return $req->fetch();
    }

    public function ajoutArticleBD($title, $accroche, $contenu, $imageAjoute, $alt_image)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("INSERT INTO article(title,url_image,alt_image,accroche,content) VALUES (:title,:url_image,:alt_image,:accroche,:content)");
    
        $req->bindValue(':title',$title,\PDO::PARAM_STR);
        $req->bindValue(':accroche',$accroche,\PDO::PARAM_STR);
        $req->bindValue(':content',$contenu,\PDO::PARAM_STR);
        $req->bindValue(':url_image',$imageAjoute,\PDO::PARAM_STR);
        $req->bindValue(':alt_image',$alt_image,\PDO::PARAM_STR);
       

        // $data = [
        //     ':title' => htmlspecialchars($title),
        //     ':accroche' => htmlspecialchars($accroche),
        //     ':content' => htmlspecialchars($content),
        //     ':url_image' => htmlspecialchars($imageAjoute),
        //     ':alt_image' => htmlspecialchars($alt_image)
        // ];
      
        $req->execute();
        // return $req;
        
        // if($req > 0){
        //     $article = new \ProjetBlogKercode\Models\Article($this->dbConnect()->lastInsertId(),$title, $accroche, $content, $imageAjoute, $alt_image,  $dateCreation);
        //     var_dump($article);
        //     $this->ajoutArticle($article);
        // }
        
    }


    public function suppressionArticleBD($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("DELETE FROM article WHERE id = ?");

        // $req->bindValue(":id",$id,\PDO::PARAM_INT);
        $req->execute(array($id));

        return $req;
    }


    public function modificationArticleBD($id, $title, $accroche, $contenu, $url_image, $alt_image)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("UPDATE article SET title = :title, accroche = :accroche, content = :content, url_image = :url_image, alt_image = :alt_image WHERE id = :id");

        $data = [
            ':title' => $title,
            ':accroche' => $accroche,
            ':content' => $contenu,
            ':url_image' => $url_image,
            ':alt_image' => $alt_image,
            ':id' => $id
        ];

        // $req->bindValue(':id',$id,\PDO::PARAM_INT);
        // $req->bindValue(':title',$title,\PDO::PARAM_STR);
        // $req->bindValue(':accroche',$accroche,\PDO::PARAM_STR);
        // $req->bindValue(':content',$contenu,\PDO::PARAM_STR);
        // $req->bindValue(':url_image',$url_image,\PDO::PARAM_STR);
        // $req->bindValue(':alt_image',$alt_image,\PDO::PARAM_STR);

        $req->execute($data);
        $req->closeCursor();

        // if($result > 0){
        //     $this->getArticleById($id)->setTitle($title);
        //     $this->getArticleById($id)->setAccroche($accroche);
        //     $this->getArticleById($id)->setContenu($contenu);
        //     $this->getArticleById($id)->setUrlImage($url_image);
        //     $this->getArticleById($id)->setAltImage($alt_image);
        // }
    }


    public function afficheCategory()
    {
        $bdd = $this->dbConnect();
        // $req = $bdd->prepare("SELECT id, name_Cat")
    }
}