<?php

    require_once('employe_class.php');

    $employe1 = new Employe('Lebeau', 'Christophe', '2003-07-24', 'Directeur', '25000', 'Direction');
    $employe2 = new Employe('Clad', 'Christine', '2003-07-27', 'Ressource humaine', '20000', 'Administration');
    $employe3 = new Employe('Clad', 'Brice', '2015-05-10', 'Technicien', '15000', 'Administration');
    $employe4 = new Employe('Sebastien', 'Marie', '2010-01-06', 'Secretaire', '10000', 'Comptabilité');
    $employe5 = new Employe('Maker', 'Paul', '2003-07-24', 'Commercial', '10000', 'Commercial');

    $listeentreprise = array ($employe1, $employe2, $employe3, $employe4, $employe5);


    print_r(rapportListeServiceEmploye($listeentreprise));
    
    // Fonctions
    function rapportNombreEmploye(array $liste){
        return print_r(count($liste));
    }

    function rapportListeEmploye(array $liste){
        sort($liste);
        usort($liste, [Employe::class, 'sortByNom']);
        return $liste;
    }

    function rapportListeServiceEmploye(array $liste){
        sort($liste);
        usort($liste, [Employe::class, 'sortByService']);
        return $liste;
    }

?>