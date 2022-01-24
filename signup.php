<?php 

$showALERT = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include './partial/dbconnect.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    // $exists=false;

    //check weather this username exists
    $existSql = "SELECT * FROM `users1` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showError = "Username Already exists";
    }
    else{
        // $exists = false;

    if(($password == $confirmpassword) ){
        $hash = password_hash($password , PASSWORD_DEFAULT);
             $sql = "INSERT INTO `users1` ( `username`, `email`, `password`, `confirmpassword`, `date`) VALUES ('$username','$email', '$hash', '$confirmpassword', current_timestamp())";
         $result = mysqli_query($conn , $sql);
         if($result){
             $showALERT = true;
         }
        }

    else{
        $showError = "Passwords do not match";
          }
        }
     }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sign up</title>
</head>

<body>
    <?php require 'partial/_nav.php' ?>
    <?php
    if($showALERT){
        echo'
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your accout is now created and you can login
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
?>
    <?php
    if($showError){
        echo'
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> '.$showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
?>
    <div class="container">
        <h1 class="text-center">Sign Up to our website</h1>

        <form action="signup.php" method="post">
            <div class="mb-3">
                <label for="Username" class="form-label">User Name</label>
                <input type="username" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label ">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="InputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="InputPassword1" name="password">
            </div>
            <div class="mb-3">
                <label for="confirmPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword1" name="confirmpassword">
            </div>

            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>