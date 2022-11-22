<?php
$_SESSION['actives']='act';
$page=3;
include("header.php");
include("db.php");
?>

<body>

    <?php
    $shsql = "SELECT * FROM services_head";
    $shresult = mysqli_query($conn, $shsql);
    $shrow = mysqli_fetch_assoc($shresult);
    ?>
    <div class="container-fluid">
        <div class="row  justify-content-center" style="   background-image: url(assets/<?= $shrow['background']; ?>);
    background-position-x: -294px;
    background-position-y: -55px;">
            <div class="col-sm-12 col-md-6 col-lg-5 text-center t-pad2 slideDown">
                <h1 class="text-head"><strong><?= $shrow['heading1']; ?><br><?= $shrow['heading2']; ?></strong></h1>

                <ol class="breadcrumb mb-0 a-position bg-transparent d-none d-md-flex">
                    <li class="breadcrumb-item"><a href="index.php" class="text-color3">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Services</li>
                </ol>

            </div>
            <div class=" col-sm-12 col-md-6 col-lg-6 pt-2 mt-2 fadeIn">
                <div class="row">
                    <div class="col-5 col-sm-4">
                        <ol class="breadcrumb a1-position mb-0 bg-transparent d-md-none p-0 ">
                            <li class="breadcrumb-item"><a href="index.php" class="text-color3">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Services</li>
                        </ol>
                    </div>
                    <div class="col-7 col-sm-8 col-md-12">
                        <img src="assets/<?= $shrow['image']; ?>" class="img-pad img-fluid float-right tras " alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
              <?php
              $ss1sql="SELECT * FROM service_section";
              $ss1result=mysqli_query($conn,$ss1sql);
              $ss1row=mysqli_fetch_assoc($ss1result);
              ?>
    <div class="container pt-5 mt-3 pb-5 v " id="animatedElement">
        <div class="row justify-content-center ">
            <div class="col-12">
                <?= $ss1row['content']; ?>
                </div>
                </div>
        </div>

    <div class="container-fluid">
        <div class="row justify-content-center" style="background-image: url(assets/<?= $ss1row['background']; ?>);">
            <div class="col-9 text-center text-white mt-2 pt-4 pb-4">




                <h3><strong><?= $ss1row['heading1']; ?></strong></h3>
                <h6><?= $ss1row['description1']; ?></h6>
            </div>
        </div>
        <div class="row bg7">
            <div class="container v" id="animatedElement1">
                <div class="row  justify-content-center text-center  " style="    transform: translateY(30px);">
                    <?php
                    $ss3sql = "SELECT * FROM `section3`";
                    $ss3result = mysqli_query($conn, $ss3sql);
                    while ($ss3row = mysqli_fetch_assoc($ss3result)) {
                        echo ' <div class=" col-10 col-sm-11 col-md-6 col-lg-4 border pt-4 pb-4 bg-light card1">
                        <div class="row justify-content-center mb-1">
                        <div class="col-6">
                         <div class="text-center">
                           <img src="assets/'. $ss3row['logo'].'" style="width: 60px ;" alt=""></div> 
                        </div>
                      </div>
                <h5><b>' . $ss3row['heading'] . '</b></h5>
                <p class="text-muted fsize1">' . $ss3row['description'] . '</p>
                <a href="' . $ss3row['link'] . '" class="btn  pl-3 pr-3 rounded-pill card-btn1" role="button">' . $ss3row['link_name'] . '</a>
            </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-5 pb-5 " style=" background-image: url(assets/<?= $ss1row['background']; ?>);
    background-size: cover;
    background-position: center;">
        <div class="row  justify-content-center pt-2 mb-4 mt-4 v" id="animatedElement2">
            <div class="col-9 text-white text-center">
                <h2><strong><?= $ss1row['heading']; ?></strong></h2>
                <h5><?= $ss1row['description']; ?></h5>
            </div>
        </div>
    </div>
    <div class="container-fluid bg13 pb-3">
        <div class="container ">
            <div class="row bg-white " style="transform: translateY(-45px);">
                <div class="col-12 px-5 pb-4 mb-2 v" id="animatedElement3">
                <?php
                    if(isset($_POST['submit'])){
                      $fname = $_POST['fname'];
                      $lname = $_POST['lname'];
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
                                <input type="text" name="fname" class="form-control hig" placeholder="First name*" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="lname" class="form-control hig" placeholder="Last name*"  required>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 mb-3">
                                <input type="email" name="email" class="form-control hig" placeholder="Email*"  required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="number" name="number" class="form-control hig" placeholder="Phone Number*"  required>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="company" class="form-control hig" placeholder="Company Name*"  required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <select class="form-control opt-text hig" name="producttype"  required>
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
                            <textarea class="form-control hig" style="background-color: whitesmoke;" id="exampleFormControlTextarea1" rows="4" placeholder="Your Message" name="message"></textarea>
                        </div>
                        <?php
                      $pfbsql="SELECT * FROM product_formbtn";
                      $pfbresult=mysqli_query($conn,$pfbsql);
                      $pfbrow=mysqli_fetch_assoc($pfbresult);
                      ?>
                        <div class="text-center"><button type="submit" name="submit" class="btn btnlable2 btn-lg shadow " role="button" aria-pressed="true">
                                <h4><span class="f1-m"><?= $pfbrow['heading1'];?>  </span> <br class="m-only"><span class="f2-m"><?= $pfbrow['heading2'];?> </span></h4>
                            </button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(window).scroll(function() {
        $('#animatedElement').each(function() {
            var imagePos = $(this).offset().top;
            var topOfWindow = $(window).scrollTop();
            if (imagePos < topOfWindow + 450) {
                $(this).addClass("zoomer");
            }
        });
        $('#animatedElement1').each(function() {
            var imagePos = $(this).offset().top;
            var topOfWindow = $(window).scrollTop();
            if (imagePos < topOfWindow + 450) {
                $(this).addClass("slideDown");
            }
        });
        $('#animatedElement2').each(function() {
            var imagePos = $(this).offset().top;
            var topOfWindow = $(window).scrollTop();
            if (imagePos < topOfWindow + 450) {
                $(this).addClass("zoomer");
            }
        });
        $('#animatedElement3').each(function() {
            var imagePos = $(this).offset().top;
            var topOfWindow = $(window).scrollTop();
            if (imagePos < topOfWindow + 450) {
                $(this).addClass("zoomer");
            }
        });
    });
</script>
<?php include("footer.php"); ?>