<?php 

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/LienHeController.php';
require_once './controllers/TintucController.php';
require_once 'controllers/BannerController.php';


// Require toàn bộ file Models
require_once './models/Lienhe.php';
require_once './models/Tintuc.php';
require_once 'models/Banner.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'                 => (new HomeController())->index(),

    'form-lien-he'      => (new LienHeControler())->index(),
    'gui-thong-tin'     => (new LienHeControler())->guilienhe(),

    'list-tin-tucs'      => (new TintucController())->index(),

};