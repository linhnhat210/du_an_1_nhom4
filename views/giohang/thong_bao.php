<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thanh Toán</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/KMT.png">

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="assets/css/vendor/pe-icon-7-stroke.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="assets/css/plugins/jqueryui.min.css">
    <!-- main style css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Main Content -->
        <!-- Start Header Area -->
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . "/base_du_an_1/views/layout/header.php";
        ?>  
   
   
   
   
   <div class="container text-center mt-5">
        <div class="alert" role="alert" style="background-color : #ffecce;">
            <h1>🎉 ĐẶT HÀNG THÀNH CÔNG ! 🎉</h1>
            <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi.</p>
            <p class="mb-0">Mã đơn hàng của bạn là: <strong><?= $don_hang["ma_don_hang"] ?></strong></p>
            <hr>
            <div class="d-flex justify-content-around">
    
                <a href="?act=/" class="btn btn-sqr"  style="margin-left: 250px">Quay về trang chủ</a>
                <a href="?act=chi-tiet-don-hang&don_hang_id=<?=$don_hang['id']?>" class="btn btn-sqr" style="margin-right: 250px">Xem chi tiết đơn hàng</a>
            </div>
        </div>
    </div>
    <br>
 <?php require_once 'views/layout/footer.php'; ?>
         <!-- Mini cart -->
      <?php require_once "./views/layout/cart.php"; ?>


        <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="assets/js/plugins/countdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <!-- jquery UI JS -->
    <script src="assets/js/plugins/jqueryui.min.js"></script>
    <!-- Image zoom JS -->
    <script src="assets/js/plugins/image-zoom.min.js"></script>
    <!-- Images loaded JS -->
    <script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <!-- mail-chimp active js -->
    <script src="assets/js/plugins/ajaxchimp.js"></script>
    <!-- contact form dynamic js -->
    <script src="assets/js/plugins/ajax-mail.js"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="assets/js/plugins/google-map.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>


</body>

</html>
