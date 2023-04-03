<?php
    function ConnectDB(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "rdvdb";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            return $conn;
        }
        catch(Exception $e){
            //echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }
     /******************************************************** */
     function login(){
        $conn=ConnectDB();
        $stmt = $conn->prepare("select * from `admin` where `user_name`=:user and `password`=:password");
        $stmt->bindValue('user', $_POST['user'], PDO::PARAM_STR);
        $stmt->bindValue('password', $_POST['psw'], PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
        if($count == 1 && !empty($row)) {
            home();
        }else {
            echo "<script>
            alert('Nom d\'utlisateur ou mot de passe incorrect !');
            window.location.href='index.php';
            </script>";        }
        
    
      }
      /*********************************************************** */
    function getPatient(){
        $conn = ConnectDB();
        $sql = "SELECT * FROM patient";
        $stmt= $conn->prepare($sql);
        $stmt->execute();
        return $stmt; 
    }
    /******************************************************************** */
    function getRdv(){
        $conn = ConnectDB();
        $sql = "SELECT * FROM rdv";
        $stmt= $conn->prepare($sql);
        $stmt->execute();
        return $stmt; 
    }
    /************************************************************************** */
    function getNomPatient($id){
        $conn = ConnectDB();
        $sql = "SELECT * FROM patient where id=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$id]);
        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['nom'];
    }
    /********************************************************************************** */
    function getPrenomPatient($id){
        $conn = ConnectDB();
        $sql = "SELECT * FROM patient where id=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$id]);
        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['prenom'];
    }
    /********************************************************************************* */
    function addRdv(){
        $conn = ConnectDB();
        $sql = "INSERT INTO patient ( nom , prenom ,  date_naissance, adresse,tel,mail,info_mem) VALUES (?,?,?,?,?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([ $_POST['nom'],$_POST['prenom'], $_POST['date_naissance'],$_POST['adresse'],$_POST['telephone'],$_POST['email'],$_POST['info']]);
        $id = $conn->lastInsertId();
        $sql = "INSERT INTO rdv ( patient , date ,  heure, objet) VALUES (?,?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([ $id,$_POST['date'], $_POST['heure'],$_POST['objet']]);
        echo "<script>
        alert('Le rendez-vous a été ajouté.');
        </script>";
    }
    /******************************************************************** */
    function supprRdv($id){
        $conn = ConnectDB();
        $sql = "Delete from rdv where id =?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$id]);
    }
    /***************************************************************** */
    function modifRdv($id){
        $conn = ConnectDB();
        $sql = "update rdv set date =? where id =?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$_POST['date'],$id]);
        
    }
    /******************************************************************** */
    function getRdvPatient($id){
        $conn = ConnectDB();
        $sql = "SELECT * FROM rdv where patient=? ";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt; 
    }
    function addRdvPatient($id){
        $conn = ConnectDB();
        $sql = "INSERT INTO rdv ( patient , date ,  heure, objet) VALUES (?,?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([ $id,$_POST['date'], $_POST['heure'],$_POST['objet']]);
        echo "<script>
        alert('Le rendez-vous a été ajouté.');
        </script>";
    }
    /***************************************************************************** */
    function getRdvFiltrer(){
        $conn = ConnectDB();
        $sql = "SELECT * FROM rdv where date=? ";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$_POST['date']]);
        return $stmt; 
    }
    /************************************************************************ */
    function getRdvToday(){
        $date =  date("Y-m-d");
        $conn = ConnectDB();
        $sql = "SELECT * FROM rdv where date=? order by heure";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$date]);
        return $stmt; 
    }
    /************************** */
    function getRdvById($id){
        $conn = ConnectDB();
        $sql = "SELECT * FROM rdv where id=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt; 
    }
?>


