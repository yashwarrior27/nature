 <?php
session_start();
$page=1;
$_SESSION['activeh']='act';
$_SESSION['Formula']="a";
include("header.php");
include("db.php");
$sql = "SELECT * FROM section2 ";
$result = mysqli_query($conn, $sql);
// $x=mysqli_num_rows($result);
// $x=$result;
// $x= mysqli_fetch_assoc($result);
// $y= mysqli_fetch_assoc($result);
// while($row = mysqli_fetch_assoc($result)){
// }
 $head= "SELECT * FROM slide_header";
$r= mysqli_query($conn,$head);
$r1=mysqli_fetch_assoc($r);
$s3="SELECT * FROM section3";
$r2= mysqli_query($conn,$s3);
$as="assets/";
?>
<?php
$slidesql="SELECT * FROM slider_headbackground";
$slideresult=mysqli_query($conn,$slidesql);
$shrow=mysqli_fetch_assoc($slideresult);
?>
 <body>
     <!-- first section carousel part   -->
     <div class="container-fluid " style=" background-image:url(assets/<?=$shrow['image'];?>);
   background-size: cover;
   background-position: center;
     box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) inset;">
         <div class="row">
             <div class="container">
                 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                     <ol class="carousel-indicators" style="bottom: -20px;">
                         <li data-target="#carouselExampleIndicators" style="background-color: rgb(38,154,92);"
                             data-slide-to="0" class="active"></li>
                         <?php
             if(mysqli_num_rows($r)>1){
               for($i=2;$i<=mysqli_num_rows($r);$i++){

             
             ?>
                         <li data-target="#carouselExampleIndicators" style="background-color: rgb(38,154,92);"
                             data-slide-to="<?php echo $i-1;?>"></li>
                         <?php
              };
            }
            ?>
                     </ol>
                     <div class="carousel-inner">

                         <div class="carousel-item active">
                             <div class="row ">
                                 <div class="col-10 col-sm-10 col-md-9 col-lg-8 pt-4 slideLeft">
                                     <h2 class="m-0 text-fonts2"><?= $r1['top_heading'];?></h2>
                                     <h1 class="text-color m-0 text-fonts"><strong><?=$r1['middle_heading'];?></strong>
                                     </h1>
                                     <h2 class="text-fonts2"><?= $r1['bottom_heading'];?></h2>
                                     <p style="font-family: Roboto,sans-serif;">
                                         <strong><?= $r1['head_description'];?></strong></p>
                                 </div>
                             </div>
                             <div class="row mar1 mt-md-2 mt-xl-5">
                                 <div class="col-6 col-sm-6 col-lg-4 pt-3 slideLeft ">
                                     <img src="assets/<?= $r1['head_image'];?>" class="img-fluid" alt="">
                                 </div>
                                 <div class="col-6 col-sm-6 col-lg-5 text-break slideLeft ">
                                 <?= $r1['content'];?>
                                     <div>
                                         <button class="btn btn-lg  rounded-pill btnlable"><b><?=$r1['buttonname']?></b></button>
                                         </div>
                                 </div>
                             </div>
                         </div>
                         <?php
            if(mysqli_num_rows($r)>1){
             while($r1=mysqli_fetch_assoc($r)){
            ?>
                        <div class="carousel-item">
                             <div class="row ">
                                 <div class="col-10 col-sm-10 col-md-9 col-lg-8 pt-4 slideLeft">
                                     <h2 class="m-0 text-fonts2"><?= $r1['top_heading'];?></h2>
                                     <h1 class="text-color m-0 text-fonts"><strong><?=$r1['middle_heading'];?></strong>
                                     </h1>
                                     <h2 class="text-fonts2"><?= $r1['bottom_heading'];?></h2>
                                     <p style="font-family: Roboto,sans-serif;">
                                         <strong><?= $r1['head_description'];?></strong></p>
                                 </div>
                             </div>
                             <div class="row mar1 mt-md-2 mt-xl-5">
                                 <div class="col-6 col-sm-6 col-lg-4 pt-3 slideLeft ">
                                     <img src="assets/<?= $r1['head_image'];?>" class="img-fluid" alt="">
                                 </div>
                                 <div class="col-6 col-sm-6 col-lg-5 text-break slideLeft ">
                                 <?= $r1['content'];?>
                                     <div>
                                         <button class="btn btn-lg  rounded-pill btnlable"><b><?=$r1['buttonname']?></b></button>
                                         </div>
                                 </div>
                             </div>
                         </div>

                         <?php
            };
          }
           ?>
                     </div>
                     <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators"
                         data-slide="prev">
                         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                         <span class="sr-only">Previous</span>
                     </button>
                     <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators"
                         data-slide="next">
                         <span class="carousel-control-next-icon" aria-hidden="true"></span>
                         <span class="sr-only">Next</span>
                     </button>
                 </div>


             </div>
         </div>
     </div>
     </div>
     <!-- second section icons and six column part -->
     <div class="container-fluid">
         <?php
          $row = mysqli_fetch_assoc($result);
         ?>
         <div class="row " style="background-image: url(assets/<?= $row['S2-background']; ?>);">
             <div class="col-12 text-center text-white pt-4 pb-4">
                 <?php
          
            echo "<h3>".$row["Title"] ."</h3>";
            echo "<h5 class=mb-3>".$row["Description"]."</h5>";

          ?>
             </div>
         </div>
         <div class="row bg7">
             <div class="container">
                 <div class="row  justify-content-center text-center v " id="animatedElement"
                     style="transform: translateY(-20px);">
                     <?php
          for($i=1;$i<=mysqli_num_rows($r2);$i++){
            $row2=mysqli_fetch_assoc($r2);
            echo ' <div class=" col-10 col-sm-11 col-md-6 col-lg-4 border pt-4 pb-4 bg-light card1">
            <div class="row justify-content-center mb-1">
            <div class="col-6">
             <div class="text-center">
               <img src="assets/'.$row2['logo'].'" style="width: 60px ;" alt=""></div> 
            </div>
          </div>
            <h5><b>'.$row2["heading"].'</b></h5>
            <p class="text-muted fsize1">'.$row2["description"].'</p>
            <a href="'.$row2["link"].'" class="btn  pl-3 pr-3 rounded-pill card-btn1" role="button">'.$row2["link_name"].'</a>
          </div>';
          }
          ?>
                 </div>
             </div>
         </div>
     </div>
     <!-- third section logo part  -->
     <div class="container-fluid">
         <div class="row bg6 shadow">
             <div class="col-lg-6 col-xl-7 bg8 pt-lg-4 pb-lg-4 pl-lg-4 pl-xl-5 d-flex "
                 style="justify-content: space-evenly;">
                 <?php
        $sql1="SELECT * FROM section4";
        $result1=mysqli_query($conn,$sql1);
        for($i =1; $i<=mysqli_num_rows($result1);$i++){
          $row3=mysqli_fetch_assoc($result1);

        ?>

                 <img src="assets/<?php echo $row3['var'];?>" class="img-fluid px-0 py-1 v " id="<?php
          echo $row3['S4_id'];?>" alt="">

                 <?php
        }
        
          ?>
             </div>
             <div class="col-lg-6 col-xl-5 pt-lg-4 ">
                 <div class="row justify-content-center">
                     <div class="col-6 text-center text-white mt-2 mb-2">
                         <?php
                         $sql2="SELECT * FROM `section4.2`";
                         $result2=mysqli_query($conn,$sql2);
                       $row4=mysqli_fetch_assoc($result2);
                         ?>
                         <h5 class="m-0 "><b><?=$row4['heading'];?>
                             </b></h5>
                         <h5> <b><?=$row4['sub_heading'];?></b></h5>
                     </div>
                     <div class="col-5 mt-3 mb-3">
                         <a href="<?=$row4['buttonlink'];?>" class="btn btn-lg btnlable2 shadow" role="button" aria-pressed="true"><b><?=$row4['buttonname'];?></b></a>
                     </div>
                 </div>
             </div>
         </div>
         <!-- fourth section product part with carousel -->
         <div class="row mt-5 mb-5">
             <div class="container">
                 <div class="row justify-content-center">
                     <div class="col-9 text-center">
                         <?php
                         $sql3="SELECT * from section5";
                         $result3=mysqli_query($conn,$sql3);
                         $row5=mysqli_fetch_assoc($result3);
                         ?>
                         <h2 id="animate4" class="v"><strong><?=$row5['heading'];?></strong></h2>
                         <h5><?=$row5['sub_heading'];?>
                         </h5>
                     </div>
                 </div>
                 <!-- <div id="carouselExampleIndicator" class="carousel slide" data-ride="carousel">
                     <ol class="carousel-indicators" style="bottom: -30px;">
                         <li data-target="#carouselExampleIndicator" data-slide-to="0" class="active"
                             style="background-color: rgb(38,154,92);"></li>
                         <li data-target="#carouselExampleIndicator" data-slide-to="1"
                             style="background-color: rgb(38,154,92);"></li>
                     </ol>
                     <div class="carousel-inner">
                         <div class="carousel-item active">
                             <div class="row mt-5">
                                 <div class=" col-12">
                                     <div class="row justify-content-center">
                                         <?php
                                         $sql4="SELECT * FROM `section5.2`";
                                         $result4=mysqli_query($conn,$sql4);
                                         for($i=1;$i<=6;$i++){

                                           $row6=mysqli_fetch_assoc($result4);

                                         
                                         
                                          echo '<div class="col-4 col-xl-2">
                                             <img src="assets/'.$row6['image'].'" class="img-fluid mx-auto d-block" alt="">
                                             <p class="text-center text-muted">'.$row6['title'].'</p>
                                         </div>';
                                         };
                                         ?>
                                     </div>
                                 </div>
                             </div>
                         </div>
                          <div class="carousel-item ">
                             <div class="row mt-5">
                                 <div class=" col-12">
                                     <div class="row">
                                         <div class="col-4 col-xl-2">
                                             <img src="assets/product2.png" class="img-fluid mx-auto d-block" alt="">
                                             <p class="text-center text-muted">Premium Weight<br> Loss Formula</p>
                                         </div>

                                         <div class="col-4 col-xl-2"><img src="assets/product3.png"
                                                 class="img-fluid mx-auto my-auto d-block" alt="">
                                             <p class="text-center text-muted">Premium Testosterone<br> Booster Formula
                                             </p>
                                         </div>
                                         <div class="col-4 col-xl-2"><img src="assets/product4.png"
                                                 class="img-fluid mx-auto d-block" alt="">
                                             <p class="text-center text-muted">Premium Muscle<br> Building Formula</p>
                                         </div>
                                         <div class="col-4 col-xl-2"><img src="assets/product6.png"
                                                 class="img-fluid mx-auto my-auto d-block" alt="">
                                             <p class="text-center text-muted">Premium Male<br> Enhancement Formula</p>
                                         </div>
                                         <div class="col-4 col-xl-2"><img src="assets/product2.png"
                                                 class="img-fluid mx-auto d-block" alt="">
                                             <p class="text-center text-muted">Premium Brain<br> Enhancement Formula</p>
                                         </div>
                                         <div class="col-4 col-xl-2"><img src="assets/product4.png"
                                                 class="img-fluid mx-auto d-block" alt="">
                                             <p class="text-center text-muted">Premium Muscle<br> Energy Formula</p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div> 
                     </div>
                     <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicator"
                         data-slide="prev">
                         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                         <span class="sr-only">Previous</span>
                     </button>
                     <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicator"
                         data-slide="next">
                         <span class="carousel-control-next-icon" aria-hidden="true"></span>
                         <span class="sr-only">Next</span>
                     </button>
                 </div> -->
                 <div class="row mt-5 ">
                                 <div class=" col-12">
                                     <div class="row justify-content-center autoplay">
                                         <?php
                                         $sql4="SELECT * FROM `section5.2`";
                                         $result4=mysqli_query($conn,$sql4);
                                         while($row6=mysqli_fetch_assoc($result4)){
                                        
                                          echo '<div class="col-4 col-xl-2">
                                             <img src="assets/'.$row6['image'].'" class="img-fluid mx-auto d-block" alt="">
                                             <p class="text-center text-muted">'.$row6['heading1'].'<br>'.$row6['heading2'].'</p>
                                         </div>';
                                         };
                                         ?>
                                     </div>
                                 </div>
                             </div>
             </div>
         </div>
     </div>
 </body>
 <script type="text/javascript" src="slick/slick.min.js"></script>
<script>
  $('.autoplay').slick({
    dots: true,
    arrows:false,
    infinite: true,
slidesToShow: 5,
slidesToScroll: 1,
autoplay: true,
autoplaySpeed: 2000,
responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

</script>
 <script>
// animation for scrolling window
$(window).scroll(function() {

    // animation for slideDown
    $('#animatedElement').each(function() {
        var imagePos = $(this).offset().top;
        var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow + 250) {
            $(this).addClass("slideDown");
        }
    });

    <?php
  $ssql1="SELECT S4_id FROM section4";
  $sresult1=mysqli_query($conn,$ssql1);
  while($srow1=mysqli_fetch_assoc($sresult1)){
    
  ?>
    // animation for slidUp
    $('#<?php echo $srow1['S4_id'];?>').each(function() {
        var imagePos = $(this).offset().top;
        var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow + 380) {
            $(this).addClass("slideUp");
        }
    });

    <?php
  }?>
    // animation for zoomer
    $('#animate4').each(function() {
        var imagePos = $(this).offset().top;
        var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow + 380) {
            $(this).addClass("zoomer");
        }
    });
});
 </script>
 <?php
  include("footer.php");
  ?>