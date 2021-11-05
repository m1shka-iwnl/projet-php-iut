<?php
class utilisateurs{
    
    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $mdp;
    public $sid;

    function getId(){
        return $this->id;
    }
    function setId($id){
        $this->id = $id;    
    }
    function getnom(){
        return $this->nom;
    }

    function setnom($nom){
        $this->nom = $nom;    
    }
    function getprenom(){
        return $this->prenom;
    }
    function setprenom($prenom){
        $this->prenom = $prenom;    
    }
    function getemail(){
        return $this->email;
    }
    function setemail($email){
        $this->email = $email;    
    }
    function getmdp(){
        return $this->mdp;
    }
    function setmdp($mdp){
        $this->mdp = $mdp;    
    }
    function getsid(){
        return $this->sid;
    }
    function setsid($sid){
        $this->sid = $sid;    
    }

public function hydrate($donnees){

        if (isset($donnees['id'])){
            $this->id = $donnees['id'];
        }
        else{
            $this->id = '';
        }
        if (isset($donnees['nom'])){
            $this->nom = $donnees['nom'];
        }
        else{
            $this->nom = '';
        }
        if (isset($donnees['prenom'])){
            $this->prenom = $donnees['prenom'];
        }
        else{
            $this->prenom = '';
        }
        if (isset($donnees['email'])){
            $this->email = $donnees['email'];
        }
        else{
            $this->email = '';
        }
        if (isset($donnees['mdp'])){
            $this->mdp = $donnees['mdp'];
        }
        else{
            $this->mdp = '';
        }
      if (isset($donnees['sid'])){
        $this->sid = $donnees['sid'];
        }
    else{
        $this->sid = '';
        }
    }
}