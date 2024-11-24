<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/corano/corano/blog-grid-full-width.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:05 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Truyện Tranh</title>
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
        .product-thumb img {
            width: 100%;
            /* Chiều rộng ảnh chiếm toàn bộ không gian container */
            height: auto;
            /* Giữ nguyên tỷ lệ ban đầu nếu không bị cắt */
            aspect-ratio: 3 / 5;
            /* Đảm bảo tỷ lệ 3x4 */
            object-fit: cover;
            /* Cắt ảnh nếu cần để phù hợp với container */
            border-radius: 8px;
            /* (Tuỳ chọn) Bo góc để ảnh trông mượt mà */
        }
.pro-nav-thumb img{
                width: 100%;
            /* Chiều rộng ảnh chiếm toàn bộ không gian container */
            height: auto;
            /* Giữ nguyên tỷ lệ ban đầu nếu không bị cắt */
            aspect-ratio: 3 / 5;
            /* Đảm bảo tỷ lệ 3x4 */
            object-fit: cover;
            /* Cắt ảnh nếu cần để phù hợp với container */

}
        #amount::after {
            content: "K";
            /* Thêm chữ "K" sau giá trị */
            
        }
        .comment-date {
    font-size: 14px;
    color: #6c757d; /* Màu xám nhạt */
    font-style: italic;
    margin-top: 5px;
}

.comment-date::before {
    content: "📅 "; /* Biểu tượng lịch */
    color: #007bff; /* Màu xanh dương cho biểu tượng */
}
    </style>

</head>

<body>
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
                                <li class="breadcrumb-item"><a href="<?php BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="?act=list-san-pham">Sản phẩm</a></li>
                       
                                <li class="breadcrumb-item active" aria-current="page"><?= $sanPham['ten_san_pham']?></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <div class="pro-large-img">
                                            <img src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="product-details" />
                                        </div>
                                    <?php
                                    // var_dump($listAnhSanPham);
                                    // die;
                                    foreach ($listAnhSanPham as $key => $anhSanPham): ?>
                                        <div class="pro-large-img">
                                            <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" alt="product-details" />
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <div class="pro-nav-thumb">
                                            <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product-details" />
                                        </div>
                                    <?php foreach ($listAnhSanPham as $key => $anhSanPham): ?>
                                        <div class="pro-nav-thumb">
                                            <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" alt="product-details" />
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href="#"><?= $sanPham['ten_danh_muc'] ?></a>
                                    </div>
                                    <h3 class="product-name"><?= $sanPham['ten_san_pham'] ?></h3>
                                    <div class="ratings d-flex">
                                        <div class="pro-review">
                                            <?php $countComment = count($listBinhLuan); ?>
                                            <span><?= $countComment . ' bình luận'; ?></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ'; ?></span>
                                            <span class="price-old"><del><?= formatPrice($sanPham['gia_ban']) . 'đ'; ?></del></span>
                                        <?php } else { ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_ban']) . 'đ' ?></span>
                                        <?php } ?>
                                    </div>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span><?= $sanPham['so_luong'] . ' trong kho' ?></span>
                                    </div>
                                    <p class="pro-desc"><?= $sanPham['mo_ta'] ?></p>
                                    <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="post">
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">Số lượng:</h6>
                                            <div class="quantity">
                                                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                                <div class="pro-qty"><input type="text" value="1" name="so_luong"></div>
                                            </div>
                                            <div class="action_link">
                                               
                                            <button class="btn btn-cart2">Thêm giỏ hàng</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->

                    <!-- product details reviews start -->
                    <div class="product-details-reviews section-padding pb-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="product-review-info">
                <ul class="nav review-tab">
                    <li>
                        <a class="active" data-bs-toggle="tab" href="#tab_three">Bình luận (<?= $countComment ?>)</a>
                    </li>
                </ul>
                <div class="tab-content reviews-tab">
                    <div class="tab-pane fade show active" id="tab_three">
                        <!-- Form bình luận -->
                        <form action="?act=dang-binh-luan" method="POST" class="review-form">
                            <input type="hidden" name="san_pham_id" value="<?= $sanPham["id"] ?>">
                            <div class="form-group row">
                                <div class="col">
                                    <label class="col-form-label"><span class="text-danger">*</span> Nội dung bình luận</label>
                                    <textarea class="form-control" name="noi_dung" required></textarea>
                                </div>
                            </div>
                            <div class="buttons">
                                <button class="btn btn-sqr" type="submit">Bình luận</button>
                            </div>
                        </form>
                        <!-- Kết thúc form bình luận -->
                        <br>
                        <!-- Danh sách bình luận -->
                        <?php foreach ($listBinhLuan as $binhLuan) : ?>
                            <div class="total-reviews">
                                <div class="rev-avatar">
                                    <img src="<?= BASE_URL . $binhLuan['avatar'] ?>" style="width:80%;border-radius:50%;"
                                        alt=""
                                        onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png'">
                                </div>
                                <div class="review-box">
                                    <div class="post-author">
                                        <p><span><?= $binhLuan["ten_nguoi_dung"] ?></span></p>
                                         <p class="commentDate" data-comment-date="<?= date('Y-m-d\TH:i:s', strtotime($binhLuan['ngay_binh_luan'])) ?>">
        <?= $binhLuan['ngay_binh_luan'] ?>
    </p>
                                    </div>
                                    <p><?= $binhLuan['noi_dung'] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- Kết thúc danh sách bình luận -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                </div>
                <!-- product details reviews end -->
            </div>
            <!-- product details wrapper end -->
        </div>
    </div>
    </div>
    <!-- page main wrapper end -->

    <!-- related products area start -->
    <section class="related-products section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm liên quan</h2>
                        <p class="sub-title"></p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                        <?php foreach ($listSanPhamCungDanhMuc as $key => $sanPham): ?>
                            <!-- product item start -->
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                        <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                        <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <?php
                                        $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                        $ngayHienTai = new DateTime();
                                        $tinhNgay = $ngayHienTai->diff($ngayNhap);

                                        if ($tinhNgay->days <= 7) {
                                        ?>
                                            <div class="product-label new">
                                                <span>Mới</span>
                                            </div>
                                        <?php
                                        }
                                        if ($sanPham['gia_khuyen_mai']) {
                                        ?>
                                            <div class="product-label discount">
                                                <span>Giảm giá</span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    
                                </figure>
                                <div class="product-caption text-center">
                                    <h6 class="product-name">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                                    </h6>
                                    <div class="price-box">
                                        <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ'; ?></span>
                                            <span class="price-old"><del><?= formatPrice($sanPham['gia_ban']) . 'đ'; ?></del></span>
                                        <?php } else { ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_ban']) . 'đ' ?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- product item end -->
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related products area end -->
</main>  




    <?php
    require_once "./views/layout/footer.php";
    ?>
    <!-- footer area end -->


    
          <!-- Mini cart -->
      <?php require_once "./views/layout/cart.php"; ?>

    

  
    <!-- JS
============================================ -->
<script>
    // Chuẩn hóa định dạng ngày sang ISO (YYYY-MM-DDTHH:mm:ss)
    function formatToISO(dateString) {
        if (dateString.includes(" ")) {
            return dateString.replace(" ", "T"); // Thay khoảng trắng bằng "T"
        }
        return dateString; // Trả về nếu đã đúng định dạng ISO
    }

    // Hàm tính toán thời gian đã qua
    function timeAgo(dateString) {
        const formattedDate = formatToISO(dateString); // Chuẩn hóa định dạng
        const commentDate = new Date(formattedDate); // Chuyển thành đối tượng Date

        // Kiểm tra ngày hợp lệ
        if (isNaN(commentDate.getTime())) {
            return dateString; // Trả về chuỗi gốc nếu ngày không hợp lệ
        }

        const now = new Date();
        const diff = now - commentDate; // Khoảng cách thời gian (ms)

        const seconds = Math.floor(diff / 1000);
        const minutes = Math.floor(seconds / 60);
        const hours = Math.floor(minutes / 60);
        const days = Math.floor(hours / 24);

        if (seconds < 60) return `${seconds} giây trước`;
        if (minutes < 60) return `${minutes} phút trước`;
        if (hours < 24) return `${hours} giờ trước`;
        return `${days} ngày trước`;
    }

    // Xử lý tất cả các bình luận
    const commentDateElements = document.querySelectorAll(".commentDate");
    commentDateElements.forEach(element => {
        const commentDateString = element.getAttribute("data-comment-date");
        if (commentDateString) {
            element.innerText = timeAgo(commentDateString);
        } else {
            element.innerText = "Không có thời gian bình luận";
        }
    });
</script>

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


<!-- Mirrored from htmldemo.net/corano/corano/blog-grid-full-width.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:05 GMT -->
</html>