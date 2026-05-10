<?php
session_start();
include "connexion/db.php";

if(isset($_POST['id'])){

    $id = $_POST['id'];

    $sql = "DELETE FROM users WHERE id='$id'";

    $result = mysqli_query($conn, $sql);

    if($result){

        session_destroy();

        header("Location: connexion/login.php");
        exit();

    } else {

        echo "Erreur : " . mysqli_error($conn);

    }

} else {

    header("Location: view.php");
    exit();

}
?>
