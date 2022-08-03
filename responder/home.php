<?php
session_start();
if (!isset($_COOKIE['username'])) {
  header("location:index.php");
  die();
}
$_SESSION['username'] = $_COOKIE['username'];
?>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="refresh" content="5">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
  <script>
    let counter = 1;
    setInterval(() => {
      counter++;
    }, 1000);
  </script>

  <style>
    html,
    body {
      height: 100%;
      margin: 0;
    }

    .leaflet-container {
      height: 400px;
      width: 600px;
      max-width: 100%;
      max-height: 100%;
    }
  </style>
</head>

<body class="text-center">

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

    <table class="table table-striped">
      <tr>
        <th>REPORT ID</th>
        <th>NAME</th>
        <th>TYPE</th>
        <th>DETAILS</th>
      </tr>
      <?php
      include('db.php');
      //query

      $sql = "SELECT * FROM incoming_reports";

      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $report_id = $row['report_id'];
          $user_id = $row['user_id'];
          $report_type = $row['report_type'];
          $lat = $row['latitude'];
          $long = $row['longitude'];
          echo '<tr>
                        <td>' . $report_id . '</td>
                        <td>' . $user_id . '</td>
                        <td>' . $report_type . '</td>
                        <td>
                        <form method="post">
                        <button class="btn btn-danger" name="show"><a href="details.php? reportid=' . $report_id . '">VIEW DETAILS</a></button>
                        </form>
                        </td>
                            </tr>';
        }
      } else {
        echo "<script>alert( 'Wwala pa report boss')</script>";
      }

      $conn->close();
      ?>
    </table>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>