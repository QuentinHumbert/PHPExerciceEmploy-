<?php 

class Employe{
    // Propriétés de la classe
    private $nom = '';
    private $prenom = '';
    private $dateembauche = '';
    private $fonction = '';
    private $salaire = '';
    private $service = '';

    // Méthode de la classe
    public function __construct($nom = '',$prenom = '',$dateembauche = '',$fonction = '',$salaire = '',$service = '')
    {
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> dateembauche = $dateembauche;
        $this -> fonction = $fonction;
        $this -> salaire = $salaire;
        $this -> service = $service;
    }

    public function getAnneeTravailTotal($dateembauche){
        $dateactuel = new DateTime();
        $anneeembauche = $dateactuel -> diff($dateembauche);
        return $anneeembauche -> format('Y');
    }

    public function getSalairePlusPrime($salaire){
        
    }
}

?>