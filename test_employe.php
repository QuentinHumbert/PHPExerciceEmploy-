<?php

    require_once('employe_class.php');
    require_once('agency_class.php');

    $employe1 = new Employe('Lebeau', 'Christophe', '2003-07-24', 'Secretaire générale', '25000', 'Administration', $agency1);
    $employe2 = new Employe('Clad', 'Christine', '2003-07-27', 'Ressource humaine', '20000', 'Administration', $agency1);
    $employe3 = new Employe('Clad', 'Brice', '2015-05-10', 'Technicien', '15000', 'Maintenance', $agency2);
    $employe4 = new Employe('Sebastien', 'Marie', '2010-01-06', 'Comptable', '10000', 'Comptabilité', $agency2);
    $employe5 = new Employe('Maker', 'Paul', '2003-07-24', 'Commercial', '10000', 'Commercial', $agency2);

    $agency1 = new Agency('Agency A', 'Adresse A', '54897', 'City A', 'Ticket');
    $agency2 = new Agency('Agency B', 'Adresse B', '58713', 'City B', 'Restaurant');

    $listeentreprise = array ($employe1, $employe2, $employe3, $employe4, $employe5);

    
    // Fonctions

    function EnvoyePrime($e){
        $dateactuel = (new DateTime()) -> format('11-30');
        if ($dateactuel == (new DateTime()) -> format('m-d')){
            print("La prime de ". $e->getFirstName() . " " . $e->getName() . " de " . $e -> getPrime() . " € à bien était envoyé\n");
        } else {
            print("L'envoi n'a pas était effectué\n");
        }
    }

    function rapportNombreEmploye(array $l){
        return print_r("Nombre d'employés: " . count($l) . "\n");
    }

    function rapportListeEmploye(array $l){
        usort($l, [Employe::class, 'sortByName']);
        foreach ($l as $employe){
            echo $employe->getName() . " " . $employe->getFirstName() . "\n";
        }
    }

    function rapportListeServiceEmploye(array $l){
        usort($l, [Employe::class, 'sortByService']);
        foreach ($l as $employe){
            echo $employe->getName() . " " . $employe->getFirstName() . " dans le service suivant: " . $employe->getService() . "\n";
        }
    }

    function rapportSalaireTotal(array $l){
        $massesalarial = [];
        foreach($l as $employe){
            array_push($massesalarial, $employe -> getTotalSalary());
        }
        print_r("La masse salarial est de " . array_sum($massesalarial) . "€\n");

    }

    function getFoodServiceEmploye($e){
        
    }

?>