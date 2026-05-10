<?php
session_start();
include "connexion/db.php";

if(isset($_POST['id'])){

    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    
    if(!empty($mot_de_passe)){

       
        $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        $sql = "UPDATE users 
                SET nom='$nom',
                    email='$email',
                    mot_de_passe='$hashed_password'
                WHERE id='$id'";

    } else {

       
        $sql = "UPDATE users 
                SET nom='$nom',
                    email='$email'
                WHERE id='$id'";
    }

    $result = mysqli_query($conn, $sql);

    if($result){

        $_SESSION['success'] = "Informations modifiées avec succès";

        header("Location: view.php");
        exit();

    } else {

        echo "Erreur : " . mysqli_error($conn);

    }

} else {

    header("Location: view.php");
    exit();

}
?>
