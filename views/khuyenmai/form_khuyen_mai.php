<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Khuyến Mãi</title>
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
        .copy-button {
            color: #6F4F28; /* Brown text */
            padding: 10px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s; /* Smooth transition */
        }

        .copy-button:hover {
            background-color: #6F4F28; /* Brown background */
            color: white; /* White text */
        }

        .copied {
            background-color: #6F4F28; /* Brown background */
            color: white; /* White text */
        }
    </style>
</head>

<body>
    <?php
    require_once "./views/layout/header.php";
    ?>
    <!-- Main Content -->
    <main>
    <!-- Start Header Area -->
             <!-- main header start -->
                 <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Khuyến Mãi</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
    <!-- main header start -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <style>
                                .table-container {
                                    display: grid;
                                    grid-template-columns: repeat(4, 1fr);
                                    gap: 20px;
                                    padding: 20px;
                                }

                                .table-box {
                                    border: 1px solid #ccc;
                                    border-radius: 8px;
                                    padding: 15px;
                                    background-color: #f9f9f9;
                                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                    display: flex;
                                    flex-direction: column;
                                    justify-content: space-between;
                                    height: 100%;
                                }

                                .table-box h3 {
                                    font-size: 1.2rem;
                                    color: white; /* Đổi màu chữ thành trắng */
                                    text-align: center;
                                    margin-bottom: 15px;
                                    background-color: #CCAC78; /* Đổi nền thành màu nâu */
                                    padding: 10px;
                                    border-radius: 4px;
                                }


                                .table-box ul {
                                    list-style: none;
                                    padding: 0;
                                    margin: 0 0 15px 0;
                                }

                                .table-box ul li {
                                    padding: 5px 0;
                                    border-bottom: 1px solid #ddd;
                                    font-size: 0.9rem;
                                }

                                .table-box ul li:last-child {
                                    border-bottom: none;
                                }
                            </style>

                            <div class="table-container">
                                <?php if (!empty($khuyenMais) && is_array($khuyenMais)): ?>
                                    <?php foreach ($khuyenMais as $index => $khuyenMai): ?>
                                        <div class="table-box">
                                            <h3>Voucher <?= $index + 1 ?></h3>
                                            <ul>
                                                <li><strong>Mã:</strong> 
                                                    <span id="code-<?= $index ?>"><?= $khuyenMai["ma_khuyen_mai"] ?></span>
                                                </li>
                                                <li><strong>Giá Trị:</strong> <?= $khuyenMai["giam_phan_tram"] ?>% giảm tối đa <?= number_format($khuyenMai["giam_toi_da"]) ?>đ</li>
                                                <li><strong>Ngày Bắt Đầu:</strong> <?= $khuyenMai["ngay_bat_dau"] ?></li>
                                                <li><strong>Ngày Kết Thúc:</strong> <?= $khuyenMai["ngay_ket_thuc"] ?></li>
                                            </ul>
                                            <button class="copy-button" onclick="copyToClipboard('code-<?= $index ?>', this)">Copy</button>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="table-box">
                                        <h3>Không có mã khuyến mãi</h3>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->
</main>
<?php require_once 'views/layout/footer.php'; ?>
     <!-- Mini cart -->
          <!-- Mini cart -->
  <?php require_once "./views/layout/cart.php"; ?>

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        // Function to copy text to clipboard
        function copyToClipboard(elementId, button) {
            const textToCopy = document.getElementById(elementId).innerText;

            navigator.clipboard.writeText(textToCopy).then(() => {
                button.innerText = "Đã Copy";
                button.classList.add("copied");

                // Reset button text after 3 seconds
                setTimeout(() => {
                    button.innerText = "Copy";
                    button.classList.remove("copied");
                }, 3000);
            }).catch(err => {
                console.error('Error copying text: ', err);
                alert("Không thể sao chép mã khuyến mãi.");
            });
        }
    </script>

</body>

</html>
