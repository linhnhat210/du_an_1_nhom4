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

    <!-- Bắt đầu trang -->
    <div id="layout-wrapper">

        <!-- TIÊU ĐỀ -->
        <?php
        require_once "views/layouts/header.php";
        require_once "views/layouts/siderbar.php";
        ?>
        
        <!-- Kết thúc Sidebar -->
        <!-- Lớp phủ khi Sidebar đóng -->
        <div class="vertical-overlay"></div>

        <!-- Bắt đầu nội dung chính -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- Bắt đầu tiêu đề trang -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản Lý Liên Hệ</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Liên Hệ</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Kết thúc tiêu đề trang -->
                    
                    <!-- Bắt đầu Form tìm kiếm -->
                    <div class="row">
                        <div class="col">
                            <form action="?act=search-lien-he" method="POST">
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
                               <!-- Bảng danh sách -->
                               <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Liên Hệ</h4>
                                </div><!-- kết thúc phần đầu thẻ -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">STT</th>
                                                        <th scope="col">Tên Khách Hàng</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Số Điện Thoại</th>
                                                        <th scope="col">Tin nhắn</th>
                                                        <th scope="col">Ngày liên hệ</th>
                                                        <th scope="col">Trạng Thái</th>
                                                        <th scope="col">Thao Tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($lienHes as $index => $danhMuclienhe) : ?>
                                                    <tr>
                                                        <td class="fw-medium"><?= $index +1 ?></td>
                                                        <td><?= $danhMuclienhe["ten_khach_hang"]?></td>
                                                        <td><?= $danhMuclienhe["email"]?></td>
                                                        <td><?= $danhMuclienhe["so_dien_thoai"]?></td>
                                                        <td><?= $danhMuclienhe["tin_nhan"]?></td>
                                                        <td><?= $danhMuclienhe["ngay_lien_he"]?></td>
                                                        <td>
                                                            <?php
                                                            if ($danhMuclienhe["trang_thai"] == 1){
                                                            ?>
                                                            <span class="badge bg-success">Đã liên hệ</span>
                                                            <?php
                                                            }else{
                                                            ?>
                                                            <span class="badge bg-danger">Chưa liên hệ</span>
                                                            <?php } 
                                                            ?>
                                                        </td>
                                                         <td>
                                                                <div class="hstack gap-3 flex-wrap">
                                                                    <a href="?act=form-sua-lien-he&lien_he_id=<?= $danhMuclienhe['id']?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                                </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                   
                                </div><!-- kết thúc phần thân thẻ -->
                            </div><!-- kết thúc thẻ -->

                            </div> <!-- kết thúc .h-100-->

                        </div> <!-- kết thúc cột -->
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- Kết thúc nội dung trang -->

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
        <!-- Kết thúc nội dung chính-->

    </div>
    <!-- KẾT THÚC layout-wrapper -->

    <!-- nút trở về đầu trang -->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!-- kết thúc trở về đầu trang -->

    <!-- preloader -->
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
