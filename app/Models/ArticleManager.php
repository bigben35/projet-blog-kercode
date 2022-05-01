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

    // nombre article 
    public function countArticle()
    {
        {
            $bdd = $this->dbConnect();
            $req = $bdd->prepare('SELECT COUNT(id) FROM article WHERE id');
            $req->execute(array());
            return $req;
        }
    }

    public function chargementArticles()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT * FROM article ORDER BY id DESC");
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
       
        $req->execute();
    }


    public function suppressionArticleBD($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("DELETE FROM article WHERE id = ?");

        $req->execute(array($id));

        return $req;
        if($req > 0){
            $article = $this->getArticleById($id);
            unset($article);
        }
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

        $req->execute($data);
        $req->closeCursor();

    }


    public function afficheCategory()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT id, name_Cat FROM category");
        $req->execute();

        return $req->fetchAll();
        
    }
}