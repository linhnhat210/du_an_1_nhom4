<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>King Manga</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <style>
        /* Card styling for order card */
.order-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
}

/* Card header */
.order-header {
    background-color: #f8f9fa;
    padding: 16px;
    border-bottom: 1px solid #ddd;
    color: #333;
}

/* Card body */
.order-body {
    padding: 20px;
}

/* Table styling */
.table {
    width: 100%;
    height:100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    /* border-radius: 30px; */
}

/* Making all columns equal width */
.table th, .table td {
    width: 16.66%;
    text-align: left;
    padding: 8px;
}

/* Border for each cell */
.table th, .table td {
    border: 1px solid #ccc;
}

/* Header background color */
.table thead {
    background-color: #a2ffe2;
    color: #333;
    font-weight: bold;
}
.table-responsive{
    border: 1px solid #f1f1f1;
    /* border-radius:10px; */
}

/* Additional styling for alert messages */
.alert {
    font-weight: bold;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
}

/* Making sure responsive tables keep their style in mobile view */
.table-responsive {
    overflow-x: auto;
}

/* Specific color for table headings for differentiation */
.summary-table th {
    color: #555;
    text-align: right;
    padding-right: 20px;
    }
    </style>

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
                      <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                          
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Chi tiết đơn hàng</h4>
                                 
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Đơn hàng</a></li>
                                        <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

            <?php
          if ($donHang['trang_thai_id'] == 6 ) {
            $colorAlerts = 'danger';
          } elseif ($donHang['trang_thai_id'] >= 1 && $donHang['trang_thai_id'] <= 5) {
            $colorAlerts = 'primary';
          } elseif ($donHang['trang_thai_id'] == 7) {
            $colorAlerts = 'success';
          } elseif($donHang['trang_thai_id'] =8) {
            $colorAlerts = 'warning';
          }
          ?>
          <div class="alert alert-<?= $colorAlerts ?>" role="alert">
            Đơn hàng: <?= $donHang['ten_trang_thai'] ?>
          </div>



                    <div class="row">
                        <div class="col-xl-9">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h5 class="card-title flex-grow-1 mb-0">Đơn hàng <?=$donHang["ma_don_hang"]?> </h5>
                                        <div class="flex-shrink-0">
                                            <a href="apps-invoices-details.html" class="btn btn-success btn-sm"><i class="ri-download-2-fill align-middle me-1"></i> Invoice</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-nowrap align-middle table-borderless mb-0">
                                            <thead class="table-light text-muted">
                                                <tr>
                                                    <th scope="col">Tên Sản Phẩm</th>
                                                    <th scope="col">Hình Ảnh</th>
                                                    <th scope="col">Giá</th>
                                                    <th scope="col">Số lượng</th>
                                                    <th scope="col" class="text-end">Thành tiền</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($sanPhamDonHang as $key =>$SP) : ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex">
                                                            
                                                            
                                                            <div class="flex-grow-1 ms-3 align-self-center">
                                                                <h5 class="fs-15"><a href="?act=chi-tiet-san-pham&san_pham_id=<?=$SP['san_pham_id']?>" class="link-primary"><?= $SP['ten_san_pham']?> </a></h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="<?=BASE_URL .$SP['hinh_anh']?>" alt="" width="50px" height="50px" class="img-fluid d-block">

                                                    </td>
                                                    <td> <?= isset($SP['gia_khuyen_mai']) && $SP['gia_khuyen_mai'] > 0 ? formatPrice($SP['gia_khuyen_mai']) : formatPrice($SP['gia_ban']) ?></td>
                                                    <td><?=$SP['so_luong']?></td>

                                                
                                                    
                                                    <td class="fw-medium text-end">
                                                           <?=formatPrice($SP['thanh_tien'])?>
                                                    </td>
                                                    <?php endforeach; ?>

            
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                               
                                               
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                             <div class="card">
                                <div class="card-header">
                                    <div class="d-sm-flex align-items-center">
                                        <h5 class="card-title flex-grow-1 mb-0">Tổng tiền đơn hàng</h5>
                                      
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="profile-timeline">
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            <div class="accordion-item border-0">
                                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    

                                                        <table class="table table-border mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Tổng tiền hàng :</td>
                                                                    <td class="text-end"><?= formatPrice($donHang['tong_tien_hang'])?> đ</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Giảm giá <span class="text-muted"></span>:</td>
                                                                    <td class="text-end"><?= formatPrice($donHang['giam_gia'])?> đ</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Phí ship :</td>
                                                                    <td class="text-end">0 đ</td>
                                                                </tr>
                                                                
                                                                <tr class="border-top border-top-dashed">
                                                                    <th scope="row">Tổng :</th>
                                                                    <th class="text-end"><?= formatPrice($donHang['tong_don_hang'])?></th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                </div>
                                            </div>
                                        
                                       
                                         
                               
                                        </div>
                                        <!--end accordion-->
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                            
                        </div>
                        <!--end col-->
                        <div class="col-xl-3">
                           

                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex">
                                        <h5 class="card-title flex-grow-1 mb-0">Người Đặt</h5>
                                        <div class="flex-shrink-0">
                                            <a href="?act=chi-tiet-nguoi-dung&id_nguoi_dung=<?= $donHang['nguoi_dung_id']?>" class="link-secondary">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-0 vstack gap-3">
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <img src=" <?= BASE_URL . $donHang['avatar']?>" alt=""  onerror="this.onerror=null; this.src=' https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png'" class="avatar-sm rounded">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="fs-14 mb-1"><?= $donHang['ten_nguoi_dung']?></h6>
                                                    <p class="text-muted mb-0"><?= $donHang['vai_tro'] == 1 ? 'Quản Trị Viên' : 'Khách Hàng'?></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i> <?= $donHang['email']?></li>
                                        <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i> <?= $donHang['sdt']?></li>
                                    </ul>
                                </div>
                            </div>
                            <!--end card-->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i>Địa chỉ nhân hàng</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled vstack gap-2 fs-13 mb-0">      
                                        <li class="fw-medium fs-14">Tên người nhận : <?= $donHang['ten_nguoi_nhan']?></li>
                                        <li>Số điện thoại: <?= $donHang['sdt_nguoi_nhan']?></li>
                                        <li>Địa chỉ : <?= $donHang['dia_chi_nguoi_nhan']?></li>
                                        
                                        <li>Ghi chú : <?= $donHang['ghi_chu']?></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!--end card-->

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom me-1 text-muted"></i>Chi tiết đơn hàng</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-shrink-0">
                                            <p class="text-muted mb-0">Mã đơn hàng :</p>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class="mb-0"><?= $donHang['ma_don_hang']?></h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-shrink-0">
                                            <p class="text-muted mb-0">Phương thức thanh toán :</p>
                                        
                                            <h6 class="mb-0"><?= $donHang['ten_phuong_thuc']?></h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-shrink-0">
                                            <p class="text-muted mb-0">Trạng thái đơn hàng :</p>
                                        
                                            <h6 class="mb-0"><?= $donHang['ten_trang_thai']?></h6>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <p class="text-muted mb-0">Tổng tiền:</p>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class="mb-0"><?= $donHang['tong_don_hang']?> </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->



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