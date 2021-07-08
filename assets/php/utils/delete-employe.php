<?php 
    session_start();
    include_once('../inc/constants.inc.php');
    include_once('../inc/connection.inc.php');

    if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
        $mail = $_SESSION['email'];
    } else{
        header('location:../../../page5.php');
    }
    //SQL : DELETE FROM `table`WHERE condition
    $id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';
    echo $id;

    $sql = 'DELETE FROM employe WHERE numero_employe = ?';

    try {
        $conn = connection();
        $qry = $conn->prepare($sql);
        $qry->execute(array($id));
        
    }catch(PDOException $err){
        $err->getMessage();
    }
?>