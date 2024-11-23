<!doctype html>
<html class="no-js" lang="zxx">

<head>
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Liên Hệ</title>
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

<?php require_once 'views/layout/header.php'; ?>
   <?php
if (isset($_SESSION['lien-he'])) {
    // Hiển thị thông báo
    echo '<div class="alert alert-success">' . $_SESSION['lien-he'] . '</div>';
    
    // Xóa thông báo khỏi session để tránh hiển thị lại
    unset($_SESSION['lien-he']);
}
?>
    
    

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
                                    <li class="breadcrumb-item active" aria-current="page">Liên Hệ</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- google map start -->
        <div class="map-area section-padding">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8680883965467!2d105.74435187503178!3d21.037963480613683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455305afd834b%3A0x17268e09af37081e!2sT%C3%B2a%20nh%C3%A0%20FPT%20Polytechnic.!5e0!3m2!1svi!2s!4v1731057753494!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!-- google map end -->

        <!-- contact area start -->
        <div class="contact-area section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-message">
                            <h4 class="contact-title">Nhập Thông Tin Liên Hệ</h4>

                            <!-- Form start -->
                            <form id="contact-form" action="?act=gui-thong-tin" method="POST" class="contact-form">
                                <input type="hidden" id="datetime" name="datetime"><span id="datetime-display">
                                <input type="hidden" name="trang_thai" id="trang_thai" value="0">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="ten_khach_hang" placeholder="Tên Khách Hàng *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="so_dien_thoai" placeholder="Số Điện Thoại *" type="text" required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <input name="email" placeholder="Email *" type="text" required>
                                    </div>
                                    <div class="col-12">
                                        <div class="contact2-textarea text-center">
                                            <textarea placeholder="Tin Nhắn *" name="tin_nhan" class="form-control2" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <button class="btn btn-sqr" type="submit">Gửi liên hệ</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="contact-info">
                            <h4 class="contact-title">Liên Hệ</h4>
                            <p>Sự rõ ràng cũng là một quá trình năng động tuân theo những thói quen luôn thay đổi của người đọc. Thật đáng ngạc nhiên khi lưu ý rằng văn học Gothic, mà ngày nay chúng ta coi là hơi rõ ràng, đã đi trước văn học như thế nào.
                            bàn tay con người</p>
                            <ul>
                                <li><i class="fa fa-fax"></i> Địa chỉ : FPT Polytechnic,Trịnh Văn Bô,Nam Từ Liêm,Hà Nội</li>
                                <li><i class="fa fa-phone"></i> +84867846910 </li>
                                <li><i class="fa fa-envelope-o"></i> E-mail: linhncnph49464@gmail.com</li>
                            </ul>
                            <div class="working-time">
                                <h6>Thời gian làm việc:</h6>
                                <p><span>Thứ 2 - Thứ 7 :</span>08AM – 22PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact area end -->
    </main>
    <script>
        // Hàm lấy thời gian hiện tại và định dạng thành YYYY-MM-DD HH:MM:SS
        function setCurrentTime() {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            
            const formattedTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
            document.getElementById("datetime").value = formattedTime;
        }

        // Gọi hàm để hiển thị thời gian khi tải trang
        window.onload = setCurrentTime;


    </script>
    <script>
    document.getElementById('contact-form').onsubmit = function(event) {
        // Lấy các giá trị đã nhập trong form
        var soDienThoai = document.querySelector('input[name="so_dien_thoai"]').value;
        var email = document.querySelector('input[name="email"]').value;

        // Kiểm tra số điện thoại có phải là 10 chữ số không
        if (!/^\d{10}$/.test(soDienThoai)) {
            alert('Số điện thoại không hợp lệ!');
            event.preventDefault(); // Ngừng gửi form nếu không hợp lệ
            return false;
        }

        // Kiểm tra email có đúng định dạng không
        if (!/\S+@\S+\.\S+/.test(email)) {
            alert('Email không hợp lệ!');
            event.preventDefault(); // Ngừng gửi form nếu không hợp lệ
            return false;
        }

        // Nếu không có lỗi, form sẽ được gửi đi
        return true;
    }
</script>



    <!-- footer -->
    <?php require_once 'views/layout/footer.php'; ?>

         <!-- Mini cart -->
      <?php require_once "./views/layout/cart.php"; ?>

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
    <!-- <script src="assets/js/plugins/ajax-mail.js"></script> -->
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="assets/js/plugins/google-map.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>
