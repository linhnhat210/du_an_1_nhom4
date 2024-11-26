<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>King Manga - Thêm Tin Tức</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php require_once "views/layouts/libs_css.php"; ?>
</head>

<body>
    <div id="layout-wrapper">
        <?php
        require_once "views/layouts/header.php";
        require_once "views/layouts/siderbar.php";
        ?>

        <div class="vertical-overlay"></div>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản Lý Tin Tức</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Thêm Tin Tức</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Thêm Tin Tức<p style="font-size:10px;">(Bắt buộc phải nhập ô có dấu *)</p></h4>
                                    </div>

                                    <div class="card-body">               
                                        <div class="live-preview">
                                            <form action="?act=post-them-tin-tuc" method="POST" enctype="multipart/form-data"> 
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="tieuDeInput" class="form-label">Tiêu Đề(*)</label>
                                                            <input type="text" class="form-control" placeholder="Nhập vào tiêu đề tin tức" name="tieu_de">
                                                            <span class="text-danger"><?= !empty($_SESSION["errors"]["tieu_de"]) ? $_SESSION["errors"]["tieu_de"] : '' ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="trangThaiInput" class="form-label">Trạng Thái(*)</label>
                                                            <select name="trang_thai" class="form-select">
                                                                <option value="1">Hiển Thị</option>
                                                                <option value="0">Không Hiển Thị</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="noiDungInput" class="form-label">Nội Dung(*)</label>
                                                            <textarea class="form-control" rows="5" placeholder="Nhập nội dung tin tức" name="noi_dung" id="noidungbaiviet"></textarea>
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']["noi_dung"]) ? $_SESSION["errors"]["noi_dung"] : '' ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="hinhAnhInput" class="form-label">Hình Ảnh</label>
                                                            <input type="file" class="form-control" name="hinh_anh">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-primary">Thêm Tin Tức</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>                                 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © King Manga.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">Design & Develop by Themesbrand</div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

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

    <?php require_once "views/layouts/libs_js.php"; ?>

</body>
</html>
