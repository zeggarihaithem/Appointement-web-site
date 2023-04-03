<?php
    require('././Model/Model.php');
    
    function start(){
     require('././View/login_admin.php');
    }
    /*************************************** */
    function home(){  
        $data=getPatient();
        require('././View/gestion_patient.php');
    }
    /************************************ */
    function afficherRdv(){
        $data=getRdv();
        require('././View/gestion_rdv.php');
    }
    /***************************************** */
    function afficherNewRdv(){
        require('././View/newRdv.php');
    }
    /**************************************** */
    function logout(){
       start();
    }
    /****************************************** */
    function ajouterRdv(){
        addRdv();
        header('location:?action=getPatient');
    }
    /********************************** */
    function supperimerRdv($id){
        supprRdv($id);
        header('location:?action=getRdv');
    }
    /*************************************** */
    function modifierRdv($id){
        modifRdv($id);
        header('location:?action=getRdv');
       
    }
    /******************************************* */
    function afficherRdvPatient($id){
        $data=getRdvPatient($id);
        require('././View/RvPatient.php');
    }
    /************************************************** */
    function ajouterRdvPatient($id){
        addRdvPatient($id);
        header('location:?action=getRdv');
    }
    function afficherAddRdvPatient(){
        require('././View/addRdvPatient.php');
    }
    function afficherRdvFiltrer(){
        $data=getRdvFiltrer();
        require('././View/gestion_rdv.php');
    }
    /***************************** */
    function afficherRdvToday(){
        $data=getRdvToday();
        require('././View/gestion_rdv.php');
    }
    /****************************************** */
    function imprimerRdv($id){
        $data=getRdvById($id);
        $r = $data->fetch();
        $nom = getNomPatient($r['patient']);
        $prenom = getPrenomPatient($r['patient']);
        $myfile = fopen("rendezVous ID=".$id.".txt", "w") or die("Unable to open file!");
        $txt = "Nom : ".$nom."\nPrénom : ".$prenom."\ndate : ".$r['date']."\nheure : ".$r['heure']."\nobjet : ".$r['objet'];
        fwrite($myfile, $txt);
        fclose($myfile);
        echo "<script>
        alert('Le rendez-Vous est imprimer');
        window.location.href='?action=getRdv';
        </script>";
    }
?>