<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/corano/corano/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:05 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Chi tiết bài viết</title>
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
    overflow: hidden; /* Đảm bảo ảnh không bị tràn */
    border-radius: 10px; /* Bo góc mềm mại */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Hiệu ứng bóng */
    width: 90%; /* Giảm kích thước ảnh xuống còn 90% khung chứa */
    margin: 0 auto; /* Căn giữa nếu ảnh nhỏ hơn khung */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Hiệu ứng mượt */
}

.blog-thumb:hover {
    transform: scale(1.05); /* Zoom nhẹ khi hover */

}

.blog-thumb img {
    width: 100%; /* Đảm bảo ảnh luôn vừa khung container */
    height: auto; /* Duy trì tỷ lệ gốc */
    border-radius: 10px; /* Đồng nhất với container */
}
.entry-summary {
    max-width: 1200px; /* Giới hạn chiều rộng để phần nội dung không quá dài */
    margin: 0 auto; /* Căn giữa toàn bộ phần nội dung */
    padding: 20px; /* Tạo khoảng cách giữa nội dung và khung */
    text-align: left; /* Văn bản vẫn căn trái */
}

.entry-summary p {
    line-height: 1.8; /* Tăng khoảng cách giữa các dòng để dễ đọc */
    margin-bottom: 15px; /* Tạo khoảng cách dưới đoạn văn */
}

.tag-line, .blog-share-link {
    margin-top: 20px; /* Thêm khoảng cách giữa các phần tag và chia sẻ */
}

.blog-social-icon a {
    margin-right: 10px; /* Khoảng cách giữa các biểu tượng mạng xã hội */
    color: #333; /* Màu biểu tượng mặc định */
    transition: color 0.3s ease; /* Hiệu ứng khi hover */
}

.blog-social-icon a:hover {
    color: #007bff; /* Đổi màu biểu tượng khi hover */
}





    </style>


</head>

<body>
    <!-- Start Header Area -->
     <?php require_once "views/layout/header.php" ?>


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
                                    <li class="breadcrumb-item"><a href="blog-left-sidebar.html">Bài viết</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chi tiết bài viết</li>
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

                    <div class="col-lg-12 order-1">
                        <div class="blog-item-wrapper">
                            <!-- blog post item start -->
                            <div class="blog-post-item blog-details-post">
                                <h3 class="blog-title text-center mb-30">
                                        <?= $tinTuc["tieu_de"] ?>
                                    </h3>
                                <figure class="blog-thumb">
                                    <div class="blog-carousel-2 slick-row-15 slick-arrow-style slick-dot-style">
                                        <div class="blog-single-slide">
                                            <img src="<?= BASE_URL . $tinTuc["hinh_anh"]?>" alt="blog image">
                                        </div>
                                    
                                    </div>
                                </figure>
                                <div class="blog-content">
                                 
                                    
                                    <div class="entry-summary">
                                        <div class="blog-meta">
                                        <p><?= date("Y-m-d", strtotime($tinTuc["ngay_tao"])) ?> | <a href="#">KignManga</a></p>
                                    </div>
                                        <p> <?= $tinTuc['noi_dung']?></p>
                                        <div class="tag-line">
                                            <h6>Tag :</h6>
                                            <a href="#">KingManga</a>

                                        </div>
                                        <div class="blog-share-link">
                                            <h6>Share :</h6>
                                            <div class="blog-social-icon">
                                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                                <a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a>
                                                <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- blog post item end -->




                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog main wrapper end -->
    </main>





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


<!-- Mirrored from htmldemo.net/corano/corano/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:06 GMT -->
</html>