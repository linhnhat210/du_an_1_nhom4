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
        <!-- Start Header Area -->
        <?php
        require_once "./views/layout/header.php";
        ?>  
    <main>
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
                                    <li class="breadcrumb-item active" aria-current="page">cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Mã Khuyến Mãi</th>
                                            <th scope="col">Giá Trị</th>
                                            <th scope="col">Ngày Bắt Đầu</th>
                                            <th scope="col">Ngày Kết Thúc</th>
                                            <th scope="col">Sao Chép Mã</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($khuyenMais) && is_array($khuyenMais)): ?>
                                            <?php foreach ($khuyenMais as $index => $khuyenMai): ?>
                                                <tr>
                                                    <td class="fw-medium"><?= $index + 1 ?></td>
                                                    <td id="code-<?= $index ?>"><?= $khuyenMai["ma_khuyen_mai"]?></td>
                                                    <td><?= $khuyenMai["giam_phan_tram"]?>% giảm tối đa <?= number_format($khuyenMai["giam_toi_da"])?>đ</td>
                                                    <td><?= $khuyenMai["ngay_bat_dau"]?></td>
                                                    <td><?= $khuyenMai["ngay_ket_thuc"]?></td>
                                                    <td>
                                                        <button class="copy-button" onclick="copyToClipboard('code-<?= $index ?>', this)">Copy</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center">Không có mã giảm giá.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>

    <!-- JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        // Function to copy text to clipboard
        function copyToClipboard(elementId, button) {
            var text = document.getElementById(elementId).innerText;

            navigator.clipboard.writeText(text).then(function() {
                button.innerText = "Đã Copy";
                button.classList.add("copied");

                // Optionally reset after a delay
                setTimeout(function() {
                    button.innerText = "Copy";
                    button.classList.remove("copied");
                }, 3000);
            }).catch(function(error) {
                console.error('Failed to copy text: ', error);
                alert("Failed to copy text.");
            });
        }
    </script>

    <?php require_once 'views/layout/footer.php'; ?>
</body>

</html>
