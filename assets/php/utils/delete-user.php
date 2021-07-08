<?php 
    session_start();
    include_once('../inc/constants.inc.php');
    include_once('../inc/connection.inc.php');

    if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
        $mail = $_SESSION['email'];
        //SQL : DELETE FROM `table`WHERE condition
        $id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';
        echo $id;
        try {
            $sql = 'DELETE FROM client WHERE numero_client = ?';
                $conn = connection();
                $qry = $conn->prepare($sql);
                $qry->execute(array($id));
                unset($conn);
                unset($id);
                header('location:../../../admin-gestion-client.php');
            }catch(PDOException $err){
                echo $err->getMessage();
            }
    } else{
        header('location:../../../page5.php');
    }
?>