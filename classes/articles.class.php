<?php
class articles{
    public $id;
    public $titre;
    public $texte;
    public $date;
    public $publie;

    function getId(){
            return $this->id;
        }
        function setId($id){
            $this->id = $id;    
        }

        function getTitre(){
            return $this->titre;
        }

        function setTitre($titre){
            $this->titre = $titre;    
        }

        function getTexte(){
            return $this->texte;
        }
        function setTexte($texte){
            $this->texte = $texte;    
        }

        function getDate(){
            return $this->date;
        }

        function setDate($date){
            $this->date = $date;    
        }

        function getPublie(){
            return $this->publie;
        }

        function setPublie($publie){
            $this->publie = $publie;    
        }
   

public function hydrate($donnees){

        if (isset($donnees['id'])){
            $this->id = $donnees['id'];
        }
        else{
            $this->id = '';
        }
        if (isset($donnees['titre'])){
            $this->titre = $donnees['titre'];
        }
        else{
            $this->titre = '';
        }
        if (isset($donnees['texte'])){
            $this->texte = $donnees['texte'];
        }
        else{
            $this->texte = '';
        }
        if (isset($donnees['date'])){
            $this->date = $donnees['date'];
        }
        else{
            $this->date = '';
        }
        if (isset($donnees['publie'])){
            $this->publie = $donnees['publie'];
        }
        else{
            $this->publie = 0;
        }
    }
}