<?php

class utilisateursManager{

public $bdd;
public $_result;
public $_message;
public $_utilisateurs;
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

function get_utilisateurs(){
    return $this->_utilisateurs;
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

function set_utilisateurs($_utilisateurs){
    $this->_utilisateurs = $_utilisateurs;    
}

function set_getLastInsertId($_getLastInsertId){
    $this->_getLastInsertId = $_getLastInsertId;    
}

function getbyemail($email){
    $sql = 'SELECT * FROM utilisateurs WHERE email = :email';
    $req = $this->bdd->prepare($sql);

    $req->bindValue(':email',$email,PDO::PARAM_STR);
    $req->execute();

    $donnees = $req->fetch(PDO::FETCH_ASSOC);
    $utilisateurs = new utilisateurs();
    $utilisateurs->hydrate($donnees);
    return $utilisateurs;
}

public function getbysid($sid) {
    // Prépare une requette SELECT avec une clause WHERE selon l'id.
    $sql = 'SELECT * FROM utilisateurs WHERE sid = :sid';
    $req = $this->bdd->prepare($sql);
    // Exécution de la requête avec attribution des valeurs aux marqueurs nominatifs.
    $req->bindValue(':sid', $sid, PDO::PARAM_STR);
    $req->execute();
    // On stock les données dans un tableau
    $donnees = $req->fetch(PDO::FETCH_ASSOC);
    
    $utilisateur = new utilisateurs();
    $utilisateur->hydrate($donnees);
    
    return $utilisateur;
}

public function updatebyemail(utilisateurs $utilisateurs){
    $sql='UPDATE utilisateurs SET sid = :sid WHERE email=:email';
    $req=$this->bdd->prepare($sql);
    $req->BindValue(':email', $utilisateurs->getemail(),PDO::PARAM_STR);
    $req->BindValue(':sid', $utilisateurs->getsid(),PDO::PARAM_STR);
    $req->execute();

    if($req->errorCode()==00000){
        $this->_result=true;
        
    }
    else{
        $this->_result = false;
    
    }

    return $this;
}

public function get($id){
    $sql='SELECT * FROM utilisateurs WHERE id = :id';
    $req = $this->bdd->prepare($sql);

$req->bindValue(':id', $id, PDO::PARAM_INT); 
$req->execute();

$donnees = $req->fetch(PDO::FETCH_ASSOC);
$utilisateurs = new utilisateurs();
$utilisateurs->hydrate($donnees);
////print r2($utilisateurs);
return $utilisateurs;

}


public function getList(){
    $listUtilisateurs =[]; 

    $sql='SELECT * FROM utilisateurs';
    $req = $this->bdd->prepare($sql);

$req->execute();

while ($donnees = $req->fetch(PDO::FETCH_ASSOC)){
    $utilisateurs = new utilisateurs();
    $utilisateurs->hydrate($donnees);
    $listUtilisateurs[] = $utilisateurs;
}
return $listUtilisateurs;
}

public function getList2(){
    $listUtilisateurs =[];

    $sql= 'SELECT id, ' 
    .'nom, '
    .'prenom, '
    .'email, '
    .'mdp,'
    .'sid'
    .'FROM utilisateurs ';
    
    
    $req = $this->bdd->prepare($sql);

$req->execute();


while ($donnees = $req->fetch(PDO::FETCH_ASSOC)){
    $utilisateurs = new utilisateurs();
    $utilisateurs->hydrate($donnees);
    $listUtilisateurs[] = $utilisateurs;
}
return $listUtilisateurs;
}

public function getList3($depart,$limit){
    $listUtilisateurs =[];

    $sql= 'SELECT id, ' 
    .'nom, '
    .'prenom, '
    .'email, '
    .'mdp,'
    .'sid'
    .'FROM utilisateurs '
    .'LIMIT :depart, :limit';
    
    $req = $this->bdd->prepare($sql);

    $req->bindValue(':depart', $depart, PDO::PARAM_INT);
    $req->bindValue(':limit', $limit, PDO::PARAM_INT);

$req->execute();

while ($donnees = $req->fetch(PDO::FETCH_ASSOC)){
    $utilisateurs = new utilisateurs();
    $utilisateurs->hydrate($donnees);
    $listUtilisateurs[] = $utilisateurs;
}
return $listUtilisateurs;
}

public function countUtilisateursPublie(){
    $sql = "SELECT COUNT(*) as total FROM utilisateurs";
    $req = $this->bdd->prepare($sql);
    $req->execute();
    $count = $req->fetch(PDO::FETCH_ASSOC);
    $total = $count['total'];
    return $total;
}

public function addUtilisateurs(utilisateurs $utilisateurs){
    $sql = "INSERT INTO utilisateurs "
    ."(nom, prenom, email, mdp)"
    ."VALUES (:nom, :prenom , :email , :mdp)";
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':nom', $utilisateurs->getnom(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $utilisateurs->getprenom(), PDO::PARAM_STR);
        $req->bindValue(':email', $utilisateurs->getemail(), PDO::PARAM_STR);
        $req->bindValue(':mdp', $utilisateurs->getmdp(), PDO::PARAM_STR);

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