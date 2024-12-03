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
    <style>
.blog-sidebar {
    background: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.recent-post {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.recent-post-item {
    display: flex;
    gap: 15px;
    background: #fff;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}



.product-thumb {
    flex-shrink: 0;
    width: 72px;
    height: 120px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.product-thumb img {


    width: 100%;
    height: 100%;
    object-fit: cover; /* Đảm bảo ảnh không bị méo */
    border-radius: 5px;
}

.recent-post-description {
    flex-grow: 1;
}

.product-name h6 {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
    line-height: 1.4; /* Tăng khoảng cách giữa các dòng */
}

.product-name h6 a {
    text-decoration: none;
    color: inherit;
    font-size: 16px;
    font-weight: 600;
}

.product-name h6 a:hover {
    color: #e74c3c; /* Màu đỏ nổi bật khi hover */
}

.product-name p {
    font-size: 14px;
    color: #555;
    margin-bottom: 5px;
}
.product-name p:not(:last-child) {
    margin-bottom: 10px;
}

/* Định dạng màu sắc chữ khi hover */
.product-name h6 a:hover {
    color: #007bff; /* Màu xanh cho đường dẫn khi hover */
}

    </style>
</head>

<body>
    <!-- Main Content -->
        <!-- Start Header Area -->
        <?php
        require_once "./views/layout/header.php";
        
        ?>  
         <?php
          if ($donHang['trang_thai_id'] == 6 ) {
            $colorAlerts = 'danger';
          } elseif ($donHang['trang_thai_id'] >= 1 && $donHang['trang_thai_id'] <= 5) {
            $colorAlerts = 'primary';
          } elseif ($donHang['trang_thai_id'] == 7) {
            $colorAlerts = 'success';
          } elseif($donHang['trang_thai_id'] =8) {
            $colorAlerts = 'warning';
          }
          ?>


<main>
        



    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
        <div class="container">
 
           
                <div class="row">
                    <!-- Checkout Billing Details -->
                     <div class="col-lg-3">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Thông tin người nhân</h5>
                            <div class="billing-form-wrap">
                                <br>
                           


                            <!--end card-->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i>Địa chỉ nhân hàng</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled vstack gap-2 fs-13 mb-0">      
                                        <li class="fw-medium fs-14">Tên người nhận : <?= $donHang['ten_nguoi_nhan']?></li>
                                        <li>Số điện thoại: <?= $donHang['sdt_nguoi_nhan']?></li>
                                        <li>Địa chỉ : <?= $donHang['dia_chi_nguoi_nhan']?></li>
                                        
                                        <li>Ghi chú: <?= isset($donHang) && !empty($donHang['ghi_chu']) ? $donHang['ghi_chu'] : 'Không có ghi chú' ?></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!--end card-->
                            <br>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom me-1 text-muted"></i>Chi tiết đơn hàng</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-shrink-0">
                                            <p class="text-muted mb-0">Mã đơn hàng :</p>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <p class="mb-0"><?= $donHang['ma_don_hang']?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-shrink-0">
                                            <p class="text-muted mb-0">Phương thức thanh toán :</p>
                                        
                                            <p class="mb-0"><?= $donHang['ten_phuong_thuc']?></p>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-shrink-0">
                                            <p class="text-muted mb-0">Trạng thái đơn hàng :</p>
                                        
                                            <p class="badge bg-<?= $colorAlerts ?>"><?= $donHang['ten_trang_thai']?></p>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <p class="text-muted mb-0">Tổng tiền:</p>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <p class="mb-0"><?= $donHang['tong_don_hang']?> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                        </div>

                        </div>
                    <!-- Order Summary Details -->
                    <div class="col-lg-9">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Thông tin sản phẩm</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                       
                                <div class="blog-sidebar">
                
                                    <div class="recent-post">
                                        <?php foreach($sanPhamDonHang as $SP):?>
                                        <div class="recent-post-item">
                                            <figure class="product-thumb">
                                                <a href="?act=chi-tiet-san-pham&id_san_pham=<?= $SP["san_pham_id"]?>">
                                                    <img src="<?= BASE_URL . $SP["hinh_anh"]?>" alt="product image">
                                                </a>
                                            </figure>
                                            
                                            <div class="recent-post-description">
                                                <div class="product-name">
                                                    <h6><a href="?act=chi-tiet-san-pham&id_san_pham=<?= $SP["san_pham_id"]?>">Tên :     <?= $SP["ten_san_pham"]?></a></h6>
                                                    <p>Số lượng : <?= $SP["so_luong"] ?></p>
                                                    <p>Đơn giá : <?= formatPrice($SP["don_gia"]) ?></p>
                                                    <p>Thành tiền : <?= formatPrice($SP["thanh_tien"]) ?></p>
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <?php endforeach ?>

                                    </div>
                                </div> <!-- single sidebar end -->
                        
                        </div>

                                    <br> 
                                       
<table class="table table-bordered table-hover">    
    <tfoot>
        <tr>
            <td class="text-start" style="width: 50%;">Tổng tiền sản phẩm</td>
            <td class="text-end"><strong><?= formatPrice($donHang["tong_tien_hang"]) . ' đ' ?></strong></td>
        </tr>
        <tr>
            <td class="text-start">Giảm giá</td>
            <td class="text-end"><strong><?= formatPrice($donHang["giam_gia"]) . ' đ' ?></strong></td>
        </tr>
        <tr>
            <td class="text-start">Shipping</td>
            <td class="text-end"><strong>0 đ</strong></td>
        </tr>
        <tr>x
            <td class="text-start">Tổng đơn hàng</td>
            <td class="text-end"><strong><?= formatPrice($donHang["tong_don_hang"]) . ' đ' ?></strong></td>
        </tr>
    </tfoot>
    
</table>



                                 <?php if($donHang['trang_thai_id'] == 1 ): ?>  
                                    <a href="?act=huy-don-hang&don_hang_id=<?=$donHang['id']?>" class="btn btn-sqr" style="margin-left:683px;">Hủy đơn hàng</a>
                                <?php endif; ?>
                                 <?php if($donHang['trang_thai_id'] == 5 ): ?>  
                                    <div class="d-flex" style="margin-left:470px;">

                                        <a href="?act=xac-nhan&don_hang_id=<?=$donHang['id']?>" class="btn btn-sqr" style="margin-right:30px;">Xác nhận đơn hàng</a>
                                        <a href="?act=huy-don-hang&don_hang_id=<?=$donHang['id']?>" class="btn btn-sqr" >Hoàn đơn hàng</a>
                                    </div>
                                <?php endif; ?>
                                 
                                </div>
                                
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                
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
