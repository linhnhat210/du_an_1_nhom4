<?php 
class GioHangController {
    public $modelGioHang;
    public $modelNguoiDung;
    public function __construct(){
        $this->modelGioHang = new GioHang();
        $this->modelNguoiDung = new NguoiDungs();
    }

    
    public function addGioHang()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_SESSION['user_client'])) {
            $id = $_SESSION['user_client']["id"];
            $mail = $this->modelNguoiDung->getTaiKhoanFromEmail($id);
            if (!$mail || !isset($mail['id'])) {
                echo '<script>alert("Không tìm thấy tài khoản. Vui lòng thử lại.");</script>';
                // header("Location:/");
                die;
            }

            $gioHang = $this->modelGioHang->getGioHangFromId($mail['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
            }

            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            if (!is_array($chiTietGioHang)) {
                $chiTietGioHang = [];
            }

            $san_pham_id = isset($_POST['san_pham_id']) ? intval($_POST['san_pham_id']) : 0;
            $so_luong = isset($_POST['so_luong']) ? intval($_POST['so_luong']) : 0;

            if ($san_pham_id <= 0 || $so_luong <= 0) {
                echo '<script>alert("Dữ liệu không hợp lệ. Vui lòng thử lại.");</script>';
                header("Location: " . BASE_URL . '?act=gio-hang');
                die;
            }

            $checkSanPham = false;
            foreach ($chiTietGioHang as $detail) {
                if ($detail['san_pham_id'] == $san_pham_id) {
                    $newSoLuong = $detail['so_luong'] + $so_luong;
                    $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                    $checkSanPham = true;
                    break;
                }
            }

            if (!$checkSanPham) {
                $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
            }

            header("Location: " . BASE_URL . '?act=gio-hang');
        } else {
            echo '<script>
                alert("Bạn chưa đăng nhập. Vui lòng đăng nhập để tiếp tục.");
                window.location.href = "?act=login";
            </script>';
            die;
        }
    }
}


    public function gioHang()
    {
        if (isset($_SESSION['user_client'])) {
            $id = $_SESSION['user_client']["id"];
            var_dump($id);
            $mail = $this->modelNguoiDung->getTaiKhoanFromEmail($id);

            // Lấy dữ liệu giỏ hàng của người dùng
            // var_dump($mail['id']);die;
            $gioHang = $this->modelGioHang->getGioHangFromId($mail['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            // var_dump($chiTietGioHang);die;

            require_once './views/giohang/gio_hang.php';
        } else {
            header("Location: " . BASE_URL . '?act=login');
        }
    }
}