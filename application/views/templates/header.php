<?php 

  if ($this->session->has_userdata('logged_in') == FALSE)
  {
    header('location:https://salung.000webhostapp.com/login');
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keyword" content="perpustakaan, library, eskasaba, salung, salung prastyo">

  <title>Perpustakaan</title>

  <!-- This link for css assets-->
  <link href="https://salung.000webhostapp.com/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://salung.000webhostapp.com/assets/css/style.css" rel="stylesheet">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
    <a class="navbar-brand text-subheading" href="https://salung.000webhostapp.com/"><b>Perpustakaan</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="https://salung.000webhostapp.com/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="https://salung.000webhostapp.com/About">About <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kategori
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="https://salung.000webhostapp.com/home/kategori/Pendidikan">Pendidikan</a>
            <a class="dropdown-item" href="https://salung.000webhostapp.com/home/kategori/Islam">Islam</a>
            <a class="dropdown-item" href="https://salung.000webhostapp.com/home/kategori/Novel">Novel</a>
          </div>
        </li>    
      </ul>
      <form class="form-inline my-2 my-lg-0" action="https://salung.000webhostapp.com/cari" method="get">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="cari">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
      </form>  
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $_SESSION['name']; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="https://salung.000webhostapp.com/profile">My Account</a>
            <a class="dropdown-item" href="https://salung.000webhostapp.com/logout">Logout</a>
          </div>
        </div>
    </div>
  </div>
</nav>

<div class="wrapper">
  <div class="container">