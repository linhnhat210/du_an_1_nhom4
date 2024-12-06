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
                                            <a href="?act=my-account" class="active" data-bs-toggle="tab"><i class="fa fa-user"></i>
                                                Thông tin cá nhân</a>
                                            <a href="?act=list-don-hang"><i class="fa fa-cart-arrow-down"></i>
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
                                                 <form action="?act=cap-nhat-tai-khoan" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" id="id" value="<?= $_SESSION['user_client']['id']?>">
            <!-- Avatar -->
         
                                                        <div class="mb-3 text-center">
    <!-- Hình ảnh đại diện -->
    <label for="avatar">
        <img src="<?= BASE_URL . $_SESSION['user_client']['avatar'] ?>" 
             alt="Avatar" 
             class="avatar mb-3" 
             style="cursor: pointer; width: 100px; height: 100px; border-radius: 50%; object-fit: cover;"
              onerror="this.onerror=null; this.src=' https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png'">

    </label>
    <!-- Input file ẩn -->
    <input type="file" class="form-control d-none" id="avatar" name="avatar" onchange="updateAvatarPreview(event)">
    <p class="form-label">Thay đổi ảnh đại diện</p>
</div>
          

            <!-- Tên -->
            <div class="mb-3">
                <label for="ten_nguoi_dung" class="form-label">Tên</label>
                <input type="text" class="form-control" id="ten_nguoi_dung" name="ten_nguoi_dung" value="<?= $_SESSION['user_client']['ten_nguoi_dung']?>" required>
                 <span class="text-danger">
                        <?= !empty($_SESSION["errors"]["ten_nguoi_dung"]) ?  $_SESSION["errors"]["ten_nguoi_dung"] : '' ?>
                 </span>
            </div>

            <!-- Số điện thoại -->
            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="sdt" name="sdt" value="<?= $_SESSION['user_client']['sdt']?>" required>
                 <span class="text-danger">
                        <?= !empty($_SESSION["errors"]["sdt"]) ?  $_SESSION["errors"]["sdt"] : '' ?>
                 </span>
            </div>
            
            <!-- Địa chỉ -->
            <div class="mb-3">
                <label for="dia_chi" class="form-label">Địa chỉ</label>
                <textarea class="form-control" id="dia_chi" name="dia_chi" rows="3" required><?= $_SESSION['user_client']['dia_chi'] ?></textarea>
                 <span class="text-danger">
                        <?= !empty($_SESSION["errors"]["dia_chi"]) ?  $_SESSION["errors"]["dia_chi"] : '' ?>
                 </span>
            </div>

            
            <div class="mb-3">
                <label for="date" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" value="<?= $_SESSION['user_client']['ngay_sinh']?>" required>
                 <span class="text-danger">
                        <?= !empty($_SESSION["errors"]["ngay_sinh"]) ?  $_SESSION["errors"]["ngay_sinh"] : '' ?>
                 </span>
            </div>


            <!-- Giới tính -->
            <div class="mb-3">
                <label class="form-label">Giới tính</label>
                <div>
                    <select name="gioi_tinh">
                        <option value="Nam" <?= $_SESSION['user_client']['gioi_tinh'] === 'Nam' ? 'selected' : '' ?>>Nam</option>
                        <option value="Nữ" <?= $_SESSION['user_client']['gioi_tinh'] === 'Nữ' ? 'selected' : '' ?>>Nữ</option>
                    </select>
                </div>
            </div>

            <!-- Nút lưu -->
             <br>
             <br>
             <div class="mb-3 text-end">
                <button type="submit" class="btn btn-sqr">Lưu thông tin</button>
            </div>
        </form>
               
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