<?php
require('Controller/Controller.php');



if (isset($_GET['action'])) {
    if ($_GET['action'] == 'login') {
        login();
    }
    if ($_GET['action'] == 'getPatient') {
        home();
    }
    if ($_GET['action'] == 'getRdv') {
        afficherRdv();
    }
    if ($_GET['action'] == 'afficherForm') {
        afficherNewRdv();
    }
    if ($_GET['action'] == 'logout') {
        logout();
    }
    if ($_GET['action'] == 'ajouterRdv') {
        ajouterRdv();
    }
    if ($_GET['action'] == 'supperimer') {
        supperimerRdv($_GET['id']);
    }
    if ($_GET['action'] == 'modifier') {
        modifierRdv($_GET['id']);
        
    }
    if ($_GET['action'] == 'showRdv') {
       afficherRdvPatient($_GET['id']);
        
    }
    if ($_GET['action'] == 'ajouterRdvPatient') {
        ajouterRdvPatient($_GET['id']);
         
    }
    if ($_GET['action'] == 'afficherAddRdvPatient') {
        afficherAddRdvPatient();
         
    }
    if ($_GET['action'] == 'filtrerDate') {
        afficherRdvFiltrer();
         
    }
    if ($_GET['action'] == 'getRdvToday') {
        afficherRdvToday();
         
    }
    if ($_GET['action'] == 'imprimer') {
        imprimerRdv($_GET['id']);
         
    }

}    
else {

    start();
}



