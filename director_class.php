<?php
    require_once('employe_class.php');

    class Director extends Employe
    {
            // Obtenir la prime d'un employé
        public function getDirectorBonus()
        {
            $anneeembauche = $this->getTotalWorkingHours();
            $salaryemploye = $this->getSalary();

            $primeannuel = $salaryemploye * (7 / 100);
            $primeanciennete = ($salaryemploye * (3 / 100)) * intval($anneeembauche);
            return $primetotal = $primeannuel + $primeanciennete;
        }

    }
