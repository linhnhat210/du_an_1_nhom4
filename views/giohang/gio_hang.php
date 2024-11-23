<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
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
                                <tbody>
                                    <?php
                                        $tongGioHang = 0;
                                     foreach ($chiTietGioHang as $key => $sanPham) : 
                                     ?>
                                        <tr>
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="#"><?= $sanPham['ten_san_pham'] ?></a></td>
                                            <td class="pro-price"><span>
                                                    <?php if ($sanPham['gia_khuyen_mai']) {
                                                         formatPrice($sanPham['gia_khuyen_mai']) . 'đ'; 
                                                          } else { 
                                                            formatPrice($sanPham['gia_ban']) . 'đ';
                                                        } ?>
                                                </span></td>
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
                                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Update Option -->
                        <div class="cart-update-option d-block d-md-flex justify-content-between">
                            <div class="apply-coupon-wrapper">
                                <form action="#" method="post" class=" d-block d-md-flex">
                                    <input type="text" placeholder="Enter Your Coupon Code" required />
                                    <button class="btn btn-sqr">Apply Coupon</button>
                                </form>
                            </div>
                            <div class="cart-update">
                                <a href="#" class="btn btn-sqr">Update Cart</a>
                            </div>
                        </div>
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
         <!-- Mini cart -->
      <?php require_once "./views/layout/cart.php"; ?>
</body>

</html>
