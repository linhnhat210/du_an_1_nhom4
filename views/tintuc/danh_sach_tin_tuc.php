<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/corano/corano/blog-grid-full-width.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:05 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bài viết</title>
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
    <style>
        .blog-thumb {
    position: relative;
    width: 100%; /* Ảnh chiếm toàn bộ chiều rộng */
    padding-bottom: 56.25%; /* Tỷ lệ 16:9 (9/16 = 0.5625) */
    overflow: hidden;
    background-color: #f0f0f0; /* Màu nền dự phòng */
    border-radius: 3px; /* Bo góc nếu cần */
}

.blog-thumb img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* Đảm bảo hình ảnh đẹp, không bị méo */
}
    </style>

</head>

<body>
<?php require_once "views/layout/header.php"?>

    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Bài Viết</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- blog main wrapper start -->
        <div class="blog-main-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="blog-item-wrapper">
                            <!-- blog item wrapper end -->
                            <div class="row mbn-30">
                                <?php foreach($tinTucs as $tinTuc): ?>
                                <div class="col-md-6">
                                    <!-- blog post item start -->
                                    <div class="blog-post-item mb-30">
                                        <figure class="blog-thumb">
                                            <a href="?act=chi-tiet-tin-tuc&id=<?= $tinTuc["id"]?>">
                                                <img src="<?=BASE_URL . $tinTuc['hinh_anh']?>" alt="blog image">
                                            </a>
                                        </figure>
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <p><?= date("Y-m-d", strtotime($tinTuc["ngay_tao"])) ?> | <a href="#">KingManga</a></p>
                                            </div>
                                            <h4 class="blog-title">
                                                <a href="?act=chi-tiet-tin-tuc&id=<?= $tinTuc["id"]?>" class="text-center"><?= $tinTuc["tieu_de"] ?></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!-- blog post item end -->
                                </div>
                                <?php endforeach; ?>

                            </div>
                            <!-- blog item wrapper end -->

                            <!-- start pagination area -->
                            <div class="paginatoin-area text-center">
                                <ul class="pagination-box">
                                    <li><a class="previous" href="#"><i class="pe-7s-angle-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a class="next" href="#"><i class="pe-7s-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <!-- end pagination area -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog main wrapper end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->





<?php require_once "views/layout/footer.php" ?>

    <!-- JS
============================================ -->

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


<!-- Mirrored from htmldemo.net/corano/corano/blog-grid-full-width.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:05 GMT -->
</html>