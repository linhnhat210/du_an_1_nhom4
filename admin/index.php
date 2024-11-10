<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/DanhMucController.php';
require_once 'controllers/SanPhamController.php';
require_once 'controllers/DanhMuclienheController.php';
require_once 'controllers/BannerController.php';
require_once 'controllers/TintucController.php';

// Require toàn bộ file Models
require_once 'models/DanhMuc.php';
require_once 'models/SanPham.php';
require_once 'models/Lienhe.php';
require_once 'models/Banner.php';
require_once 'models/Tintuc.php';



// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    '/'                     => (new DashboardController())->index(),


    // route danh mục
    'danh-mucs'             => (new DanhMucController())->index(),
    'form-them-danh-muc'    => (new DanhMucController())->create(),
    'post-them-danh-muc'    => (new DanhMucController())->postcreate(),
    'form-sua-danh-muc'     => (new DanhMucController())->edit(),
    'post-sua-danh-muc'     => (new DanhMucController())->postedit(),
    'xoa-danh-muc'          => (new DanhMucController())->destroy(),
    
    // route sản phẩm
    'san-phams'             => (new SanPhamController())->index(),
    'form-them-san-pham'    => (new SanPhamController())->create(),
    'post-them-san-pham'    => (new SanPhamController())->postcreate(),
    'form-sua-san-pham'     => (new SanPhamController())->edit(),
    'post-sua-san-pham'     => (new SanPhamController())->postedit(),
    'xoa-san-pham'          => (new SanPhamController())->destroy(),
    'search-san-pham'          => (new SanPhamController())->search(),
    // route liên hệ
    'lien-hes'             => (new DanhMuclienheController())->index(),
    'search-lien-he'             => (new DanhMuclienheController())->search(),
    'form-sua-lien-he'     => (new DanhMuclienheController())->edit(),
    'post-sua-lien-he'          => (new DanhMuclienheController())->postedit(),
    
    // banners
    'banners'             => (new BannerController())->index(),
    'form-them-banner'             => (new BannerController())->create(),
    'post-them-banner'             => (new BannerController())->postcreate(),

        // route tin tức
    'tin-tucs'              => (new TinTucController())->index(),
    'form-them-tin-tuc'     => (new TinTucController())->create(),
    'post-them-tin-tuc'     => (new TinTucController())->postcreate(),
    'form-sua-tin-tuc'      => (new TinTucController())->edit(),
    'post-sua-tin-tuc'      => (new TinTucController())->postedit(),
    'xoa-tin-tuc'           => (new TinTucController())->destroy(),
    
};