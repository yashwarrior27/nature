<?php
$_SESSION['activea']='act';
$page=4;
include("header.php");
include("db.php");
?>

<body>
    <?php
    $ahsql = "SELECT * FROM about_head";
    $ahresult = mysqli_query($conn, $ahsql);
    $ahrow = mysqli_fetch_assoc($ahresult);
    ?>
    <!-- first section contact head -->
    <div class="container-fluid">
        <div class="row  justify-content-center" style="background-image: url(assets/<?= $ahrow['background'] ?>);
    background-size: cover;
    background-position: center;">
            <div class=" col-md-5 col-lg-6 col-xl-5 text-center slideDown ">
                <div class="padt ">
                    <h1 class="text-head f3size mb-3"><strong><?= $ahrow['heading1'] ?></strong></h1>
                    <h2 class="text-white f4size"><?= $ahrow['heading2'] ?></h2>
                </div>

                <ol class="breadcrumb mb-0 a-position bg-transparent d-none d-md-flex">
                    <li class="breadcrumb-item"><a href="index.php" class="text-color3">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
            </div>
            <div class=" col-md-7 col-lg-6 col-xl-5 pt-2 fadeIn">
                <div class="text-center "><img src="assets/<?= $ahrow['image'] ?>" class=" img-fluid " alt=""></div>

                <ol class="breadcrumb a-position mb-0 bg-transparent d-md-none ">
                    <li class="breadcrumb-item"><a href="index.php" class="text-color3">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">About</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container pt-3 pb-3 v" id="animatedElement">
    <?php
    $assql = "SELECT * FROM about_section";
    $asresult = mysqli_query($conn, $assql);
    $asrow = mysqli_fetch_assoc($asresult);
    ?>
        <div class="row pb-5">
            <div class="col-12 text-center text-break">
             <?= $asrow['content']; ?>
            </div>
        </div>
    </div>
    <div class="container-fluid bg13 pt-5 pb-5 ">
        <div class="container pb-5 pt-3 ">
            <div class="row justify-content-center">
                <div class="col-md-9 text-center v" id="animatedElement1">

                    <h4><strong><?= $asrow['heading1'] ?></strong></h4>
                    <hr class="hr1">
                </div>
            </div>
            <div class="row justify_content_center">
            <?php
              $as2bsql = "SELECT * FROM `about_section2.2`";
              $as2bresult = mysqli_query($conn, $as2bsql);
              while($as2brow = mysqli_fetch_assoc($as2bresult)){
            ?>
                <div class="col-md-6 col-xl-4 about-body ">
                    <img src="assets/<?= $as2brow['image'] ?>" class="img-fluid mb-2" alt="">
                    <h5><?= $as2brow['heading'] ?></h5>
                    <p><?= $as2brow['description'] ?></p>
                </div>

                <?php } ?>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 text-center v" id="animatedElement2">
                    <h5><strong><?= $asrow['heading2'] ?></strong></h5>
                    <a href="<?= $asrow['btnlink'] ?>" class="btn btnlable2 btn-lg shadow " role="button" aria-pressed="true">
                        <h4><span class="f1-m"><?= $asrow['btnname1'] ?> </span> <br class="m-only"><span class="f2-m"><?= $asrow['btnname2'] ?></span></h4>
                    </a>
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
                $(this).addClass("zoomer");
            }
        });
        $('#animatedElement2').each(function() {
            var imagePos = $(this).offset().top;
            var topOfWindow = $(window).scrollTop();
            if (imagePos < topOfWindow + 450) {
                $(this).addClass("zoomer");
            }
        });

    });
</script>
<?php include("footer.php") ?>