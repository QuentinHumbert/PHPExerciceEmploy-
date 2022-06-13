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

    public function getAnneeTravailTotal(){
        $datetravail = new DateTime($this -> dateembauche);
        $dateactuel = new DateTime();
        $anneeembauche = $dateactuel -> diff($datetravail);
        return $anneeembauche -> format('Y');
    }

    public function getSalairePlusPrime(){
        $anneeembauche = $this -> getAnneeTravailTotal();
        $dateactuel = new DateTime();
        $salaireemploye = $this -> salaire;

        $primeannuel = $salaireemploye * (5 / 100);
        $primeanciennete = ($salaireemploye * (2 / 100)) * $anneeembauche;
        if ($dateactuel == ''){
            print('Le salaire à bien était envoyé');
        }
    }
}

?>