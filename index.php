<?php 
session_start();
// var_dump($_SESSION['user_client']['vai_tro']);die;
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/LienHeController.php';
require_once './controllers/TintucController.php';
require_once './controllers/BannerController.php';
require_once './controllers/NguoiDungController.php';
require_once './controllers/DanhMucController.php';


// Require toàn bộ file Models
require_once './models/Lienhe.php';
require_once './models/Tintuc.php';
require_once 'models/Banner.php';
require_once 'models/NguoiDung.php';
require_once 'models/SanPham.php';
require_once 'models/DanhMuc.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo đảm tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
match ($act) {
    // Trang chủ
    '/'                 => (new HomeController())->home(),

    // Liên hệ
    'form-lien-he'      => (new LienHeControler())->index(),
    'gui-thong-tin'     => (new LienHeControler())->guilienhe(),

    // Tin tức
    'list-tin-tucs'     => (new TintucController())->index(),

     // Đăng nhập
    'login'               => (new NguoiDungController())->formLogin(),
    'check-login'         => (new NguoiDungController())->login(),


    //đky
    'dang-ky'             => (new NguoiDungController())->dangKy(),
    'post-dang-ky'             => (new NguoiDungController())->postcreate(),




    // Load thêm sản phẩm
    'load-more-products' => (new HomeController())->loadMoreProducts(),
    
   
};
