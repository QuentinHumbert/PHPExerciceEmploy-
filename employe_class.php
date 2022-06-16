<?php
class Employe
{
    // Propriétés de la classe
    private $name = '';
    private $firstname = '';
    private $employementday = '';
    private $function = '';
    private $salary = 0;
    private $service = '';
    private $agency = '';
    private $child = 0;
    private $childage = [];

    // Méthodes de la classe
    // Constructeur de la classe
    public function __construct($name = '', $firstname = '', $employementday = '', $function = '', $salary = '', $service = '', $agency = '', $child = 0, $childage = [])
    {
        $this->name = $name;
        $this->firstname = $firstname;
        $this->employementday = $employementday;
        $this->function = $function;
        $this->salary = $salary;
        $this->service = $service;
        $this->agency = $agency;
        $this->child = $child;
        $this->childage = $childage;
    }

    // Getter des propriétés privée de la classe
    public function getName()
    {
        return $this->name;
    }

    public function getFirstName()
    {
        return $this->firstname;
    }

    public function getService()
    {
        return $this->service;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function getAgencyName()
    {
        return $this->agency;
    }

    // Réccupèrer les années de travail d'un employé
    public function getAnneeTravailTotal()
    {
        $datetravail = new DateTime($this->employementday);
        $dateactuel = new DateTime();
        $anneeembauche = $dateactuel->diff($datetravail);
        return $anneeembauche->format('%y');
    }

    // Obtenir la prime d'un employé
    public function getPrime()
    {
        $anneeembauche = $this->getAnneeTravailTotal();
        $salaryemploye = $this->salary;

        $primeannuel = $salaryemploye * (5 / 100);
        $primeanciennete = ($salaryemploye * (2 / 100)) * intval($anneeembauche);
        return $primetotal = $primeannuel + $primeanciennete;
    }

    // Comparateur statique pour les propriétés nom et prénom
    public static function sortByName($l1, $l2)
    {
        if (strtolower($l1->name) == strtolower($l2->name)) {
            return strtolower($l1->firstname) <=> strtolower($l2->firstname);
        } else {
            return strtolower($l1->name) <=> strtolower($l2->name);
        }
    }

    // Comparateur statique pour la propriété service
    public static function sortByService($l1, $l2)
    {
        if (strtolower($l1->service) == strtolower($l2->service)) {
            Employe::sortByName($l1, $l2);
        } else {
            return strtolower($l1->service) <=> strtolower($l2->service);
        }
    }

    // Calcul du salaire total
    public function getTotalSalary()
    {
        return $this->salary + $this->getPrime();
    }

    // Obtenir les chèques vacances
    public function getHolidayCheck()
    {
        if (intval($this->getAnneeTravailTotal()) >= 1) {
            return print_r($this->firstname . " " . $this->name . " peut obtenir des chèques vacances\n");
        } else {
            return print_r($this->firstname . " " . $this->name . " ne peut pas obtenir des chèques vacances\n");
        }
    }

    // Calcul des chèques de Noël
    public function getXmasCheck()
    {
        $totalxmascheck = 0;
        if ($this->child >= 1) {
            foreach($this->childage as $age){
                switch ($age) {
                    case $age >= 0 && $age <= 10:
                        print_r($this->firstname . " " . $this->name . " aura un chèques de Noël de 20€\n");
                        $totalxmascheck += 20;
                        break;
                    case $age >= 11 && $age <= 15:
                        print_r($this->firstname . " " . $this->name . " aura un chèques de Noël de 30€\n");
                        $totalxmascheck += 30;
                        break;
                    case $age >= 16 && $age <= 18:
                        print_r($this->firstname . " " . $this->name . " aura un chèques de Noël de 50€\n");
                        $totalxmascheck += 50;
                        break;
                    default:
                        print_r("Une erreur est survenu...\n");
                        break;
                }
            }
            print_r($this->firstname . " " . $this->name . " aura un total de " . $totalxmascheck . "€ en chèques de Noël\n");
        } else {
            print_r($this->firstname . " " . $this->name . " n'aura pas de chèques de Noël\n");
        }
    }
}
