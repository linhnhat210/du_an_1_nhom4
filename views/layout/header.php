  <?php
$danhMucs = (new DanhMucsController())->DanhMuc();

?>
  <header class="header-area header-wide">
        <!-- main header start -->
        <div class="main-header d-none d-lg-block">


            <!-- header middle area start -->
            <div class="header-main-area sticky">
                <div class="container">
                    <div class="row align-items-center position-relative">

                        <!-- start logo area -->
                        <div class="col-lg-2">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="assets/img/logo/KINGMANGA.png" alt="Brand Logo">
                                </a>
                            </div>
                        </div>
                        <!-- end logo area -->

                        <!-- main menu area start -->
                        <div class="col-lg-6 position-static">
                            <div class="main-menu-area">
                                <div class="main-menu">
                                    <!-- main menu navbar start -->
                                    <nav class="desktop-menu">
                                        <ul>
                                            <li class="active"><a href="?act=/">Trang Chủ</a>
                                            </li>
                                            <li class="position-static"><a href="#">Thể Loại<i class="fa fa-angle-down"></i></a>
                                                <ul class="megamenu dropdown">
                                                    <?php foreach($danhMucs as $danhMuc) : ?>
                                                    
                                                            <li><a href="san_pham_theo_danh_muc&danh_muc_id=<?=$danhMuc["id"]?>" style="text-transform:uppercase;"><?= $danhMuc['ten_danh_muc']?></a></li>
                                                           
                                                      <?php endforeach; ?>
                                                </ul>
                                            </li>
                                            <!-- <li><a href="shop.html">shop <i class="fa fa-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="#">shop grid layout <i class="fa fa-angle-right"></i></a>
                                                        <ul class="dropdown">
                                                            <li><a href="shop.html">shop grid left sidebar</a></li>
                                                            <li><a href="shop-grid-right-sidebar.html">shop grid right sidebar</a></li>
                                                            <li><a href="shop-grid-full-3-col.html">shop grid full 3 col</a></li>
                                                            <li><a href="shop-grid-full-4-col.html">shop grid full 4 col</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">shop list layout <i class="fa fa-angle-right"></i></a>
                                                        <ul class="dropdown">
                                                            <li><a href="shop-list-left-sidebar.html">shop list left sidebar</a></li>
                                                            <li><a href="shop-list-right-sidebar.html">shop list right sidebar</a></li>
                                                            <li><a href="shop-list-full-width.html">shop list full width</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">products details <i class="fa fa-angle-right"></i></a>
                                                        <ul class="dropdown">
                                                            <li><a href="product-details.html">product details</a></li>
                                                            <li><a href="product-details-affiliate.html">product details affiliate</a></li>
                                                            <li><a href="product-details-variable.html">product details variable</a></li>
                                                            <li><a href="product-details-group.html">product details group</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li> -->
                                            <li><a href="?act=list-tin-tucs">Bài Viết</a>
                                                <!-- <ul class="dropdown">
                                                    <li><a href="blog-left-sidebar.html">blog left sidebar</a></li>
                                                    <li><a href="blog-list-left-sidebar.html">blog list left sidebar</a></li>
                                                    <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                                    <li><a href="blog-list-right-sidebar.html">blog list right sidebar</a></li>
                                                    <li><a href="blog-grid-full-width.html">blog grid full width</a></li>
                                                    <li><a href="blog-details.html">blog details</a></li>
                                                    <li><a href="blog-details-left-sidebar.html">blog details left sidebar</a></li>
                                                    <li><a href="blog-details-audio.html">blog details audio</a></li>
                                                    <li><a href="blog-details-video.html">blog details video</a></li>
                                                    <li><a href="blog-details-image.html">blog details image</a></li>
                                                </ul> -->
                                            </li>
                                            <li><a href="?act=form-lien-he">Liên Hệ</a></li>
                                        </ul>
                                    </nav>
                                    <!-- main menu navbar end -->
                                </div>
                            </div>
                        </div>
                        <!-- main menu area end -->

                        
                        <div class="col-lg-4">
                            <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                                <div class="header-search-container">
                                    <button class="search-trigger d-xl-none d-lg-block"><i class="pe-7s-search"></i></button>
                                    <form class="header-search-box d-lg-none d-xl-block">
                                        <input type="text" placeholder="Tìm truyện..." class="header-search-field">
                                        <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                                    </form>
                                </div>
                                <div class="header-configure-area">
                                    <ul class="nav justify-content-end">
                                        <li>
                                            <a href="#" class="">
                                                <i class="pe-7s-shopbag"></i>
                                                <div class="notification">2</div>
                                            </a>
                                        </li>
                                       <li class="user-hover">
    <a href="#">
        <i class="pe-7s-user"></i>
    </a>
    <ul class="dropdown-list">
<?php if (isset($_SESSION['user_client'])): ?>
    <li><a href="#"><?= htmlspecialchars($_SESSION['user_client']['ten_nguoi_dung'], ENT_QUOTES, 'UTF-8') ?></a></li>
    <li><a href="views/taikhoan/logout.php">Đăng Xuất</a></li>
<?php else: ?>
    <li><a href="<?= BASE_URL . './?act=login' ?>">Đăng Nhập</a></li> 
    <li><a href="<?= BASE_URL . './?act=dang-ky' ?>">Đăng Ký</a></li>
<?php endif; ?>
    </ul>
</li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- mini cart area end -->

                    </div>
                </div>
            </div>
            <!-- header middle area end -->
        </div>
        <!-- main header end -->
    </header>