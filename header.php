<?php
include("db.php");
?>
<html lang="en">

<head>
<link rel="icon" type="image/x-icon" href="assets/favicon-removebg-preview.png">
<base href="http://localhost/nature/">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  $pagen="";
  $pagedes="";
  if(isset($page)){

    $pagesql="SELECT * FROM seo WHERE id=$page" ;
    $pageres=mysqli_query($conn,$pagesql);
    $pagerow=mysqli_fetch_assoc($pageres);
  $pagen=$pagerow['pagename'];
  $pagedes=$pagerow['description'];
  }
  else if($p){
$pagen=$p;
  }
  
  
  ?>
  <title><?= $pagen; ?></title>
  <meta name="description" content="<?= $pagedes; ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/wickedcss.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
</head>
<style>
  .dropdown:hover .dropdown-menu {
    display: block;
  }

  .dropdown-menu {
    margin-top: 0;
  }
</style>
</head>
<script>
  $(document).ready(function() {
    $(".dropdown").hover(function() {
      var dropdownMenu = $(this).children(".dropdown-menu");
      if (dropdownMenu.is(":visible")) {
        dropdownMenu.parent().toggleClass("open");
      }
    });
  });
</script>

<?php
$hsql = "SELECT * FROM header";
$hresult = mysqli_query($conn, $hsql);
$hrow = mysqli_fetch_assoc($hresult);
?>
<!-- header -->
<header>
  <div class="container-fluid">
    <!-- top head -->
    <div class="row bg1">
      <div class="col-lg-4 d-none d-md-block">
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <p class="text-style pt-3 " style="font-size: 12px; ">Stay Connected </p>
          </li>
          <li class="nav-item">
            <a class="nav-link text-style pt-3" href="<?= $hrow['flink']; ?>"><i class="fab fa-facebook-f"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-style pt-3" href="<?= $hrow['ylink']; ?>"><i class="fab fa-youtube"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-style pt-3" href="<?= $hrow['llink']; ?>"><i class="fab fa-linkedin-in"></i></a>
          </li>
        </ul>
      </div>
      <div class="col-lg-8">
        <ul class="nav" style="justify-content: space-evenly;">
          <li class="nav-item li-wi d-none d-sm-inline">
            <p class="text-style mt-3" style="font-size: 12px; border-right: .1px solid rgba(178,178,178,0.2);">Made in USA <img src="assets/flag-small.jpg" class="flag-img"></p>
          </li>
          <li class="nav-item li-wi d-none d-sm-inline">
            <p class="text-style mt-3" style="font-size: 12px;  border-right: .1px solid rgba(178,178,178,0.2);"><img src="assets/chat-small.png" class="chat-img"> <span style="color:#7ec531;">Live </span>Chat Support

            </p>
          </li>
          <li class="nav-item">
            <p class="text-style mt-3" style="font-size: 12px;"><span style="color: #f87819;">Need Help? </span><?= $hrow['contact']; ?></p>
          </li>
        </ul>
      </div>
    </div>
    <!-- navbar start -->
    <div class="row bg3  rounded">
      <div class="  col-lg-4 bg4 pt-3 pb-3">

        <img src="assets/<?= $hrow['image']; ?>" class="logo" alt="" class="scale">
      </div>
      <div class=" col-lg-8 ">
        <nav class="navbar navbar-expand-lg navbar-light bg-light pt-0 pb-0  justify-content-end">
          <button class="navbar-toggler border-0 togglec" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars togg-icon" aria-hidden="true"></i>
          </button>

          <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav ">
              <li class="nav-item l pt-4 pb-4 mr-4 <?php if(isset($_SESSION['activeh'])){
               echo $_SESSION['activeh'];
              }
                                                    
                                                    ?>   ">
                <a class="nav-link  " href="index.php"><b>HOME</b> </a>
              </li>
              <li class="nav-item l pt-4 pb-4 mr-4 
                    <?php
                    if(isset($_SESSION['activep'])){
                      echo $_SESSION['activep'];
                    }
                    ?> ">
                <a class="nav-link " href="product.php"><b>PRODUCTS</b></a>
              </li>
              <li class="nav-item l dropdown pt-4 pb-4 mr-4 <?php
              if(isset($_SESSION['actives'])){
                echo $_SESSION['actives'];
              }
                                                           
                                                            ?> ">
                <a class="nav-link dropdown-toggle" href="service.php" id="navbarDropdown" role="button">
                  <b>SERVICES</b>
                </a>
                <div class="dropdown-menu db-c " aria-labelledby="navbarDropdown">
                  <?php
                  $pssql="SELECT * FROM section3";
                  $psresult=mysqli_query($conn,$pssql);
                  while($psrow=mysqli_fetch_assoc($psresult)){

                  ?>

                  <a class="dropdown-item text-white mini-d <?php
                                                           $a=$psrow['S3_id'];
                                                           if($ac===$psrow['S3_id']){
                                                            echo 'act2';
                                                           }
                                                            ?>" href="s_detail.php?id=<?= $psrow['S3_id'];  ?>"><?= $psrow['heading'];  ?></a>
                                                            <div class="dropdown-divider m-0"></div>
                                                            <?php
                  }
                                                            ?>
                </div>
              </li>
              <li class="nav-item pt-4 pb-4 mr-4 l <?php
              if(isset($_SESSION['activea'])){
                echo $_SESSION['activea'];
              }
                                                  
                                               ?> ">
                <a class="nav-link " href="about.php"><b>ABOUT US</b></a>
              </li>
              <li class="nav-item pt-4 pb-4 mr-4 l <?php
              if(isset($_SESSION['activec'])){
                  echo $_SESSION['activec'];
              }
                                                    
                                                    ?>">
                <a class="nav-link " href="contact.php"><b>CONTACT US</b></a>
              </li>
              <li class="nav-item pt-4 pb-4 ">
                <a class="btn btn-col text-white btn-lg shadow" role="button" href="<?= $hrow['blink']; ?>" style="font-size: 13px;"><b><?= $hrow['bname']; ?></b></a>
              </li>
            </ul>

          </div>
        </nav>
      </div>

    </div>
  </div>
</header>