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

    <!-- CSS -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <!-- main style css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>


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
                                        <select name="gioi_tinh" class="form-select">
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
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

    <?php require_once 'views/layout/footer.php'; ?>
</body>

</html>
