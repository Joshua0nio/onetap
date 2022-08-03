<?php
include('db.php');
$report = $_GET['reportid'];

$sql = "SELECT * FROM incoming_reports WHERE report_id = '$report'";
                        
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
                        $report_id = $row['report_id'];
                        $user_id = $row['user_id'];
                        $report_type = $row['report_type'];
                        $lat = $row['latitude'];
                        $long = $row['longitude'];
    }
  }
?>

<html lang="en">
<head>
    
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
   

	<style>
		html, body {
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
<body class="text-center" onload="showPosition()";>

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
    <center>
    <div id="map" style="width: 600px; height: 400px;"></div>
    <br>
    <div class="container">
        <button type="button" class="btn btn-danger btn-sm">RESPOND</button>
        <button type="button" class="btn btn-danger btn-sm">REQUEST BACKUP</button>
    </div>
    <br>
    <div class="container">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">NAME</th>
      <th scope="col">TYPE</th>
      <th scope="col">PROOF</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
    include('db.php');

$sql = "SELECT * FROM images WHERE image_id = '$report'";
                        
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
                        $image = $row['image'];
                        $date = $row['date'];
                       echo '<tr>
                        <td>'.$report_id.'</td>
                        <td>'.$report_type.'</td>
                        <td><img src="img/'.$image.'" style="width: 160px; height: 140px;"></td>
                        
                            </tr>';
    }
  }
    ?>
      
    
  </tbody>
</table>
    </div>
    
    </center>
</main>

<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0]/dist/L.Control.Locate.min.js" charset="utf-8"></script>
<script>

	var map = L.map('map').setView([14.5794, 121.0359], 13);

	var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(map);

  

function showPosition(position) {
  var marker = L.marker([<?php echo $lat ?>, <?php echo $long ?>]).addTo(map)
		.bindPopup('<b>HOOOYYYY</b><br />MAY SUNOG DITO TANGA.').openPopup();
}
 
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>