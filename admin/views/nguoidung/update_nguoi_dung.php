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
                                <h4 class="mb-sm-0">Quản Lý Người Dùng</h4>
                                

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Cập Nhật Người Dùng</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Cập Nhật Người Dùng</h4>

                                </div><!-- end card header -->
                                <form action="<?='?act=sua-nguoi-dung' ?>" method="POST" enctype="multipart/form-data">
                            <input type="text" name="id_nguoi_dung" value="<?= $nguoiDung['id'] ?>" hidden>
                            

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên người dùng:</label>
                                    <input type="text" readonly class="form-control" name="ten_nguoi_dung" value="<?= $nguoiDung['ten_nguoi_dung'] ?>" placeholder="Nhập tên danh mục">
                                    <?php if (isset($errors['ten_nguoi_dung'])) { ?>
                                        <p class="text-danger"><?= $errors['ten_nguoi_dung'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" readonly class="form-control" name="sdt" value="<?= $nguoiDung['sdt'] ?>" placeholder="Nhập tên danh mục">
                                    <?php if (isset($errors['sdt'])) { ?>
                                        <p class="text-danger"><?= $errors['sdt'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" readonly class="form-control" name="email" value="<?= $nguoiDung['email'] ?>" placeholder="Nhập tên danh mục">
                                    <?php if (isset($errors['email'])) { ?>
                                        <p class="text-danger"><?= $errors['email'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" readonly class="form-control" name="dia_chi" value="<?= $nguoiDung['dia_chi'] ?>" placeholder="Nhập tên danh mục">
                                    <?php if (isset($errors['dia_chi'])) { ?>
                                        <p class="text-danger"><?= $errors['dia_chi'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ForminputState" class="form-label">Vai trò</label>
                                                        <select name="vai_tro" class="form-select">
                                                            <option value="1" <?= $nguoiDung['vai_tro'] == 1 ? 'selected' : ''?>>Admin</option>
                                                            <option value="2" <?= $nguoiDung['vai_tro'] == 2 ? 'selected' : ''?>>Client</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ForminputState" class="form-label">Trạng thái</label>
                                                        <select name="trang_thai" class="form-select">
                                                            <option value="1" <?= $nguoiDung['trang_thai'] == 1 ? 'selected' : ''?>>Action</option>
                                                            <option value="2" <?= $nguoiDung['trang_thai'] == 2 ? 'selected' : ''?>>Block</option>
                                                        </select>

                                                    </div>
                                                </div>
                              
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

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