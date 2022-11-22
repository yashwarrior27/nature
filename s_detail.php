<?php
include("db.php");
$id=$_GET['id'];
$spsql="SELECT * FROM section3 JOIN service_product ON section3.S3_id = service_product.service_id WHERE section3.S3_id=$id";
$spresult=mysqli_query($conn,$spsql);
$sprow=mysqli_fetch_assoc($spresult);
$a=$sprow['S3_id'];
$p=$sprow['pagename'];
$ac=$a;
include("header.php");


?>

<body>
   
    <div class="container-fluid " style="background-image: url(assets/<?= $sprow['background']; ?>);
    background-size: cover;
    background-position: center;">
        <div class="container">
            <div class="row  ">
                <div class="col-sm-12 col-md-6 col-lg-5 text-center t-pad2 slideDown" style="padding-bottom: 76px;">
                    <h2 class="text-white"><?= $sprow['heading1']; ?></h2>
                    <h1 class="text-head"><strong><?= $sprow['heading2']; ?></strong></h1>

                    <ol class="breadcrumb mb-0 a-position bg-transparent d-none d-md-flex">
                        <li class="breadcrumb-item"><a href="index.php" class="text-color3">Home</a></li>
                        <li class="breadcrumb-item"><a href="service.php" class="text-color3">Services</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <?= $sprow['pagename']; ?></li>
                    </ol>

                </div>
                <div class=" col-sm-12 col-md-6 col-lg-6 pt-2 mt-2 fadeIn">
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <ol class="breadcrumb a1-position mb-0 bg-transparent d-md-none p-0 ">
                                <li class="breadcrumb-item"><a href="index.php" class="text-color3">Home</a></li>
                                <li class="breadcrumb-item"><a href="service.php" class="text-color3">Services</a></li>
                                <li class="breadcrumb-item active text-white" aria-current="page"><?= $sprow['pagename']; ?></li>
                            </ol>
                        </div>
                        <div class="col-7 col-sm-8 col-md-12">
                            <div class="text-center "><img src="assets/<?= $sprow['image1']; ?>" class=" img-fluid pb-3" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-5 ">
        <div class="row">
            <div class="col-sm-8 nzsx order-1 order-lg-0 text-break v" id="animatedElement2">
            <?= $sprow['content']; ?>
            </div>
            <div class="col-sm-4 col-lg-4  order-0 order-lg-1 v">
                <img src="assets/<?= $sprow['image2']; ?>" alt="" class="img-fluid pt-5 pb-3  mx-auto d-block " id="animatedElement">
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-12 v" id="animatedElement1">
                
            </div>
        </div> -->
    </div>
    <div class="container-fluid bg18 pt-3 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center text-white pt-3 pb-4 " id="animatedElement3">
                <h2><strong><?= $sprow['heading3']; ?></strong></h2>
                <h5><?= $sprow['heading4']; ?></h5>
            </div>
        </div>
    </div>
    <div class="container-fluid bg13 pb-3">
        <div class="container ">
            <div class="row bg-white  " style="    transform: translateY(-45px);">
                <div class="col-12 px-5 pb-4 mb-2 v " id="animatedElement4">
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
                                <input type="text" name="lname" class="form-control hig" placeholder="Last name*" required>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 mb-3">
                                <input type="email" name="email" class="form-control hig" placeholder="Email*" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="number" name="number" class="form-control hig" placeholder="Phone Number*" required>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="company" class="form-control hig" placeholder="Company Name*" required>
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
<script>
    $(window).scroll(function() {
        $('#animatedElement').each(function() {
            var imagePos = $(this).offset().top;
            var topOfWindow = $(window).scrollTop();
            if (imagePos < topOfWindow + 450) {
                $(this).addClass("slideDown");
            }
        });
        $('#animatedElement1').each(function() {
            var imagePos = $(this).offset().top;
            var topOfWindow = $(window).scrollTop();
            if (imagePos < topOfWindow + 450) {
                $(this).addClass("slideUp");
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
                $(this).addClass("bounceIn");
            }
        });
        $('#animatedElement4').each(function() {
            var imagePos = $(this).offset().top;
            var topOfWindow = $(window).scrollTop();
            if (imagePos < topOfWindow + 450) {
                $(this).addClass("zoomer");
            }
        });
    });
</script>
<?php
include("footer.php");
?>