<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iNotes Web App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php session_start(); ?>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php"><img width="45" height="45" src="https://img.icons8.com/external-color-outline-adri-ansyah/64/external-logistics-logistics-color-outline-adri-ansyah-60.png" alt="external-logistics-logistics-color-outline-adri-ansyah-60"/> iNotes by Kunal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                </ul>

                <?php
          if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            echo '<form class="d-flex m-2"  role="search">
              <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-success" type="submit">Search</button> </form>
              <div class="d-flex align-items-center text-light ms-2 me-1 p-0">Welcome '.$_SESSION['useremail'].' 
              <div><a class="btn btn-outline-danger mx-2" href="logout.php">Logout</a></div></div>  ';
          
          }
          else
          {
            echo '<form class="d-flex " role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-success" type="submit">Search</button>

            </form>';
           echo '
           <button class="btn btn-outline-success  m-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
            <button class="btn btn-outline-primary ms-0 m-2" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>';

          }
            ?>
            </div>
        </div>
    </nav>


    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h1 class="modal-title fs-5 text-end" id="loginModalLabel">Login for iNotes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="login.php" method="post">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Username</label>
                            <input type="text" class="form-control" id="loginEmail" name="loginEmail"
                                aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3">
                            <label for="loginPass" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPass" name="loginPass">
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h1 class="modal-title fs-5" id="signupModalLabel">Signup for iNotes </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="signup.php" method="post">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="signupEmail" class="form-label">Username</label>

                            <input type="text" class="form-control" id="signupEmail" name="signupEmail"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="signupPassword" name="signupPassword">
                        </div>
                        <div class="mb-3">
                            <label for="cpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="signupcPassword" name="signupcPassword">
                        </div>

                        <button type="submit" class="btn btn-primary">Signup</button>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php


        include 'connect.php';
      

        if(isset($_POST['submit'])){
            $id = $_POST['sno'];
            $title = $_POST['title'];
            $notes = $_POST['notes'];

            $sql = "INSERT INTO `crud2` (`title`, `notes`,`user_id`, `time`) 
            VALUES ( '$title', '$notes','$id', current_timestamp());";

            $result = mysqli_query($conn, $sql);

            if($result){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Notes Inserted Successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
            else{
                die(mysqli_error($conn));
            }
        }


?>
    <?php 
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
  echo '<div class="alert my-0 alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You can now login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false"){
  echo '<div class="alert my-0 alert-danger alert-dismissible fade show" role="alert">
  <strong>Error! </strong>'. $_GET['error'].'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
  
  
  if(isset($_GET['signin']) && $_GET['signin'] == "false"){
    echo '<div class="alert my-0 alert-danger alert-dismissible fade show" role="alert">
    <strong>Error! </strong> Invalid Credentials
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }



?>

    <div class="container border my-5">
        <h1 class="text-center mb-4 mt-1">iNotes - A Web App to take Notes</h1>

        <form method="post">
            <div class="mb-3">
                <label for="exampleInputTitle1" class="form-label">Note Title</label>
                <input type="text" class="form-control" id="exampleInputTitle1" maxlength="50" name="title" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputNotes1" class="form-label">Note Description</label>
                <textarea  class="form-control" id="exampleInputNotes1" maxlength="100" rows="3"  name="notes" required> </textarea>

            </div>
            <?php 
  if(isset($_SESSION['loggedin'])){
      echo '<input type="hidden" name="sno" value='. $_SESSION["sno"]. '>';
      echo '<button type="submit" class="btn btn-primary mb-2" name="submit">Add Note</button>';
  } 
  else{
 echo '<p class=" pt-1"><button type="submit" class="btn btn-primary " disabled name="submit">Login/Signup</button> to add notes </p>  ';

  }

  ?>
        </form>


    </div>
    <?php
    if(isset($_SESSION['loggedin'])){
   echo '<h4 class="container">'. $_SESSION["useremail"].'  Notes</h4>';
    }
    ?>


    <div class="container border overflow-auto" style="min-height:200px;">

        <table class="table table-striped" style="min-width:500px;">
            <thead>
                <tr>
                    <th scope="col">Sno</th>
                    <th scope="col">Title</th>
                    <th scope="col">Note</th>
                    <th scope="col">Time of Entry</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
   if(isset($_SESSION['loggedin'])){
  $id=$_SESSION['sno'];
  
    $sql = "SELECT * FROM `crud2` WHERE `user_id` = '$id' ";
    $result = mysqli_query($conn, $sql);

    if($result){

        $sno =0;
        while($row = mysqli_fetch_assoc($result)){
            $sno++;
            $id = $row['sno'];
            $title = $row['title'];
            $notes = $row['notes'];
            $time = $row['time'];

            echo '<tr>
            <th scope="row">'.$sno .'</th>
            <td>'.$title. '</td>
            <td >'.$notes .'</td>
            <td style="min-width:100px">'.$time. '</td>
            <td><div class="d-md-flex">
            <button class="btn btn-primary mb-1 me-1"><a href="update.php?updateid='.$id.'" 
                class="text-light text-decoration-none">Update</a></button>
            <button class="btn btn-danger mb-1"><a href="delete.php?deleteid='.$id.'"
                 class="text-light text-decoration-none ps-1">Delete </a></button>
            </td></div>
          </tr>';
        }
    }
  
   
      
    }

  ?>


            </tbody>
        </table>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

<div class="container-fluid text-light bg-dark mt-5">
    <footer class="p-2 ">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="home.php" class="nav-link px-2 text-light text-light">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2  text-light">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2  text-light">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2  text-light">About</a></li>
        </ul>
        <p class="text-center ">&copy; 2023 Kunal Kumar</p>
    </footer>
</div>

</html>