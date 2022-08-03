<?php
include ('db.php'); 

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
     $cpassword = md5($_POST['cpassword']);

    if ($password = $cpassword) {
        $sql = "INSERT INTO user (username, password) VALUES
                ('$username','$password')";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo "<script>alert('something went wrong')</script>";
        }else{
            echo "<script>alert('registered successfully')</script>";
        }
    } else {
        echo "<script>alert('password isnt matched')</script>";
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
    
    <h3 class="mb-5 fw-bolder" >REGISTER</h3>
    <form method="post">


        <div class="form-outline mb-4">
            <input type="text" name="username" class="form-control form-control-sm border border-danger" />
            <label class="form-label" >Username</label>
        </div>
        <div class="form-outline mb-4">
            <input type="password" name="password" class="form-control form-control-sm border border-danger" />
            <label class="form-label" >Password</label>
        </div>
        <div class="form-outline mb-4">
            <input type="password" name="cpassword" class="form-control form-control-sm border border-danger" />
            <label class="form-label" >Confirm Password</label>
        </div>




        <button class="btn btn-danger btn-lg btn-block" name="submit">register</button>
    </form>






    <p class="small fw-bold mt-2 pt-1 mb-0">already have account?</p>
    <p class="small fw-bold mt-2 pt-1 mb-0"><a href="index.php" class="link-danger ">Sign In</a></p>
    
  </div>
    
  </form>
</main>

</body>
</html>