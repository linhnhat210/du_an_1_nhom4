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
                                        <li class="breadcrumb-item active">Thêm Sản Phẩm</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    

                    <div class="row">
                        <div class="col">

                            <div class="h-100 d-flex">
                               <!-- Striped Rows -->
                            <div class="card col-md-8" style="margin-right: 15px;">
                                <div class="card-header align-items-center d-flex " style="background-color: rgb(20, 197, 197);">
                                    <h4 class="card-title mb-0 flex-grow-1">Cập Nhật Sản Phẩm<p style="font-size:10px;">(Bắt buộc phải nhập ô có dấu *)</p></h4>
                                    
                                    
                                    

                                </div><!-- end card header -->

                                <div class="card-body">               
                                    <div class="live-preview">
                                        <form action="?act=post-sua-san-pham" method="POST" enctype="multipart/form-data"> 
                                            <input type="hidden" name="id" value="<?= $sanPham['id'] ?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Tên Sản Phẩm</label>
                                                        <input type="text" class="form-control" placeholder="Nhập vào tên sản phẩm(*)" name="ten_san_pham" value="<?=$sanPham['ten_san_pham']?>">
                                                   
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION["errors"]["ten_san_pham"]) ?  $_SESSION["errors"]["ten_san_pham"] : '' ?>
                                                        </span>
                                                    </div>
                                                    
                                                </div>
                                                <!--end col-->
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Tác Giả</label>
                                                        <input type="text" class="form-control" placeholder="Nhập vào tên tác giả(*)" name="tac_gia" value="<?=$sanPham['tac_gia']?>">
                                                   
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION["errors"]["tac_gia"]) ?  $_SESSION["errors"]["tac_gia"] : '' ?>
                                                        </span>
                                                    </div>
                                                    
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Giá Bán</label>
                                                        <input type="text" class="form-control" placeholder="Nhập vào giá sản phẩm(*)" name="gia_ban" value="<?=$sanPham['gia_ban']?>">
                                                        
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION["errors"]["gia_ban"]) ?  $_SESSION["errors"]["gia_ban"] : '' ?>
                                                        </span>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Giá Khuyến Mãi</label>
                                                        <input type="text" class="form-control" placeholder="Nhập vào giá khuyến mãi(*)" name="gia_khuyen_mai" value="<?=$sanPham['gia_khuyen_mai']?>">
                                                        
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION["errors"]["gia_khuyen_mai"]) ?  $_SESSION["errors"]["giaKhuyen_mai"] : '' ?>
                                                        </span>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Số Lượng</label>
                                                        <input type="text" class="form-control" placeholder="Nhập vào sô lượng(*)" name="so_luong" value="<?=$sanPham['so_luong']?>">
                                                        
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION["errors"]["so_luong"]) ?  $_SESSION["errors"]["so_luong"] : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Ngày Nhập</label>
                                                        <input type="date" class="form-control"  name="ngay_nhap" value="<?=$sanPham['ngay_nhap']?>">
                                                        
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION["errors"]["ngay_nhap"]) ?  $_SESSION["errors"]["ngay_nhap"] : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-6">
                                                        <label for="citynameInput" class="form-label">Mô tả</label>
                                                        <textarea type="text" class="form-control" placeholder="Mô tả(*)" name="mo_ta"><?=$sanPham['mo_ta']?></textarea>
                                                        
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION["errors"]["mo_ta"]) ?  $_SESSION["errors"]["mo_ta"] : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ForminputState" class="form-label">Danh Mục</label>
                                                        <select name="danh_muc_id" class="form-select">
                                                            <?php foreach($listDanhMuc as $index => $danh_muc) :?>
                                                                <option value="<?=$danh_muc['id']?>"><?=$danh_muc['ten_danh_muc']?></option>

                                                                <?php endforeach; ?>
                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                <!--end col-->
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ForminputState" class="form-label">Trạng Thái</label>
                                                        <select name="trang_thai" class="form-select">
                                                            <option selected value="1">Hiển Thị</option>
                                                            <option value="2">Không Hiển Thị</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Hình Ảnh</label>
                                                        <input type="file" class="form-control"  name="hinh_anh">
                                                   
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Album Ảnh</label>
                                                        <input type="file" class="form-control"  name="img_array[]" multiple>
                                                        
                                                        
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary">Sửa</button>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                 
                                </div>
                                
                            </div>
                                <div class="card">
                                <div class="card-header align-items-center d-flex" style="background-color: rgb(23, 204, 77);">
                                    <h4 class="card-title mb-0 flex-grow-1">Cập Nhật Album Anh<p style="font-size:10px;">(Bắt buộc phải nhập ô có dấu *)</p></h4>
                                    
                                    
                                    

                                </div><!-- end card header -->

                                <div class="card-body ">               
                                    <div class="live-preview">
                                        <form action="?act=post-sua-san-pham" method="POST" enctype="multipart/form-data"> 
                                         <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Tên Sản Phẩm</label>
                                                        <input type="text" class="form-control" placeholder="Nhập vào tên sản phẩm(*)" name="ten_san_pham" value="<?=$sanPham['ten_san_pham']?>">
                                                   
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION["errors"]["ten_san_pham"]) ?  $_SESSION["errors"]["ten_san_pham"] : '' ?>
                                                        </span>
                                                    </div>
                                                    
                                                </div>
                                                <!-- end col -->
                                                 <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Tác Giả</label>
                                                        <input type="text" class="form-control" placeholder="Nhập vào tên tác giả(*)" name="tac_gia" value="<?=$sanPham['tac_gia']?>">
                                                   
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION["errors"]["tac_gia"]) ?  $_SESSION["errors"]["tac_gia"] : '' ?>
                                                        </span>
                                                    </div>
                                                    
                                                </div>
                                        </form>
                                    </div>
                                 
                                </div>
                                
                            </div>

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