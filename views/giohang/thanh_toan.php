<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thanh Toán</title>
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
                                <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Checkout Login Coupon Accordion Start -->
                    <div class="checkoutaccordion" id="checkOutAccordion">
                   <span class="text-danger">
                                                            <?= !empty($_SESSION["errors"]) ?  $_SESSION["errors"] : '' ?>
                                                        </span>

                        <div class="card">
                            <h6>Thêm mã giảm giá? <span data-bs-toggle="collapse" data-bs-target="#couponaccordion">Click
                                    Nhập mã giảm giá</span></h6>
                            <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                                <div class="card-body">
                                    <div class="cart-update-option">
                                        <div class="apply-coupon-wrapper">
                                           
                                            <form action="?act=thanh-toan-khuyen-mai" method="post" class=" d-block d-md-flex">
                                                <input type="text" name="khuyen_mai" placeholder="Enter Your Coupon Code"/>
                                                
                                                <button class="btn btn-sqr">Áp dụng</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Checkout Login Coupon Accordion End -->
                </div>
            </div>
            <form action="<?= BASE_URL . '?act=xu-ly-thanh-toan' ?>" method="POST">
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Thông tin người nhân</h5>
                            <div class="billing-form-wrap">
                                <div class="single-input-item">
                                    <label for="ten_nguoi_nhan">Tên người nhận</label>
                                    <input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan" value="<?= $userAccount['ten_nguoi_dung'] ?>" placeholder="Tên người nhận" require />
                                </div>
                                <div class="single-input-item">
                                    <label for="email_nguoi_nhan" class="required">Địa chỉ email</label>
                                    <input type="email" id="email_nguoi_nhan" name="email_nguoi_nhan" value="<?= $userAccount['email'] ?>" placeholder="Địa chỉ email" required />
                                </div>
                                <div class="single-input-item">
                                    <label for="sdt_nguoi_nhan">Số điện thoại</label>
                                    <input type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="<?= $userAccount['sdt'] ?>" placeholder="Số điện thoại" require />
                                </div>
                                <div class="single-input-item">
                                    <label for="dia_chi_nguoi_nhan">Địa chỉ người nhận</label>
                                    <input type="text" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" value="<?= $userAccount['dia_chi'] ?>" placeholder="Địa chỉ người nhận" require />
                                </div>

                                <div class="single-input-item">
                                    <label for="ghi_chu">Ghi chú</label>
                                    <textarea name="ghi_chu" id="ghi_chu" cols="30" rows="3" placeholder="Ghi chú đơn hàng của bạn."></textarea>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Thông tin sản phẩm</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                                                        <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($chiTietGioHang as $key => $sanPham) :
                                            ?>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="san_pham_id[]" value="<?= $sanPham["san_pham_id"] ?>">
                                                        <a href="">
                                                            <?= $sanPham['ten_san_pham'] ?>
                                                        </a>
                                                    </td>

                                                   <?php if($sanPham["gia_khuyen_mai"]){
                                                    $gia_san_pham = $sanPham["gia_khuyen_mai"];
                                                   } else{
                                                    $gia_san_pham = $sanPham["gia_ban"];
                                                   }
                                                   ?>
                                                   

                                                    <td>

                                                    <input type="hidden" name=" gia_san_pham[]" value="<?= $gia_san_pham ?>">
                                                        <a href="">
                                                        <a href="">
                                                            <?= $gia_san_pham ?>
                                                        </a>
                                                    </td>
                                                     <input type="hidden" name="so_luong[]" value="<?= $sanPham["so_luong"] ?>">
                                                    <td>
                                                        <a href="">
                                                            <?= $sanPham['so_luong'] ?>
                                                        </a>
                                                    </td>
                                                  
                                                    
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        
                                       
                                        
                                    </table>
                                    <br>    
                                    <table class="table table-bordered">
                                        <?php $tongGioHang=0;
                                            foreach ($chiTietGioHang as $key => $sanPham){
                                                if ($sanPham['gia_khuyen_mai']) {
                                                            $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                                        } else {
                                                            $tongTien = $sanPham['gia_ban'] * $sanPham['so_luong'];
                                                        }
                                                        $tongGioHang += $tongTien;
                                                       
                                            } 
                                            ?>
                                         <tfoot>
                                            <tr>
                                                <td>Tổng tiền sản phẩm</td>
                                                <td><strong><?= formatPrice($tongGioHang) . ' đ' ?></strong></td>
                                            </tr>
                                            <?php if(isset($khuyen_mai) && $khuyen_mai): ?>
                                            <tr>
                                                <td>Giá trị voucher</td>
                                                <td>
                                                    <strong><?= $khuyen_mai["giam_phan_tram"]?>% tối đa <?= $khuyen_mai["giam_toi_da"]?> </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Giảm giá</td>
                                                <td>
                                                    <?php if(($khuyen_mai["giam_phan_tram"] * $tongGioHang / 100) >= $khuyen_mai["giam_toi_da"] ){
                                                            $giam_gia = $khuyen_mai["giam_toi_da"];
                                                    }elseif(($khuyen_mai["giam_phan_tram"] * $tongGioHang / 100) < $khuyen_mai["giam_toi_da"]){
                                                        $giam_gia = $khuyen_mai["giam_phan_tram"] * $tongGioHang / 100;
                                                    }
                                                    ?>
                                                    <strong><?=formatPrice($giam_gia) . ' đ'?></strong>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                            <tr>
                                                <td>Shipping</td>
                                                <td>
                                                    <strong>0 đ</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tổng đơn hàng</td>
                                                <?php if(isset($giam_gia) && $giam_gia){
                                                    $tong_tien = $tongGioHang - $giam_gia;
                                                }else{ 
                                                    $tong_tien = $tongGioHang;
                                                }
                                                ?>
                                                <input type="hidden" name="don_gia" value="<?= $tongGioHang ?? 0?>">
                                                <input type="hidden" name="giam_gia" value="<?= $giam_gia ?? 0 ?>">
                                                <input type="hidden" name="thanh_tien" value="<?= $tong_tien ?>">
                                                <td><strong><?= formatPrice($tong_tien) . ' đ' ?></strong></td>
                                            </tr>
                                        </tfoot>
                                    
                                        </table>

                                </div>
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" name="phuong_thuc_thanh_toan_id" value="1" class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">Thanh toán khi nhận hàng</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="cash">
                                            <p>Khách hàng có thể thanh toán sau khi đã nhận hàng thành công(cần xác nhận đơn hàng).</p>
                                        </div>
                                    </div>
                                    
                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox mb-20">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label" for="terms">Xác nhận đặt hàng</label>
                                        </div>
                                        <button type="submit" class="btn btn-sqr">Tiến hành đặt hàng</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- checkout main wrapper end -->
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
