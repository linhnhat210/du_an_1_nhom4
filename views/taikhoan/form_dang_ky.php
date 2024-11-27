<!doctype html>
<html class="no-js" lang="zxx">

<head>
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Đăng Ký</title>
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
            <?php
        require_once "./views/layout/header.php";
        ?>  


    <!-- Main Content -->
        <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="?act=/"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- login register wrapper start -->
    <div class="login-register-wrapper section-padding d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="container">
            <div class="member-area-from-wrap">
                <div class="row justify-content-center">
                            <div class="login-reg-form-wrap sign-up-form">
                                <h5>Đăng ký</h5>
                                <form action="?act=post-dang-ky" method="post">
                                         <div class="row">
                                             <div class="col-lg-6">
                                                 <div class="single-input-item">
                                                      <label for="citynameInput" class="form-label">Email</label>
                                             <input type="email" placeholder="Vui lòng nhập Email" name="email"  />
                                             <span class="text-danger">
                                                 <?= !empty($_SESSION["errors"]["email"]) ?  $_SESSION["errors"]["email"] : '' ?>
                                             </span>
                                         </div>
                                             </div>
                                        <div class="col-lg-6">
                                          <div class="single-input-item">
                                            <label for="citynameInput" class="form-label">Họ và tên</label>
                                        <input type="text" placeholder="Nhập họ và tên" name="ten_nguoi_dung"  />
                                        <span class="text-danger">
                                            <?= !empty($_SESSION["errors"]["ten_nguoi_dung"]) ?  $_SESSION["errors"]["ten_nguoi_dung"] : '' ?>
                                        </span>
                                    </div>
                                        </div>
                                    </div>
                                         <div class="row">
                                        <div class="col-lg-6">

                                         <div class="single-input-item">
                                            <label for="citynameInput" class="form-label">Số điện thoại</label>
                                        <input type="number" placeholder="Vui lòng số điện thoại" name="sdt"  />
                                        <span class="text-danger">
                                            <?= !empty($_SESSION["errors"]["sdt"]) ?  $_SESSION["errors"]["sdt"] : '' ?>
                                        </span>
                                    </div>
                                        </div>
                                        <div class="col-lg-6">
                                           <div class="single-input-item">
                                            <label for="citynameInput" class="form-label">Địa chỉ</label>
                                        <input type="text" placeholder="Vui lòng nhập địa chỉ"  name="dia_chi" />
                                        <span class="text-danger">
                                            <?= !empty($_SESSION["errors"]["dia_chi"]) ?  $_SESSION["errors"]["dia_chi"] : '' ?>
                                        </span>
                                    </div>
                                        </div>
                                    </div>
                                         <div class="row">
                                        <div class="col-lg-6">

                                         <div class="single-input-item">
                                            <label for="citynameInput" class="form-label">Giới tính</label>
                                        <select name="gioi_tinh">
                                                            <option selected value="Nam">Nam</option>
                                                            <option value="Nữ">Nữ</option>
                                                        </select>
                                        <span class="text-danger">
                                            <?= !empty($_SESSION["errors"]["gioi_tinh"]) ?  $_SESSION["errors"]["gioi_tinh"] : '' ?>
                                        </span>
                                    </div>
                                        </div>
                                        <div class="col-lg-6">
                                           <div class="single-input-item">
                                            <label for="citynameInput" class="form-label">Ngày sinh</label>
                                        <input type="date"   name="ngay_sinh" />
                                        <span class="text-danger">
                                            <?= !empty($_SESSION["errors"]["ngay_sinh"]) ?  $_SESSION["errors"]["ngay_sinh"] : '' ?>
                                        </span>
                                    </div>
                                        </div>
                                    </div>
                                    
                                  
                                   
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <label for="citynameInput" class="form-label">Mật khẩu</label>
                                                <input type="password" placeholder="Vui lòng nhập Password" name="mat_khau"  />
                                                <span class="text-danger">
                                            <?= !empty($_SESSION["errors"]["mat_khau"]) ?  $_SESSION["errors"]["mat_khau"] : '' ?>
                                        </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <label for="citynameInput" class="form-label">Xác nhận mật khẩu</label>
                                                <input type="password" placeholder="Vui lòng nhập lại Password"   name="confirm_mat_khau"/>
                                                <span class="text-danger">
                                            <?= !empty($_SESSION["errors"]["confirm_mat_khau"]) ?  $_SESSION["errors"]["confirm_mat_khau"] : '' ?>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button class="btn btn-sqr">Đăng ký</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Register Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- login register wrapper end -->
    </main>

    <!-- JS -->
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

    <?php require_once 'views/layout/footer.php'; ?>
              <!-- Mini cart -->
      <?php require_once "./views/layout/cart.php"; ?>
</body>

</html>
