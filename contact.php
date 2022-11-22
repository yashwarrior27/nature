<?php
$_SESSION['activec']='act';
$page=5;
include("header.php");
include("db.php");
?>
<body>
  <!-- first section contact head -->
    <div class="container-fluid">
        <?php
        $chsql="SELECT * FROM contact_head";
        $chresult=mysqli_query($conn,$chsql);
        $chrow=mysqli_fetch_assoc($chresult);
        
        ?>
        <div class="row  justify-content-center" style=" background-image: url(assets/<?= $chrow['background'];?>);
    background-size: cover;
    background-position: center;">
         <div class="col-6 col-sm-5 col-md-6 col-lg-6 text-center t-pad slideDown">
            <h2 class="text-white f2size"><?= $chrow['heading1'];?></h2>
            <h1 class="text-head f1size"><strong><?= $chrow['heading2'];?></strong></h1>
           
            <ol class="breadcrumb mb-0 a-position bg-transparent ">
              <li class="breadcrumb-item"><a href="index.php" class="text-color3">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Contact</li>
            </ol>
         </div>
         <div class= "col-6 col-sm-7 col-md-6 col-lg-5 pt-2 fadeIn">
             <img src="assets/<?= $chrow['image'];?>" class="img-pad img-fluid " alt="">
         </div>
        </div>
    </div>
    <!-- second section contact form -->
    <div class="container">
        <?php
         $cs1sql="SELECT * FROM `footer`";
         $cs1result=mysqli_query($conn,$cs1sql);
         $cs1row=mysqli_fetch_assoc($cs1result);
        ?>
      <div class="row">
        <div class="col-md-6 col-lg-4 mt-5 pb-2 textal v text-break" id="animatedElement1">
        <h4 ><strong>CONTACT INFO</strong></h4>
          <div class="hrw"><hr class="hr1"></div>
          <h5>Connect with a team member here at Nutras Private Label for inquiries, comments, or suggestions.</h5>
          <?= $cs1row['content'];  ?>
          
        </div>
        <div class="col-md-6 col-lg-8 form-position bg-white pt-5 border shadow v" id="animatedElement">
          <h4 class="text-center"><strong>MESSAGE US</strong></h4>
          <hr class="hr1">
          <?php
          if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['number'];
            $company=$_POST['company'];
            $message=$_POST['message'];
            $cs1bsql="INSERT INTO contact_us(name,email,phone_no,company_name,message) VALUES('$name','$email',$phone,'$company','$message') ";
            $cs1bresult=mysqli_query($conn,$cs1bsql);
          

          }
          ?>         
              

          <form method="post">
            <div class="row mt-4 ">
              <div class="col-lg-6 mb-3">
                <input type="text" name="name" class="form-control hig" placeholder="First name*"  required>
              </div>
              <div class="col-lg-6 mb-3">
                <input type="email" name="email" class="form-control hig" placeholder="Email*"  required>
              </div>
            </div>
            <div class="row ">
              <div class="col-lg-6 mb-3">
                <input type="number" name="number" class="form-control hig" placeholder="Phone number*"  required>
              </div>
              <div class="col-lg-6 mb-3">
                <input type="text" name="company" class="form-control hig" placeholder="Company name*"  required>
              </div>
            </div>
            <div class="form-group">
              <textarea class="form-control hig" name="message" style="background-color: whitesmoke;" id="exampleFormControlTextarea1" rows="4" placeholder="Your Message"></textarea>
            </div>
            <div class="mt-2" style="text-align: end;"><button type="submit" name="submit" class="btn btn-dark pl-3 pr-3"><b>SEND</b></button></div>
          </form>

        </div>
      </div>
    </div>
    <!--third section background -->
    <div class="container-fluid">
      <div class="row bg11">
      </div>
    </div>
</body>
<script>
    $(window).scroll(function() {
   $('#animatedElement').each(function(){
   var imagePos = $(this).offset().top;
   var topOfWindow = $(window).scrollTop();
   if (imagePos < topOfWindow+450) {
   $(this).addClass("zoomer");
   }
   });
   $('#animatedElement1').each(function(){
   var imagePos = $(this).offset().top;
   var topOfWindow = $(window).scrollTop();
   if (imagePos < topOfWindow+450) {
   $(this).addClass("zoomer");
   }
   });
   
    });
    </script>
    <?php include("footer.php"); ?>