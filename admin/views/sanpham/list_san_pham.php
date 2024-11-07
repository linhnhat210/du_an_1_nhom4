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
                                        <li class="breadcrumb-item active">Sản Phẩm</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Sản Phẩm</h4>
                                     <a href="?act=form-them-san-pham" type="button" class="btn btn-soft-success material-shadow-none"><i class="ri-add-circle-line align-middle me-1"></i>Thêm Sản Phẩm</a>

                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">STT</th>
                                                        <th scope="col">Tên Sản Phẩm</th>
                                                        <th scope="col">Hình Ảnh</th>
                                                        <th scope="col">Giá Tiền</th>
                                                        <th scope="col">Danh Mục</th>
                                                        <th scope="col">Trạng Thái</th>
                                                        <th scope="col">Thao Tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($sanPhams as $index => $sanPham) : ?>
                                                    <tr>
                                                        <td class="fw-medium"><?= $index +1 ?></td>
                                                        <td><?= $sanPham["ten_san_pham"]?></td>
                                                        <td>
                                                            <img src="BASE_URL . <?= $sanPham['hinh_anh']?>" style="width:100px;" alt=""
                                                            onerror="this.onerror=null; this.src='data:image/jpeg;base64,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'"
                                                            >
                                                        </td>
                                                        <td><?= $sanPham["gia_ban"]?></td>
                                                        <td><?= $sanPham["ten_danh_muc"]?></td>
                                                        <td>
                                                            <?php
                                                            if ($sanPham["trang_thai"] == 1){
                                                            ?>
                                                            <span class="badge bg-success">Hiển Thị</span>
                                                            <?php
                                                            }else{
                                                            ?>
                                                            <span class="badge bg-danger">Không Hiển Thị</span>
                                                            <?php } 
                                                            ?>
                                                        </td>
                                                        <td>
                                                                <div class="hstack gap-3 flex-wrap">
                                                                    <a href="?act=form-sua-danh-muc&danhMucID=<?= $danhMuc['id']?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                                    <form action="?act=xoa-danh-muc" method="POST"
                                                                     onsubmit="return confirm('Bạn có đồng ý xóa không')">
                                                                    <input type="hidden" name="danhMucID" value="<?= $danhMuc['id'] ?>">
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
                                   
                                </div><!-- end card-body -->
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