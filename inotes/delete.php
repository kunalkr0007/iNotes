<?php

include 'connect.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
   
    $sql = "DELETE FROM `crud2` WHERE `sno`= $id";
    $result = mysqli_query($conn, $sql);

    if($result){
    //     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //     <strong>Success!</strong> Notes Deleted Successfully.
    //   </div>';

    header('location:home.php');
    }
}


?>