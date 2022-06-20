<?php

require_once('employe_class.php');
require_once('agency_class.php');
require_once('director_class.php');

$agency1 = new Agency('Agency A', 'Adresse A', '54897', 'City A', 'Ticket');
$agency2 = new Agency('Agency B', 'Adresse B', '58713', 'City B', 'Restaurant');

$director = new Director('Gustav', 'Carl', '2000-08-30', 'Directeur', 30000, 'Administration', 0, [0]);
$employe1 = new Employe('Lebeau', 'Christophe', '2003-07-24', 'Secretaire générale', 25000, 'Administration', $agency1, 0, [0]);
$employe2 = new Employe('Clad', 'Christine', '2003-07-27', 'Ressource humaine', 20000, 'Administration', $agency1, 2, [12, 16]);
$employe3 = new Employe('Clad', 'Brice', '2022-05-10', 'Technicien', 15000, 'Maintenance', $agency2, 1, [9]);
$employe4 = new Employe('Sebastien', 'Marie', '2010-01-06', 'Comptable', 10000, 'Comptabilité', $agency2, 3, [5, 13, 18]);
$employe5 = new Employe('Maker', 'Paul', '2003-07-24', 'Commercial', 10000, 'Commercial', $agency2, 0, [0]);

$listeentreprise = array($director, $employe1, $employe2, $employe3, $employe4, $employe5);

EnvoyePrime($director);


// Fonctions
function EnvoyePrime($e)
{
    if ($e->getFunction() == "Directeur") {
        $dateactuel = (new DateTime())->format('%m-%d');
        if ($dateactuel == (new DateTime())->format('11-30')) {
            print("La prime de " . $e->getFirstName() . " " . $e->getName() . " de " . $e->getDirectorPrime() . " € à bien était envoyé\n");
        } else {
            print("L'envoi n'a pas était effectué\n");
        }
    } else {
        $dateactuel = (new DateTime())->format('%m-$d');
        if ($dateactuel == (new DateTime())->format('11-30')) {
            print("La prime de " . $e->getFirstName() . " " . $e->getName() . " de " . $e->getPrime() . " € à bien était envoyé\n");
        } else {
            print("L'envoi n'a pas était effectué\n");
        }
    }
}

function rapportNombreEmploye(array $l)
{
    return print_r("Nombre d'employés: " . count($l) . "\n");
}

function rapportListeEmploye(array $l)
{
    usort($l, [Employe::class, 'sortByName']);
    foreach ($l as $employe) {
        echo $employe->getName() . " " . $employe->getFirstName() . "\n";
    }
}

function rapportListeServiceEmploye(array $l)
{
    usort($l, [Employe::class, 'sortByService']);
    foreach ($l as $employe) {
        echo $employe->getName() . " " . $employe->getFirstName() . " dans le service suivant: " . $employe->getService() . "\n";
    }
}

function rapportSalaireTotal(array $l)
{
    $massesalarial = [];
    foreach ($l as $employe) {
        array_push($massesalarial, $employe->getTotalSalary());
    }
    print_r("La masse salarial est de " . array_sum($massesalarial) . "€\n");
}

function getFoodServiceEmploye($e)
{
    print("L'employé est dans " . $e->getAgencyName() . "avec le service des restauration suivante: " . $e->getAgencyName()->getFoodService() . "\n");
}
