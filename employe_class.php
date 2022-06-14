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

    public function getPrime(){
        $anneeembauche = $this -> getAnneeTravailTotal();
        $salaireemploye = $this -> salaire;

        $primeannuel = $salaireemploye * (5 / 100);
        $primeanciennete = ($salaireemploye * (2 / 100)) * $anneeembauche;

        $dateactuel = (new DateTime()) -> format('m-d');
        if ($dateactuel == (new DateTime()) -> format('11-30')){
            print('La prime à bien était envoyé');
        } else {
            print('La prime n\'a pas était envoyé');
        }
    }

    public function rapportNombreEmploye(array $liste){
        print_r(count($liste));
    }

    public static function sortByNom($liste, $liste2){
        return strtolower($liste->nom) <=> strtolower($liste2->nom);

    }

    public static function sortByService($liste, $liste2){
        return strtolower($liste->service) <=> strtolower($liste2->service);
    }

    // public function rapportListeEmploye(array $liste){
    //     $columnnom = array_column($liste, $this -> nom);
    //     $columnprenom = array_column($liste, $this -> prenom);
    //     array_multisort($columnnom, SORT_ASC, $columnprenom, SORT_ASC, $liste);
    //     foreach($liste as $object){
    //         print_r($object);
    //     }
    // }

    // public function rapportListeService(array $liste){
    //     $columnservice = array_column($liste, $this -> service);
    //     $columnnom = array_column($liste, $this -> nom);
    //     $columnprenom = array_column($liste, $this -> prenom);
    //     array_multisort($columnservice, SORT_ASC, $columnnom, SORT_ASC, $columnprenom, SORT_ASC, $liste);
    //     foreach($liste as $object){
    //         print_r($object);
    //     }
    // }
}
