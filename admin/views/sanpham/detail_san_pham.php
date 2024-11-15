<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>King Manga</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";

        require_once "views/layouts/siderbar.php";
        ?>
        
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                     <!-- start page title -->
                     <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản Lý Sản Phẩm</h4>
                                

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Sản Phẩm <?= $sanPham['ten_san_pham'] ?></li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                                         <!-- Bắt đầu Form tìm kiếm -->
                    <!-- <div class="row">
                        <div class="col">
                            <form action="?act=search-san-pham" method="POST">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" name="keyword" class="form-control" placeholder="Tìm kiêm thông tin">
                                    </div>

                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br> -->
                    <!-- Kết thúc Form tìm kiếm -->
   
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <div class="container my-5">
                                <div class="row">
                                    <!-- Phần ảnh sản phẩm -->
                                    <div class="col-12 col-md-6">
                                        <div id="productCarousel" class="carousel slide shadow-sm rounded" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <!-- Ảnh chính -->
                                                <div class="carousel-item active">
                                                    <img id="mainImage" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" class="d-block w-100 rounded" alt="Product Image" style="height: 400px; object-fit: cover;">
                                                </div>
                                                <!-- Ảnh nhỏ hơn trong $listAnhSanPham -->
                                                <?php foreach ($listAnhSanPham as $anhSP) : ?>
                                                    <div class="carousel-item">
                                                        <img src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" class="d-block w-100 rounded" alt="Product Thumbnail" style="height: 400px; object-fit: cover;">
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                            <!-- Điều hướng ảnh -->
                                            <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev" onclick="event.preventDefault(); navigateCarousel(-1)">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next" onclick="event.preventDefault(); navigateCarousel(1)">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                        <!-- Ảnh thu nhỏ -->
                                        <div class="mt-3 d-flex justify-content-center">
                                            <img id="thumb-0" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" class="product-thumbnail img-thumbnail mr-2 border-primary" alt="Thumbnail" style="width: 60px; height: 60px; object-fit: cover;" onclick="changeMainImage('<?= BASE_URL . $sanPham['hinh_anh'] ?>', 0)">
                                            <?php foreach ($listAnhSanPham as $key => $anhSP) : ?>
                                                <img id="thumb-<?= $key + 1 ?>" src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" class="product-thumbnail img-thumbnail mr-2" alt="Thumbnail" style="width: 60px; height: 60px; object-fit: cover;" onclick="changeMainImage('<?= BASE_URL . $anhSP['link_hinh_anh'] ?>', <?= $key + 1 ?>)">
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                            
                                    <!-- Phần thông tin sản phẩm -->
                                    <div class="col-12 col-md-6">
                                        <div class="card shadow-sm p-4" style="background-color: #ffffff;">
                                            <h3 class="card-title text-primary mb-3"><?= $sanPham['ten_san_pham'] ?></h3>
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th class="col-6">Tác Giả</th>
                                                        <td><?= $sanPham['tac_gia'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Giá tiền</th>
                                                        <td class="text-danger font-weight-bold"><?= $sanPham['gia_ban'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gía khuyến mãi</th>
                                                        <td class="text-success font-weight-bold"><?= $sanPham['gia_khuyen_mai'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Số lượng</th>
                                                        <td><?= $sanPham['so_luong'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Lượt xem</th>
                                                        <td><?= $sanPham['luot_xem'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Ngày nhập</th>
                                                        <td><?= $sanPham['ngay_nhap'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Danh mục</th>
                                                        <td><?= $sanPham['ten_danh_muc'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Trạng thái</th>
                                                        <td class="<?= $sanPham['trang_thai'] == 1 ? 'text-success' : 'text-danger' ?>">
                                                            <?= $sanPham['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán' ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mô tả</th>
                                                        <td class="text-muted"><?= $sanPham['mo_ta'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>        
                    </div>



          <hr>
          <div class="card">
          <div class="card-header align-items-center">
              <h2>Bình luận của sản phẩm</h2>
              <div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Người bình luận</th>
                      <th>Nội dung</th>
                      <th>Ngày bình luận</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($listBinhLuan)) : ?>
                    <?php foreach ($listBinhLuan as $key => $binhluan) :?>
                    <tr>
                        <td><?= $key + 1?></td>
                        
                        <td><?= $binhluan['ten_nguoi_dung']?></td>
                        <td><?= $binhluan['noi_dung']?></td>
                        <td><?= $binhluan['ngay_binh_luan']?></td>
                        
                        
                    </tr>
                    <?php endforeach;?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center">Sản phẩm chưa có bình luận nào.</td>
                        </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
        </div>
                        </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear());
                                
                            </script> © King Manga.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

    <script>
 let currentImageIndex = 0;
    const totalImages = <?= count($listAnhSanPham) + 1 ?>;

    // Hàm thay đổi ảnh chính
    function changeMainImage(imageUrl, index) {
        document.getElementById('mainImage').src = imageUrl;
        updateThumbnailBorder(index);
        currentImageIndex = index;
    }

    // Hàm cập nhật viền của ảnh thu nhỏ
    function updateThumbnailBorder(index) {
        for (let i = 0; i < totalImages; i++) {
            document.getElementById('thumb-' + i).classList.remove('border-primary');
        }
        document.getElementById('thumb-' + index).classList.add('border-primary');
    }

    // Hàm điều hướng ảnh
    function navigateCarousel(direction) {
        currentImageIndex += direction;

        // Kiểm tra nếu quá giới hạn số lượng ảnh
        if (currentImageIndex < 0) {
            currentImageIndex = totalImages - 1;
        } else if (currentImageIndex >= totalImages) {
            currentImageIndex = 0;
        }

        // Cập nhật ảnh chính và viền của ảnh thu nhỏ
        const mainImageUrl = document.getElementById('thumb-' + currentImageIndex).src;
        changeMainImage(mainImageUrl, currentImageIndex);
    }
    </script>

</body>

</html>