<?php
session_start();
if(!isset($_COOKIE['username'])){
  header("location:index.php");
  die();
}
$_SESSION['username']=$_COOKIE['username'];
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
  <style>
         body {
         background-color: #eee
         }
         .nav-link {
         border-radius: 0px !important;
         transition: all 0.5s;
         width: 100px;
         display: flex;
         flex-direction: column
         }
         .nav-link small {
         font-size: 12px
         }
         .nav-link:hover {
         background-color: #52525240 !important
         }
         .nav-link .fa {
         transition: all 1s;
         font-size: 20px
         }
         .nav-link:hover .fa {
         transform: rotate(360deg)
         }
      </style>
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="text-center" >

  <!-- navbar -->
  <nav class="navbar navbar-dark bg-danger">
    <div class="container-xxl">
      <!-- navbar brand / title -->
      <a class="navbar-brand" href="index.php">
        <span class=" fw-bold fs-1">
          FFE
        </span>
      </a>
</nav>

<main class="form-signin">
     <!-- Page Wrapper -->
     <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #b34949;" >
 <!-- Sidebar - Brand -->
 <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
    <div>ONE TAP</div>
 </a>
 <!-- Divider -->
 <hr class="sidebar-divider my-0">
 <!-- Nav Item - Dashboard -->
 <li class="nav-item">
    <a class="nav-link" href="index.html">
    <img src="https://img.icons8.com/ios/50/000000/dashboard.png" style="width: 30px;">
    <span>Dashboard</span></a>
 </li>
 <!-- Divider -->
 <hr class="sidebar-divider">
 <!-- Heading -->
 <div class="sidebar-heading">
    Reports
 </div>
 <li class="nav-item">
    <a class="nav-link" href="backup.php">REQUESTS BACKUP</a>
 </li>
 <li class="nav-item">
    <a class="nav-link" href="history.php">RESPONSE HISTORY</a>
 </li>
 <div class="sidebar-heading">
    LOGOUT
 </div>
 <li class="nav-item">
    <a class="nav-link" href="logout.php">LOGOUT</a>
 </li>

</ul>


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <nav class="navbar navbar-expand-md navbar-light pt-5 pb-4 bg-gradient sticky-top">
        <div class="container-fluid">
          <!-- navbar brand / title -->
          <a class="navbar-brand" href="backup.php">
            <span class="text-secondary fw-bold fs-1">
              REQUEST BACKUP
            </span>
          </a>

          <!-- navbar links -->
          <div class="justify-content-end align-center">
            
          </div>
        </div>
      </nav>

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid mt-4">
            

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>