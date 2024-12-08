<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/corano/corano/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:01 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tài khoản của tôi</title>
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
    <?php require_once './views/layout/header.php' ?>


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
                                    <li class="breadcrumb-item active" aria-current="page">my-account</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- my account wrapper start -->
        <div class="my-account-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- My Account Page Start -->
                            <div class="myaccount-page-wrapper">
                                <!-- My Account Tab Menu Start -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="myaccount-tab-menu nav" role="tablist">
                                            <a href="?act=my-account"><i class="fa fa-user"></i>
                                                Thông tin cá nhân</a>
                                            <a href="#orders"  class="active"><i class="fa fa-cart-arrow-down"></i>
                                                Lịch sử mua hàng</a>
                                            <a href="?act=doi-mat-khau"><i class="fa fa-user"></i> Đổi mật khẩu</a>
                                           
                                        </div>
                                    </div>
                                    <!-- My Account Tab Menu End -->

                                    <!-- My Account Tab Content Start -->
                                    <div class="col-lg-9 col-md-8">
                                        <div class="tab-content" id="myaccountContent">
                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                                  <div class="myaccount-content">
                                                    <h5>Đơn hàng</h5>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Mã đơn hàng</th>
                                                                    <th>Ngày đặt</th>
                                                                    <th>Thành tiền</th>
                                                                    <th>Trạng thái</th>
                                                                    <th>Thao tác</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody> 
                                                            <?php foreach ($donHang as $key => $donHang) : ?>
                                                                <tr>
                                                                <td><?= $key + 1 ?></td>
                                                                <td><?= $donHang['ma_don_hang'] ?></td>
                                                                <td><?= $donHang['ngay_dat'] ?></td>
                                                                
                                                                <td><?= formatPrice($donHang['tong_don_hang']). 'đ' ?></td> 
                                                                <td> <?php
                                                            if ($donHang["trang_thai_id"] >= 1 &&  $donHang["trang_thai_id"] <= 5){
                                                            ?>
                                                            <span class="badge bg-primary"><?= $donHang["ten_trang_thai"]?></span>
                                                            <?php
                                                            }elseif($donHang["trang_thai_id"] == 6 ){
                                                            ?>
                                                            <span class="badge bg-danger"><?= $donHang["ten_trang_thai"]?></span>
                                                            <?php } elseif($donHang["trang_thai_id"] == 7 ){
                                                            ?>
                                                            <span class="badge bg-warning"><?= $donHang["ten_trang_thai"]?></span>
                                                            <?php }else{
                                                            ?>
                                                            <span class="badge bg-success"><?= $donHang["ten_trang_thai"]?></span>
                                                            <?php } 
                                                            ?></td>
                                                                 <td><a href="?act=chi-tiet-don-hang&don_hang_id=<?=$donHang['id']?>" class="btn btn-sqr">View</a>
                                                                </tr>
                                                            <?php endforeach ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
               
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                         
                                            </div>
                                            <!-- Single Tab Content End -->


                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                             
                                            </div> <!-- Single Tab Content End -->
                                        </div>
                                    </div> <!-- My Account Tab Content End -->
                                </div>
                            </div> <!-- My Account Page End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
    <?php require_once './views/layout/footer.php'; ?>
    <!-- footer area end -->
     <script>
    function updateAvatarPreview(event) {
        const fileInput = event.target; // Input file
        const file = fileInput.files[0]; // Lấy file đã chọn
        const preview = document.querySelector('.avatar'); // Ảnh đại diện hiện tại

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result; // Hiển thị ảnh mới ngay lập tức
            };
            reader.readAsDataURL(file); // Đọc nội dung file dưới dạng URL base64
        }
    }
</script>

    

  
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


<!-- Mirrored from htmldemo.net/corano/corano/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:01 GMT -->
</html>