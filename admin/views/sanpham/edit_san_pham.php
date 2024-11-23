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
                            <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin sản phẩm <?= $sanPham['ten_san_pham'] ?></h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                                <form action="<?= '?act=post-sua-san-pham' ?>" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                            <label for="ten_san_pham">Tên sản phẩm</label>
                                            <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control" value="<?= $sanPham['ten_san_pham'] ?>">
                                            <?php if (isset($_SESSION['errors']['ten_san_pham'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['ten_san_pham'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="gia_san_pham">Giá sản phẩm</label>
                                            <input type="number" id="gia_san_pham" name="gia_san_pham" class="form-control" value="<?= $sanPham['gia_ban'] ?>">
                                            <?php if (isset($_SESSION['errors']['gia_san_pham'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['gia_san_pham'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="gia_khuyen_mai">Giá khuyến mãi</label>
                                            <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control" value="<?= $sanPham['gia_khuyen_mai'] ?>">
                                            <?php if (isset($_SESSION['errors']['gia_khuyen_mai'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['gia_khuyen_mai'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="hinh_anh">Hình ảnh</label>
                                            <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="so_luong">Số lượng</label>
                                            <input type="number" id="so_luong" name="so_luong" class="form-control" value="<?= $sanPham['so_luong'] ?>">
                                            <?php if (isset($_SESSION['errors']['so_luong'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['so_luong'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="ngay_nhap">Ngày nhập</label>
                                            <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control" value="<?= $sanPham['ngay_nhap'] ?>">
                                            <?php if (isset($_SESSION['errors']['ngay_nhap'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['ngay_nhap'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="inoutStatus">Danh mục sản phẩm</label>
                                            <select id="inoutStatus" name="danh_muc_id" class="form-control custom-select">
                                                <?php foreach ($listDanhMuc as $danhMuc) : ?>
                                                    <option <?= $danhMuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="trang_thai">Trạng thái sản phẩm</label>
                                            <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                                                <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn bán</option>
                                                <option <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Dừng bán</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="mo_ta">Mô tả sản phẩm</label>
                                            <textarea id="mo_ta" name="mo_ta" class="form-control" rows="4"><?= $sanPham['mo_ta'] ?></textarea>
                                            <?php if (isset($_SESSION['errors']['mo_ta'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['mo_ta'] ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                                    </div>
                                </form>
                              
                                </div>  
                                
                     <!-- /.card -->
                     </div>
<div class="card-body p-0">
    <form action="?act=sua-album-anh-san-pham" method="POST" enctype="multipart/form-data">
        <div class="table-responsive">
            <table id="faqs" class="table table-hover table-bordered align-middle mb-0">
                <thead style="background-color: #ccffcc;"> <!-- Xanh lá mạ -->
                    <tr>
                        <th class="text-center" style="width: 15%;">Ảnh</th>
                        <th class="text-center" style="width: 60%;">File</th>
                        <th class="text-center" style="width: 25%;">
                            <button type="button" class="btn btn-sm btn-success" onclick="addRow()">
                                <i class="fa fa-plus"></i> Thêm
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <input type="hidden" name="san_pham_id" value="<?=$sanPham['id']?>">
                    <input type="hidden" id="img_delete" name="img_delete">
                    <?php foreach ($listAnhSanPham as $key => $value) : ?>
                        <tr id="faqs-row-<?= $key ?>">
                            <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">
                            <td class="text-center">
                                <img src="<?= BASE_URL . $value['link_hinh_anh'] ?>" class="img-thumbnail" style="width: 50px; height: 50px;" alt="">
                            </td>
                            <td>
                                <input type="file" name="img_array[]" class="form-control form-control-sm">
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-danger" type="button" onclick="removeRow('faqs-row-<?= $key ?>', <?= $value['id'] ?>)">
                                    <i class="fa fa-trash"></i> Xóa
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary btn-lg">Sửa thông tin</button>
        </div>
    </form>
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
                                document.write(new Date().getFullYear());
let rowCount = <?= count($listAnhSanPham) ?>;

function addRow() {
    rowCount++;
    let tableBody = document.querySelector("#faqs tbody");
    let newRow = document.createElement("tr");
    newRow.id = `faqs-row-${rowCount}`;
    newRow.innerHTML = `
        <td></td>
        <td><input type="file" name="img_array[]" class="form-control"></td>
        <td>
            <button class="badge badge-danger" style="color:black;" type="button" onclick="removeRow('faqs-row-${rowCount}')">
                <i class="fa fa-trash"></i> Delete
            </button>
        </td>`;
    tableBody.appendChild(newRow);
}

function removeRow(rowId, imageId = null) {
    let row = document.getElementById(rowId);
    if (row) {
        row.remove(); // Xóa hàng

        // Thêm `imageId` vào `img_delete` nếu `imageId` không phải null
        if (imageId !== null) {
            let imgDeleteInput = document.getElementById("img_delete");
            imgDeleteInput.value += imageId + ",";
        }
    }
}

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