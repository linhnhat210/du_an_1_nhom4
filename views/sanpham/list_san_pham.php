<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/corano/corano/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:53:58 GMT -->

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

        #amount::after {
            content: "K";
            /* Thêm chữ "K" sau giá trị */
        }
    </style>

</head>

<body>
    <!-- Start Header Area -->
    <?php require_once "views/layout/header.php" ?>



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
                                    <li class="breadcrumb-item active" aria-current="page">shop</li>
                                    <?php if($danhMucId): ?>
                                    <li class="breadcrumb-item active" aria-current="page"><?=$tenDanhMuc["ten_danh_muc"]?></li>
                                    <?php endif; ?>
                                
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <!-- sidebar area start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="sidebar-wrapper">
                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h5 class="sidebar-title">Thể Loại</h5>
                                <div class="sidebar-body">
                                    <ul class="shop-categories">
                                        <?php foreach ($danhMucs as $danhMuc) : ?>
                                            <li>
                                                <a href="?act=list-san-pham&danh_muc_id=<?= $danhMuc["id"] ?>&page=1&xep=newest">
                                                    <?= $danhMuc['ten_danh_muc'] ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h5 class="sidebar-title">Tìm Kiếm Theo Giá</h5>
                                <form action="#" method="get" class="row g-3">
                                    <!-- Input Khoảng giá từ -->
                                    <div class="col-12">
                                        <label for="price-from" class="form-label">Từ giá</label>
                                        <input type="number" id="price-from" name="tu" class="form-control" value="<?= isset($_GET['tu']) ? $_GET['tu'] : '' ?>" placeholder="Nhập giá tối thiểu">
                                    </div>

                                    <!-- Input Khoảng giá đến -->
                                    <div class="col-12">
                                        <label for="price-to" class="form-label">Đến giá</label>
                                        <input type="number" id="price-to" name="den" class="form-control" value="<?= isset($_GET['den']) ? $_GET['den'] : '' ?>" placeholder="Nhập giá tối đa">
                                    </div>

                                    <!-- Ẩn các tham số hiện tại -->
                                    <input type="hidden" name="act" value="list-san-pham">
                                    <input type="hidden" name="danh_muc_id" value="<?= isset($_GET['danh_muc_id']) ? $_GET['danh_muc_id'] : '' ?>">


                                    <!-- Button tìm kiếm -->
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-cart w-100" style="background-color:#CCAC78;">Tìm kiếm</button>
                                    </div>
                                </form>
                            </div>




                            <!-- single sidebar end -->







                            <!-- single sidebar start -->
                            <div class="sidebar-banner">
                                <div class="img-container">
                                    <a href="#">
                                        <img src="assets/img/banner/sidebar-banner.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- single sidebar end -->
                        </aside>
                    </div>
                    <!-- sidebar area end -->

                    <!-- shop main wrapper start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-product-wrapper">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">

                                        </div>
                                    </div>

                                    <!-- Dropdown lọc theo giá và id -->
                                    <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                        <div class="top-bar-right">
                                            <div class="product-short">
                                                <p>Sắp xếp theo: </p>
                                                <form action="" method="get">
                                                    <input type="hidden" name="act" value="list-san-pham">
                                                    <input type="hidden" name="danh_muc_id" value="<?= isset($_GET['danh_muc_id']) ? $_GET['danh_muc_id'] : '' ?>">
                                                    <input type="hidden" name="page" value="<?= isset($_GET['page']) ? $_GET['page'] : 1 ?>">
                                                    <select class="nice-select" name="xep" onchange="this.form.submit()">
                                                        <option value="newest" <?= isset($_GET['xep']) && $_GET['xep'] == 'newest' ? 'selected' : '' ?>>Sản phẩm mới nhất</option>
                                                        <option value="desc" <?= isset($_GET['xep']) && $_GET['xep'] == 'desc' ? 'selected' : '' ?>>Giá (Cao > Thấp)</option>
                                                        <option value="asc" <?= isset($_GET['xep']) && $_GET['xep'] == 'asc' ? 'selected' : '' ?>>Giá (Thấp > Cao)</option>
                                                    </select>
                                                </form>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <!-- shop product top wrap start -->

                            <!-- product item list wrapper start -->

                            <!-- Display Products -->
                            <div class="shop-product-wrap grid-view row mbn-30">
                                <?php foreach ($sanPhams as $sanPham) : ?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                                    <img class="pri-img" src="<?= BASE_URL . $sanPham["hinh_anh"] ?>" alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $sanPham["hinh_anh"] ?>" alt="product">
                                                </a>
                                                <div class="cart-hover">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>" class="btn btn-cart">Xem chi tiết</a>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham["ten_san_pham"] ?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <?php if (!empty($sanPham["gia_khuyen_mai"])): ?>
                                                        <span class="price-regular"><?= number_format($sanPham["gia_khuyen_mai"])  ?>đ</span>
                                                        <span class="price-old"><del><?= number_format($sanPham["gia_ban"])  ?>đ</del></span>
                                                    <?php else: ?>
                                                        <span class="price-regular"><?= number_format($sanPham["gia_ban"])  ?>đ</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Pagination -->
                            <!-- Pagination -->
                            <div class="paginatoin-area text-center">
                                <ul class="pagination-box">
                                    <?php
                                    // Tính toán phạm vi trang gần nhất
                                    $startPage = max(1, $page - 1); // Trang bắt đầu (tối thiểu là trang 1)
                                    $endPage = min($totalPages, $page + 1); // Trang kết thúc (tối đa là trang cuối cùng)

                                    // Lấy các tham số URL hiện tại
                                    $queryParams = $_GET;
                                    unset($queryParams['page']); // Xóa tham số 'page' cũ để tránh ghi đè

                                    // Hiển thị nút "Previous" nếu trang hiện tại > 1
                                    if ($page > 1) {
                                        $queryParams['page'] = $page - 1;
                                        $prevUrl = '?act=list-san-pham&' . http_build_query($queryParams);
                                        echo '<li><a class="btn" href="' . $prevUrl . '">«</a></li>';
                                    }

                                    // Hiển thị các trang gần nhất
                                    for ($i = $startPage; $i <= $endPage; $i++) {
                                        $queryParams['page'] = $i;
                                        $pageUrl = '?act=list-san-pham&' . http_build_query($queryParams);
                                        $activeClass = ($i == $page) ? 'active' : '';
                                        echo '<li class="' . $activeClass . '"><a href="' . $pageUrl . '">' . $i . '</a></li>';
                                    }

                                    // Hiển thị nút "Next" nếu trang hiện tại < tổng số trang
                                    if ($page < $totalPages) {
                                        $queryParams['page'] = $page + 1;
                                        $nextUrl = '?act=list-san-pham&' . http_build_query($queryParams);
                                        echo '<li><a class="btn" href="' . $nextUrl . '">»</a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>



                            <!-- Pagination -->




                            <!-- end pagination area -->
                        </div>
                    </div>
                    <!-- shop main wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
    <?php require_once "views/layout/footer.php" ?>
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

</body>


<!-- Mirrored from htmldemo.net/corano/corano/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:53:59 GMT -->

</html>