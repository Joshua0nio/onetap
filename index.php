<?php 
include ('db.php');
session_start();
if(isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])){
  header('location:home.php');
  die();
}
if (isset($_POST['submit'])) {
  $username = $_POST['username']; 
  $password = md5($_POST['password']);
  
  $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql); 
  if ($result->num_rows > 0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['username'] = $row['username'];
    
    setcookie('user_id',$row['user_id'],time()+60*60*24*30);
    header("location: home.php");
  } else {
  echo "<script>alert( 'Woops! Email or Password is wrong.')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
    
    </style>
    <link href="style.css" rel="stylesheet">
</head>
<body class="text-center">
    
<main class="form-signin"> 
  <div class="card-body p-5 text-center">
    
    <h3 class="mb-5 fw-bolder" >USER LOGIN</h3>
    <form action="" method="post">


        <div class="form-outline mb-4">
            <input type="text" name="username" class="form-control form-control-sm border border-danger" />
            <label class="form-label" >Username</label>
        </div>
        <div class="form-outline mb-4">
            <input type="password" name="password" class="form-control form-control-sm border border-danger" />
            <label class="form-label" >Password</label>
        </div>
        
        <button class="btn btn-danger btn-lg btn-block" name="submit">Login</button>
    </form>

    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?</p>
    <p class="small fw-bold mt-2 pt-1 mb-0"><a href="register.php" class="link-danger">Sign Up</a></p>
    
  </div>
    
  </form>
</main>

</body>
</html>