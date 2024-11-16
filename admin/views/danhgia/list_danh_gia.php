<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

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
                                <h4 class="mb-sm-0">Quản Lý Đánh Giá</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Đánh giá</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                               <!-- Striped Rows -->
                               <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Danh Sách Đánh Giá</h4>

                                </div><!-- end card header -->

                                <div class="card-body">
                                    <table class="table table-striped table-nowrap align-middle mb-0">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Khách Hàng</th>
                                            <th>Sản Phẩm</th>
                                            <th>Ảnh Sản Phẩm</th>
                                            <th>Đánh Giá</th>
                                            <th>Ngày Đánh Giá</th>
                                            <th>Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (!empty($danhGias) && is_array($danhGias)) : ?>
                                    <?php foreach ($danhGias as $key => $danhGia) : ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $danhGia['ten_nguoi_dung'] ?></td>
                                            <td><?= $danhGia['ten_san_pham'] ?></td>
                                            <td>
                                                <img src="<?= BASE_URL . $danhGia['hinh_anh']?>" alt="" width="100px" height="100px">
                                            </td>
                                            <td><?= $danhGia['danh_gia'] ?></td>
                                            <td><?= $danhGia['ngay_danh_gia'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    
                                                     <form action="?act=xoa-danh-gia" method="POST"
                                                                     onsubmit="return confirm('Bạn có đồng ý xóa không')">
                                                                    <input type="hidden" name="id_danh_gia" value="<?= $danhGia['id'] ?>">
                                                                    <button type="submit" class="link-danger fs-15" style="border:none;background:none;">
                                                                        <i class="ri-delete-bin-line"></i>
                                                                    </button>
                                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Không có đánh giá nào.</td>
                                    </tr>
                                <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- end card -->

                            </div> <!-- end .h-100-->

                        </div> <!-- end col -->
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
                                document.write(new Date().getFullYear())
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

</body>

</html>
