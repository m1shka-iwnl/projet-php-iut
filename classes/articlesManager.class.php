<?php

class articlesManager{
public $bdd;
public $_result;
public $_message;
public $_articles;
public $_getLastInsertId;

public function __construct(PDO $bdd){
    $this->setBdd($bdd);
}
function getBdd() {
    return $this->bdd;
}
function get_result(){
    return $this->_result;
}
function get_message(){
    return $this->_message;
}
function get_articles(){
    return $this->_articles;
}
function get_getLastInsertId(){
    return $this->_getLastInsertId;
}
function setBdd($bdd){
    $this->bdd = $bdd;    
}
function set_result($_result){
    $this->_result = $_result;    
}
function set_message($_message){
    $this->_message = $_message;    
}
function set_articles($_articles){
    $this->_articles = $_articles;    
}
function set_getLastInsertId($_getLastInsertId){
    $this->_getLastInsertId = $_getLastInsertId;    
}

public function get($id){ 
    $sql='SELECT * FROM articles WHERE id = :id';
    $req = $this->bdd->prepare($sql);

$req->bindValue(':id', $id, PDO::PARAM_INT);
$req->execute();
$donnees = $req->fetch(PDO::FETCH_ASSOC);
$articles = new articles();
$articles->hydrate($donnees);
return $articles;
}

public function getList(){
    $listArticles =[];
    $sql='SELECT * FROM articles';
    $req = $this->bdd->prepare($sql);
    $req->execute();

while ($donnees = $req->fetch(PDO::FETCH_ASSOC)){
    $articles = new articles();
    $articles->hydrate($donnees);
    $listArticles[] = $articles;
}
return $listArticles;
}

public function getList2(){
    $listArticles =[];
    $sql= 'SELECT id, ' 
    .'titre, '
    .'texte, '
    .'publie, '
    .'DATE_FORMAT(date, "%d/%m/%Y")as date '
    .'FROM articles ';
    $req = $this->bdd->prepare($sql);
    $req->execute();

while ($donnees = $req->fetch(PDO::FETCH_ASSOC)){
    $articles = new articles();
    $articles->hydrate($donnees);
    $listArticles[] = $articles;
    }
return $listArticles;
}

public function getList3($depart,$limit){
    $listArticles =[];
    $sql= 'SELECT id, ' 
    .'titre, '
    .'texte, '
    .'publie, '
    .'DATE_FORMAT(date, "%d/%m/%Y")as date '
    .'FROM articles '
    .'LIMIT :depart, :limit';
    $req = $this->bdd->prepare($sql);
    $req->bindValue(':depart', $depart, PDO::PARAM_INT);
    $req->bindValue(':limit', $limit, PDO::PARAM_INT);
    $req->execute();

while ($donnees = $req->fetch(PDO::FETCH_ASSOC)){
        $articles = new articles();
        $articles->hydrate($donnees);
        $listArticles[] = $articles;
    }
return $listArticles;

}

public function countArticlesPublie(){
    $sql = "SELECT COUNT(*) as total FROM articles";
    $req = $this->bdd->prepare($sql);
    $req->execute();
    $count = $req->fetch(PDO::FETCH_ASSOC);
    $total = $count['total'];
    return $total;
}

public function addArticles(articles $articles){
    $sql = "INSERT INTO articles "
    ."(titre, texte, date, publie)"
    ."VALUES (:titre, :texte , :date , :publie)";
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':titre', $articles->getTitre(), PDO::PARAM_STR);
        $req->bindValue(':texte', $articles->getTexte(), PDO::PARAM_STR);
        $req->bindValue(':date', $articles->getDate(), PDO::PARAM_STR);
        $req->bindValue(':publie', $articles->getPublie(), PDO::PARAM_INT);

        $req->execute();
        if ($req->errorCode() == 00000){
            $this->_result = true;
            $this->_getLastInsertId = $this->bdd->lastInsertId();
        }
        else {
            $this->_result = false;
        }
        return $this;
    }
}