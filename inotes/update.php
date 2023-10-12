<?php

include 'connect.php';

$id = $_GET['updateid'];
$sql = "SELECT * FROM `crud2` WHERE `sno`=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$title = $row['title'];
$notes = $row['notes'];
// $time  = current_timestamp();
// echo $time;

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $notes = $_POST['notes'];

    $sql = "UPDATE `crud2` SET `title` = '$title', `notes` = '$notes' WHERE `sno` = $id";
    $result = mysqli_query($conn, $sql);


    if($result){
      header('location:home.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
      
      <div class="container border my-5">
        <h1 class="text-center mb-4"> Update Notes</h1>
    <form method="post">
  <div class="mb-3">
    <label for="exampleInputTitle1" class="form-label">Title</label>
    <input type="text" class="form-control" id="exampleInputTitle1" name="title"
    value="<?php echo $title; ?>" required  >
  </div>

  <div class="mb-3">
    <label for="exampleInputNotes1" class="form-label">Notes Description</label>
    <input type="text" class="form-control" id="exampleInputNotes1" name="notes" maxlength="100"
    value="<?php echo $notes; ?>" required >
  </div>


  <button type="submit" class="btn btn-md btn-primary" name="submit">Update</button>
    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>