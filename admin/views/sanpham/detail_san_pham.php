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
                    

                  <div class="container my-5">
    <div class="row">
        <!-- Phần ảnh sản phẩm -->
        <div class="col-12 col-md-6">
            <div id="productCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <!-- Ảnh chính -->
                    <div class="carousel-item active">
                        <img src="<?=  BASE_URL . $sanPham['hinh_anh'] ?>" class="d-block w-100" alt="Product Image" style="height: 400px; object-fit: cover;border-radius:10px">
                    </div>
                    <!-- Ảnh nhỏ hơn trong $listAnhSanPham -->
                    <?php foreach ($listAnhSanPham as $anhSP) : ?>
                        <div class="carousel-item">
                            <img src=" <?= BASE_URL . $anhSP['link_hinh_anh'] ?>" class="d-block w-100" alt="Product Thumbnail" style="height: 400px; object-fit: cover;">
                        </div>
                    <?php endforeach ?>
                </div>
                <!-- Điều hướng ảnh -->
                <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- Ảnh thu nhỏ -->
            <div class="mt-3 d-flex justify-content-center">
                 <img src="<?=  BASE_URL . $sanPham['hinh_anh'] ?>" class="product-thumbnail img-thumbnail mr-2" alt="Thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                <?php foreach ($listAnhSanPham as $key => $anhSP) : ?>
                    <img src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" class="product-thumbnail img-thumbnail mr-2 <?= $key == 0 ? 'border-primary' : '' ?>" alt="Thumbnail" style="width: 60px; height: 60px; object-fit: cover;"  onclick="changeMainImage('<?= $anhSP['link_hinh_anh'] ?>')">
                <?php endforeach ?>
            </div>
        </div>
        
        <!-- Phần thông tin sản phẩm -->
        <div class="col-12 col-md-6">
            <div class="card shadow-sm p-4">
                <h3 class="card-title text-primary"><?= $sanPham['ten_san_pham'] ?></h3>
                <hr>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Tác Giả: <span><?= $sanPham['tac_gia'] ?></span></li>
                    <li class="list-group-item">Giá tiền: <span class="text-danger font-weight-bold"><?= $sanPham['gia_ban'] ?></span></li>
                    <li class="list-group-item">Gía khuyến mãi: <span class="text-success font-weight-bold"><?= $sanPham['gia_khuyen_mai'] ?></span></li>
                    <li class="list-group-item">Số lượng: <span><?= $sanPham['so_luong'] ?></span></li>
                    <li class="list-group-item">Lượt xem: <span><?= $sanPham['luot_xem'] ?></span></li>
                    <li class="list-group-item">Ngày nhập: <span><?= $sanPham['ngay_nhap'] ?></span></li>
                    <li class="list-group-item">Danh mục: <span><?= $sanPham['ten_danh_muc'] ?></span></li>
                    <li class="list-group-item">Trạng thái: <span class="<?= $sanPham['trang_thai'] == 1 ? 'text-success' : 'text-danger' ?>"><?= $sanPham['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán' ?></span></li>
                    <li class="list-group-item">Mô tả: <p class="text-muted mt-2"><?= $sanPham['mo_ta'] ?></p></li>
                </ul>
            </div>
        </div>
    </div>
</div>
          <hr>
          <h2>Bình luận của sản phẩm</h2>
          <div>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Người bình luận</th>
                  <th>Nội dung</th>
                  <th>Ngày bình luận</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
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
        function changeMainImage(imageUrl) {
    // Tìm ảnh lớn bằng ID và thay đổi thuộc tính src của nó
    document.getElementById("mainProductImage").src = imageUrl;

    // Thêm border cho ảnh thu nhỏ được chọn
    const thumbnails = document.querySelectorAll('.product-thumbnail');
    thumbnails.forEach(thumbnail => {
        thumbnail.classList.remove('border-primary');
        if (thumbnail.src === imageUrl) {
            thumbnail.classList.add('border-primary');
        }
    });
}
    </script>

</body>

</html>