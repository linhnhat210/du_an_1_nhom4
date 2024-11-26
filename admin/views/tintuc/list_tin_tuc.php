<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>King Manga - Quản Lý Tin Tức</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <?php
    require_once "views/layouts/libs_css.php";
    ?>
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
                                        <li class="breadcrumb-item active">Tin Tức</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bắt đầu Form tìm kiếm -->
                    <div class="row">
                        <div class="col">
                            <form action="?act=search-tin-tuc" method="POST">
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
                    <br>
                    <!-- Kết thúc Form tìm kiếm -->

                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Tin Tức</h4>
                                        <a href="?act=form-them-tin-tuc" type="button" class="btn btn-soft-success material-shadow-none">
                                            <i class="ri-add-circle-line align-middle me-1"></i>Thêm Tin Tức
                                        </a>
                                    </div>

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-nowrap align-middle mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">STT</th>
                                                            <th scope="col">Tiêu Đề</th>
                                                            <th scope="col">Hình Ảnh</th>
                                                            <th scope="col">Nội Dung</th>
                                                            <th scope="col">Trạng Thái</th>
                                                            <th scope="col">Thao Tác</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($tinTucs as $index => $tinTuc) : ?>
                                                        <tr>
                                                            <td class="fw-medium"><?= $index + 1 ?></td>
                                                            <td><?php
                       
                        $noi_dung = $tinTuc['tieu_de'];
                        $words = explode(' ', $noi_dung);
                        if (count($words) > 6) {
                           
                            $words = array_slice($words, 0, 6);
                            $noi_dung = implode(' ', $words) . '...';
                        }
                        echo $noi_dung;
                        ?></td>
                                                            <td>
                                                                <img src="<?= BASE_URL . $tinTuc['hinh_anh'] ?>" style="width:100px;height:100px" alt="Hình ảnh tin tức">
                                                            </td>
                                                            <td>
                                                                <?php
                        // Limit the content to 80 words
                        $noi_dung = $tinTuc['noi_dung'];
                        $words = explode(' ', $noi_dung); 
                        if (count($words) > 50) {
                           
                            $words = array_slice($words, 0, 50);
                            $noi_dung = implode(' ', $words) . '...';
                        }
                        echo $noi_dung;
                        ?>
                    </p>
                                                            </td>
                                                            <td>
                                                                <?php if ($tinTuc["trang_thai"] == 1): ?>
                                                                    <span class="badge bg-success">Hiển Thị</span>
                                                                <?php else: ?>
                                                                    <span class="badge bg-danger">Không Hiển Thị</span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <div class="hstack gap-3 flex-wrap">
                                                                    <a href="?act=form-sua-tin-tuc&tin_tuc_id=<?= $tinTuc['id'] ?>" class="link-success fs-15">
                                                                        <i class="ri-edit-2-line"></i>
                                                                    </a>
                                                                    <form action="?act=xoa-tin-tuc" method="POST" onsubmit="return confirm('Bạn có đồng ý xóa không?')">
                                                                        <input type="hidden" name="tin_tuc_id" value="<?= $tinTuc['id'] ?>">
                                                                        <button type="submit" class="link-danger fs-15" style="border:none;background:none;">
                                                                            <i class="ri-delete-bin-line"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
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
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
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

    <?php
    require_once "views/layouts/libs_js.php";
    ?>
</body>
</html>
