<?php
include_once('connection.inc.php');
/*
* Fonction qui vérifie quel utilisateur est connecté. Si employé ou client
*/

function whoIsConnected($var){
    try{
        $conn = connection();
        $sql = 'SELECT * FROM employe WHERE email = ?';
        $qry = $conn->prepare($sql);
        $qry->execute(array($var));
            if($qry->rowCount() === 1){
                $user = 'Employe';
                echo $user;
                return $user;
            } else {
                $user = 'Client';
                echo $user;
                return $user;
            }
    } catch(PDOException $err){
        echo $err->getMessage();
    }
}
?>