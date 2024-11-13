<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
<head>
    <meta charset="utf-8" />
    <title>King Manga - Chỉnh Sửa Tin Tức</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Quản lý tin tức" name="description" />
    <meta content="Themesbrand" name="author" />
    
    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>
</head>

<body>

    <div id="layout-wrapper">
        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";
        require_once "views/layouts/siderbar.php";
        ?>
        
        <div class="vertical-overlay"></div>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Chỉnh Sửa Tin Tức</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Chỉnh Sửa Tin Tức</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Chỉnh Sửa Tin Tức<p style="font-size:10px;">(Các trường có dấu * là bắt buộc)</p></h4>
                                </div>
                                <div class="card-body">
                                    <form action="?act=post-sua-tin-tuc" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $tinTuc['id'] ?>">

                                        <div class="mb-3">
                                            <label for="tieu_de" class="form-label">Tiêu Đề(*)</label>
                                            <input type="text" class="form-control" name="tieu_de" value="<?= $tinTuc['tieu_de'] ?>" placeholder="Nhập tiêu đề">
                                            <span class="text-danger"><?= $_SESSION["errors"]["tieu_de"] ?? '' ?></span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="noi_dung" class="form-label">Nội Dung(*)</label>
                                            <textarea class="form-control" name="noi_dung" rows="5" placeholder="Nhập nội dung"><?= $tinTuc['noi_dung'] ?></textarea>
                                            <span class="text-danger"><?= $_SESSION["errors"]["noi_dung"] ?? '' ?></span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="hinh_anh" class="form-label">Hình Ảnh</label>
                                            <input type="file" class="form-control" name="hinh_anh">
                                            <?php if (!empty($tinTuc['hinh_anh'])): ?>
                                                <img src="path/to/image/<?= $tinTuc['hinh_anh'] ?>" alt="Hình ảnh hiện tại" width="100">
                                            <?php endif; ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="trang_thai" class="form-label">Trạng Thái(*)</label>
                                            <select name="trang_thai" class="form-select">
                                                <option value="1" <?= $tinTuc['trang_thai'] == 1 ? 'selected' : '' ?>>Hiển Thị</option>
                                                <option value="2" <?= $tinTuc['trang_thai'] == 2 ? 'selected' : '' ?>>Không Hiển Thị</option>
                                            </select>
                                        </div>

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                                        </div>
                                    </form>
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
                        <div class="col-sm-6 text-end">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Back-to-top button -->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

    <!-- JavaScript -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>
</body>
</html>
