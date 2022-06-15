<?php 
class Employe{
    // Propriétés de la classe
    private $name = '';
    private $firstname = '';
    private $employementday = '';
    private $function = '';
    private $salary = '';
    private $service = '';
    private $agency = '';

    // Méthodes de la classe
    // Constructeur de la classe
    public function __construct($name = '',$firstname = '',$dateembauche = '',$function = '',$salary = '',$service = '',$agency='')
    {
        $this -> name = $name;
        $this -> firstname = $firstname;
        $this -> dateembauche = $dateembauche;
        $this -> function = $function;
        $this -> salary = $salary;
        $this -> service = $service;
        $this -> agency = $agency;
    }

    // Getter des propriétés privée de la classe
    public function getName(){
        return $this -> name;
    }

    public function getFirstName(){
        return $this -> firstname;
    }

    public function getService(){
        return $this -> service;
    }

    public function getSalary(){
        return $this -> service;
    }

    public function getAgencyName(){
        return $this -> agency;
    }

    // Réccupèrer les années de travail d'un employé
    public function getAnneeTravailTotal(){
        $datetravail = new DateTime($this -> dateembauche);
        $dateactuel = new DateTime();
        $anneeembauche = $dateactuel -> diff($datetravail);
        return $anneeembauche -> format('Y');
    }

    // Obtenir la prime d'un employé
    public function getPrime(){
        $anneeembauche = $this -> getAnneeTravailTotal();
        $salaryemploye = $this -> salary;

        $primeannuel = $salaryemploye * (5 / 100);
        $primeanciennete = ($salaryemploye * (2 / 100)) * intval($anneeembauche);
        return $primetotal = $primeannuel + $primeanciennete;
    }

    // Compteur dans un tableau d'objet
    public function rapportNombreEmploye(array $l){
        print_r(count($l));
    }

    // Comparateur statique pour les propriétés nom et prénom
    public static function sortByName($l1, $l2){
        if (strtolower($l1->name) == strtolower($l2->name)) {
            return strtolower($l1->firstname) <=> strtolower($l2->firstname);
        } else {
            return strtolower($l1->name) <=> strtolower($l2->name);
        }
    }

    // Comparateur statique pour la propriété service
    public static function sortByService($l1, $l2){
        if (strtolower($l1->service) == strtolower($l2->service)){
            Employe::sortByName($l1, $l2);
        } else {
            return strtolower($l1->service) <=> strtolower($l2->service);
        }
    }

    // Calcul du salaire total
    public function getTotalSalary(){
        return $this -> salary + $this -> getPrime();
    }



    // public function rapportListeEmploye(array $liste){
    //     $columnname = array_column($liste, $this -> name);
    //     $columnfirstname = array_column($liste, $this -> firstname);
    //     array_multisort($columnname, SORT_ASC, $columnfirstname, SORT_ASC, $liste);
    //     foreach($liste as $object){
    //         print_r($object);
    //     }
    // }

    // public function rapportListeService(array $liste){
    //     $columnservice = array_column($liste, $this -> service);
    //     $columnname = array_column($liste, $this -> name);
    //     $columnfirstname = array_column($liste, $this -> firstname);
    //     array_multisort($columnservice, SORT_ASC, $columnname, SORT_ASC, $columnfirstname, SORT_ASC, $liste);
    //     foreach($liste as $object){
    //         print_r($object);
    //     }
    // }
}
