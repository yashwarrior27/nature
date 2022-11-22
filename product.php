<?php
$_SESSION['activep']='act';
$page=2;
include("header.php");
include("db.php");
?>
<body>
  <?php
  $phsql="SELECT *FROM product_head";
  $phresult=mysqli_query($conn,$phsql);
  $phrow=mysqli_fetch_assoc($phresult);
  ?>
      <!-- first section contact head -->
      <div class="container-fluid">
        <div class="row  justify-content-center" style="  background-image: url(assets/<?=
        $phrow['background'];?>);
        background-size: cover;
    background-position: center;
        
   ">
         <div class="col-6 col-sm-5 col-md-6 col-lg-6 text-center t-pad1 slideDown">
            <h2 class="text-white f2-2size"><?=
        $phrow['heading1'];?><br class="br1"> <?=
        $phrow['heading2'];?></h2>
            <h1 class="text-head f1-1size"><strong><?=
        $phrow['heading3'];?><br class="br1"> <?=
        $phrow['heading4'];?></strong></h1>
           
           
              <ol class="breadcrumb a-position bg-transparent mb-0">
                <li class="breadcrumb-item"><a href="index.php" class="text-color3">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
              </ol>
            
         </div>
         <div class= "col-6 col-sm-7 col-md-6 col-lg-5 pt-2 fadeIn">
             <img src="assets/<?=
        $phrow['image'];?>" class="img-pad img-fluid tras " alt="">
         </div>
        </div>
    </div>
    <?php
              $ps1sql="SELECT * FROM `product_section`";
              $ps1result=mysqli_query($conn,$ps1sql);
              $ps1row=mysqli_fetch_assoc($ps1result);
              ?>
    <div class="container pt-5 pb-1 mb-2">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center">
             
                <h3><?= $ps1row['heading1'];?></h3>
                <h2><strong><?= $ps1row['heading2'];?></strong></h2>
            </div>
        </div>
        <div class="row mt-3 mb-5 v " style="justify-content:space-evenly ;" id="animatedElement">
         <?php
         $ps1bsql="SELECT * FROM `product_section1.2`";
         $ps1bresult=mysqli_query($conn,$ps1bsql);

         while($ps1brow=mysqli_fetch_assoc($ps1bresult)){
           echo '<div class=" col-md-5 col-lg-2 text-center  text-white m-2   padp ">
           <a href="'.$ps1brow['plink'].'" class="text-white"><div class=" p-img img-div" style="background-image: url(assets/'.$ps1brow['image'].'); background-position: center; background-size: cover;"><span class="img-span"> <strong>'.$ps1brow['heading'].'</strong></span></div></a>
          </div> ';
         }
         ?>
         </div>
         </div>
         <div class="container-fluid bg13">
          <div class="container pt-5 pb-5">
            <div class="row pt-3 pb-3">
              <div class="col-12 text-center text-break">
               
               <?= $ps1row['content'];?>
               
              </div>
            </div>
          </div>

           </div>
           <div class="container-fluid">
             <div class="row  bg15">
               <div class="col-md-6 pt-4 v" id="animatedElement1">
                 <div class="d-flex justify-content-around">
                   <?php
                   $ps3sql="SELECT * FROM product_section3";
                   $ps3result=mysqli_query($conn,$ps3sql);
                   while($ps3row=mysqli_fetch_assoc($ps3result)){
                   ?>
                    <img src="assets/<?=$ps3row['image']; ?>" class="img-fluid" alt="">
                    <?php  } ?>
                    </div>
               </div>
               <div class="col-md-6 text-white pt-4 pt-md-2">
                 
                <h2 class="text-center "><?= $ps1row['heading3'];?></h2>
                <p class="text-center"><?= $ps1row['heading4'];?></p>
               </div>
             </div>
           </div>
          <div class="container-fluid mb-lg-3 pb-4">
            <div class="row justify-content-center">
              <div class="col-11 col-lg-6 mt-3 mt-lg-0 p-0 order-1 order-lg-0 ">
                
                <div class="row">
                  <div class="col-6 col-lg-12">
                <img src="assets/prod-triangle.png" class="img-fluid" alt="">
              </div>

                <div class=" col-6 col-lg-10 img-po v" id="animatedElement2"><img src="assets/<?= $ps1row['image'];?>" class="img-fluid "  alt=""></div>
                </div>
              </div>
              <div class="col-lg-6 order-0 order-lg-1">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-xl-8">
                    <?php
                    if(isset($_POST['submit'])){
                      $fname = $_POST['firstname'];
                      $lname = $_POST['lastname'];
                      $email = $_POST['email'];
                      $num = $_POST['number'];
                      $company = $_POST['company'];
                      $ptype = $_POST['producttype'];
                      $message = $_POST['message'];

                     $pfsql="INSERT INTO `product_form`(`first_name`, `last_name`, `email`, `phone_no`, `company_name`, `product_type`, `message`) VALUES ('$fname',' $lname','$email','$num','$company','$ptype','$message') ";
                     $pfresult=mysqli_query($conn,$pfsql);

                    }
                    ?>
                    <form method="post">
                      <div class="row mt-4 ">
                        <div class="col-md-6 mb-3">
                          <input type="text" class="form-control hig" name="firstname" placeholder="First name*" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <input type="text" class="form-control hig" name="lastname" placeholder="Last name*" required>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6 mb-3">
                          <input type="email" class="form-control hig" name="email" placeholder="Email*" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <input type="number" class="form-control hig" name="number" placeholder="Phone Number*" required>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6 mb-3">
                          <input type="text" class="form-control hig" name="company" placeholder="Company Name*" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <select class="form-control opt-text hig" name="producttype">
                            <option >-Select product type-</option>
                            <option value="Formula">Formula</option>
                            <option value="Capsule Customization">Capsule Customization</option>
                            <option value="Supplement Product Styles">Supplement Product Styles</option>
                            <option value="Visual Design">Visual Design</option>
                            <option value="Product Fulfillment">Product Fulfillment</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <textarea class="form-control hig" name="message" style="background-color: whitesmoke;" id="exampleFormControlTextarea1" rows="4" placeholder="Your Message"></textarea>
                      </div>
                      <?php
                      $pfbsql="SELECT * FROM product_formbtn";
                      $pfbresult=mysqli_query($conn,$pfbsql);
                      $pfbrow=mysqli_fetch_assoc($pfbresult);
                      ?>
                      <div class="text-center"><button type="submit" name="submit" class="btn btnlable2 btn-lg shadow "><h4><span class="f1-m"><?= $pfbrow['heading1'];?> </span> <br class="m-only"><span class="f2-m"><?= $pfbrow['heading2'];?></span></h4></button></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
         </body>
         <script>
          $(window).scroll(function() {
           $('#animatedElement').each(function(){
           var imagePos = $(this).offset().top;
           var topOfWindow = $(window).scrollTop();
          if (imagePos < topOfWindow+450) {
           $(this).addClass("slideUp");
           }
         });
         $('#animatedElement1').each(function(){
           var imagePos = $(this).offset().top;
           var topOfWindow = $(window).scrollTop();
          if (imagePos < topOfWindow+450) {
           $(this).addClass("slideUp");
           }
         });
         $('#animatedElement2').each(function(){
           var imagePos = $(this).offset().top;
           var topOfWindow = $(window).scrollTop();
          if (imagePos < topOfWindow+450) {
           $(this).addClass("zoomer");
           }
         });
          });
          </script>
          <?php
          include("footer.php");
          ?>