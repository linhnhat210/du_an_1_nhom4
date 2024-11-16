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
                                        <li class="breadcrumb-item active">Người Dùng</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Tài khoản người dùng</h4>

                                </div><!-- end card header -->

                                            <section class="content">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <td>
                                                                <img src="<?= $nguoiDung['avatar'] ?>"
                                                                    style="width:80%; " alt=""
                                                                    onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png'">
                                                            </td>
                                                        </div>
                                                        <div class="col-8">
                                                            <table class="table table-borderless">
                                                                <tbody style="font-size: large;">
                                                                    <tr>
                                                                        <th>Họ tên:</th>
                                                                        <td><?= $nguoiDung['ten_nguoi_dung'] ?? '' ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Ngày sinh:</th>
                                                                        <td><?= $nguoiDung['ngay_sinh'] ?? '' ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Email:</th>
                                                                        <td><?= $nguoiDung['email'] ?? '' ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Số điện thoại:</th>
                                                                        <td><?= $nguoiDung['sdt'] ?? '' ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Giới tính:</th>
                                                                        <td><?= $nguoiDung['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Địa chỉ:</th>
                                                                        <td><?= $nguoiDung['dia_chi'] ?? '' ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Vai Trò:</th>
                                                                        <td><?= $nguoiDung['vai_tro'] == 1 ? 'Admin' : 'Client' ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col-12">
                                                            <hr>
                                                            <h2>Lịch sử mua hàng</h2>
                                                            <div>
                                                                <table id="example1" class="table table-bordered table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>STT</th>
                                                                            <th>Mã đơn hàng</th>
                                                                            <th>Tên người nhân</th>
                                                                            <th>Số điện thoại</th>
                                                                            <th>Ngày đặt</th>
                                                                            <th>Tổng Tiền</th>
                                                                            <th>Trạng thái</th>
                                                                            <th>Thao tác</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($listDonHang as $key => $donHang) : ?>
                                                                            <tr>
                                                                                <td><?= $key + 1 ?></td>
                                                                                <td><?= $donHang['ma_don_hang'] ?></td>
                                                                                <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                                                                <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                                                                <td><?= $donHang['ngay_dat'] ?></td>
                                                                                <td><?= $donHang['tong_tien'] ?></td>
                                                                                <td><?= $donHang['ten_trang_thai'] ?></td>
                                                                                <td>
                                                                                    <div class="btn-group">
                                                                                       <a style="margin-right:15px;" href="<?= '?act=chi-tiet-don-hang&id_don_hang=' . $donHang['id'] ?>" class="link-success fs-15"><i class="las la-eye"></i></a>
                                                <a href="<?=  '?act=form-sua-don-hang&id_don_hang=' . $donHang['id'] ?>"  class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <?php endforeach ?>
                                                                        </tbody>
                                                                    </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <hr>
                                                            <h2>Lịch sử bình luận</h2>
                                                            <div>
                                                                <table id="example1" class="table table-striped table-nowrap align-middle mb-0">
                                                                <thead>
                                                                    <tr>
                                                                    <th>STT</th>
                                                                    <th>Sản Phẩm</th>
                                                                    <th>Ảnh Sản phẩm</th>
                                                                    <th>Nội dung</th>
                                                                    <th>Ngày bình luận</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if (!empty($listBinhLuan)) : ?>
                                                                    <?php foreach ($listBinhLuan as $key => $binhluan) :?>
                                                                    <tr>
                                                                        <td><?= $key + 1?></td>
                                                                        
                                                                        <td><?= $binhluan['ten_san_pham']?></td>
                                                                        <td>
                                                                            <img style="border-radius:5px;" src="<?= BASE_URL . $binhluan['hinh_anh']?>" alt="chưa có ảnh" width="100px" height="100px">
                                                                        </td>
                                                                        <td><?= $binhluan['noi_dung']?></td>
                                                                        <td><?= $binhluan['ngay_binh_luan']?></td>
                                                                        
                                                                        
                                                                    </tr>
                                                                    <?php endforeach;?>
                                                                    <?php else : ?>
                                                                        <tr>
                                                                            <td colspan="6" class="text-center">Người dùng chưa có bình luận nào.</td>
                                                                        </tr>
                                                                    <?php endif; ?>
                                                                </tbody>
                                                                </table>
                                                            </div>
                                                            <hr>
                                                            <h2>Lịch sử đánh giá</h2>
                                                            <div>
                                                                <table id="example1" class="table table-striped table-nowrap align-middle mb-0">
                                                                <thead>
                                                                    <tr>
                                                                    <th>STT</th>
                                                                    <th>Sản Phẩm</th>
                                                                    <th>Ảnh Sản phẩm</th>
                                                                    <th>Đánh giá</th>
                                                                    <th>Ngày đánh giá</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if (!empty($listDanhGia)) : ?>
                                                                    <?php foreach ($listDanhGia as $key => $danhgia) :?>
                                                                    <tr>
                                                                        <td><?= $key + 1?></td>
                                                                        
                                                                        <td><?= $danhgia['ten_san_pham']?></td>
                                                                        <td>
                                                                            <img style="border-radius:5px;" src="<?= BASE_URL . $danhgia['hinh_anh']?>" alt="chưa có ảnh" width="100px" height="100px">
                                                                        </td>
                                                                        <td><?= $danhgia['danh_gia']?></td>
                                                                        <td><?= $danhgia['ngay_danh_gia']?></td>
                                                                        
                                                                        
                                                                    </tr>
                                                                    <?php endforeach;?>
                                                                    <?php else : ?>
                                                                        <tr>
                                                                            <td colspan="6" class="text-center">Người dùng chưa có bình luận nào.</td>
                                                                        </tr>
                                                                    <?php endif; ?>
                                                                </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.row -->
                                                </div>
                                                <!-- /.container-fluid -->
                                            </section>
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