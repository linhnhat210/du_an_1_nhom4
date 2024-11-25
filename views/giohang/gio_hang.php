<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Giỏ Hàng</title>
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
        require_once "./views/layout/header.php";
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
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
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
                                        <th class="pro-thumbnail">Ảnh sản phẩm</th>
                                        <th class="pro-title">Tên sản phẩm</th>
                                        <th class="pro-price">Giá tiền</th>
                                        <th class="pro-quantity">Số lượng</th>
                                        <th class="pro-subtotal">Tổng tiền</th>
                                        <th class="pro-remove">Thao tác</th>
                                    </tr>
                                </thead>

                                <?php if($chiTietGioHang): ?>
                                    <tbody>
                                    <?php
                                        $tongGioHang = 0;
                                     foreach ($chiTietGioHang as $key => $sanPham) : 
                                     ?>
                                        <tr>
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="#"><?= $sanPham['ten_san_pham'] ?></a></td>
                                            <td class="pro-price">
                                                    <?= 
                                                         formatPrice($sanPham['gia_khuyen_mai']) . 'đ'; 
                                                           ?>
                                                </td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="<?= $sanPham['so_luong'] ?>" />
                                                </div>
                                            </td>
                                            <td class="pro-subtotal"><span>
                                                <?php
                                                $tongTien = 0;
                                                if ($sanPham['gia_khuyen_mai']) {
                                                    $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                                } else {
                                                    $tongTien = $sanPham['gia_ban'] * $sanPham['so_luong'];
                                                }
                                                $tongGioHang += $tongTien;
                                                echo formatPrice($tongTien) . ' đ';
                                                ?>
                                            </span></td>
                                            <td class="pro-remove"> 
                                            <a href="<?=  '?act=xoa-san-pham-gio-hang&id_san_pham_gio_hang='. $sanPham['id']?>" 
                                            onclick="return confirm('Bạn có đồng ý xóa hay không?')">
                                                <i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                       
                                    <?php endforeach; ?>
                                     </tbody>
                                    <?php else: ?>
                                              <tbody>
        <!-- Kiểm tra nếu giỏ hàng không có sản phẩm -->
        <tr>
            <td colspan="6" class="text-center">Không có sản phẩm trong giỏ hàng của bạn</td>
        </tr>
    </tbody>

<?php endif; ?>

                            </table>
                        </div>
                        
                    </div>
                </div>
                <?php if($chiTietGioHang): ?>
                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h6>Tổng đơn hàng</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Tổng tiền sản phẩm</td>
                                            <td><?= formatPrice($tongGioHang) . ' đ' ?></td>
                                        </tr>
                                        
                                        <tr class="total">
                                            <td>Tổng thanh toán</td>
                                            <td class="total-amount"><?= formatPrice($tongGioHang ) . ' đ' ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class="btn btn-sqr d-block">Tiến hành đặt hàng</a>
                        </div>
                    </div>
                </div>

<?php endif; ?>
            
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
         <!-- Mini cart -->
      <?php require_once "./views/layout/cart.php"; ?>
</body>

</html>
