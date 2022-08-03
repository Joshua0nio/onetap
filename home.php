<?php
session_start();
if (!isset($_COOKIE['user_id'])) {
  header("location:index.php");
  die();
}
$_SESSION['user_id'] = $_COOKIE['user_id'];

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body class="text-center" onload="getLocation()" ;>

  <!-- navbar -->
  <nav class="navbar navbar-dark bg-danger">
    <div class="container-xxl">
      <!-- navbar brand / title -->
      <a class="navbar-brand" href="index.php">
        <span class=" fw-bold fs-1">
          FFE
        </span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#"><?php echo $_SESSION['username'] ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="form-signin">
    <form method="post">
      <br><br><br><br><br><br>
      <div class="d-grid gap-2 m-2">
        <button class="btn btn-primary btn-danger" name="flood">FLOOD</button>
        <button class="btn btn-primary btn-danger" name="fire">FIRE</button>
        <button class="btn btn-primary btn-danger" name="earthquake">EARTHQUAKE</button>
      </div>
      <input type="text" id="demo" name="lat" value="">
      <input type="text" id="demo1" name="long" value="">
      <input type="text" value="<?php echo $_SESSION['user_id'] ?>">

    </form>
  </main>
  <script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      }

      function showPosition(position) {
        document.getElementById("demo").value = position.coords.latitude;
        document.getElementById("demo1").value = position.coords.longitude;
      }


    }
  </script>
  <?php

  include('db.php');
  $id = $_SESSION['user_id'];
  if (isset($_POST['flood'])) {
    $lat = $_POST['lat'];
    $long = $_POST['long'];

    $sql = "INSERT INTO incoming_reports (user_id, report_type, latitude, longitude) VALUES
                ('$id','flood','$lat','$long')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      echo "<script>alert('something went wrong')</script>";
    } else {
      echo "<script>alert('registered successfully')</script>";
      header("location:camera.php");
    }
  }

  ?>

  <?php

  include('db.php');
  $id = $_SESSION['user_id'];
  if (isset($_POST['fire'])) {
    $lat = $_POST['lat'];
    $long = $_POST['long'];

    $sql = "INSERT INTO incoming_reports (user_id, report_type, latitude, longitude) VALUES
                ('$id','fire','$lat','$long')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      echo "<script>alert('something went wrong')</script>";
    } else {
      echo "<script>alert('registered successfully')</script>";
      header("location:camera.php");
    }
  }

  ?>

  <?php

  include('db.php');
  $id = $_SESSION['user_id'];
  if (isset($_POST['earthquake'])) {
    $lat = $_POST['lat'];
    $long = $_POST['long'];

    $sql = "INSERT INTO incoming_reports (user_id, report_type, latitude, longitude) VALUES
                ('$id','earthquake','$lat','$long')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      echo "<script>alert('something went wrong')</script>";
    } else {
      echo "<script>alert('registered successfully')</script>";
      header("location:camera.php");
    }
  }

  ?>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>