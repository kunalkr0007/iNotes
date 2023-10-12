
<?php
$showError = "false";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
include 'connect.php';
$email = $_POST['loginEmail'];
$pass = $_POST['loginPass'];
echo 'hello '. $email;

$sql = "SELECT * FROM `users` WHERE `user_email`='$email' ";
$result = mysqli_query($conn, $sql);
$numRows = mysqli_num_rows($result);
$showAlert = false;

if($numRows == 1){

    $row = mysqli_fetch_assoc($result);
    echo $pass;
    if(password_verify($pass, $row['user_pass'])){

        $showAlert = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['sno'] = $row['user_id'];
        $_SESSION['useremail'] = $email;
        echo "logged in ".$email;
        header("location:/inotes/home.php");
        exit();
    }
}
    header("location:/inotes/home.php?signin=false");

}


?>


