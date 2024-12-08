<?php 

class DonHangController


{
    public $modelDonHang;
    public $modelNguoiDung;
    public function __construct(){
        $this->modelDonHang = new DonHang();
        $this->modelNguoiDung = new NguoiDungs();
    }


   public function chiTietDonHang(){

    if (isset($_SESSION['user_client'])) {
            $userId = $_SESSION['user_client']['id'];
    
            // Lấy thông tin tài khoản từ ID người dùng
            $userAccount = $this->modelNguoiDung->getTaiKhoanFromEmail($userId);
        $don_hang_id = $_GET["don_hang_id"];


         // Lấy ra thông tin đơn hàng ở bảng don_hangs
        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);
        // var_dump($donHang);die;

        // Lấy danh sách sản phẩm đã đặt của đơn hàng ở bảng chi_tiet_don_hangs
        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);
        // var_dump($sanPhamDonHang);die;

        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        require_once './views/donhang/chi_tiet_don_hang.php';
        } else {
            // Thông báo nếu chưa đăng nhập
            echo '<script>
            alert("Bạn chưa đăng nhập. Vui lòng đăng nhập để tiếp tục.");
        </script>';
        header("Location: " . BASE_URL . '?act=login');
            die;
        }
    }
    public function huyDonHang(){
        $id = $_GET["don_hang_id"];
        $trangthai = $this->modelDonHang->getDonHang($id);
        if($trangthai['trang_thai_id'] == 1){

            $this->modelDonHang->updatedonHang($id,6);
            echo '<script>
            alert(" Hủy đơn hàng thành công");
            window.location.href = "' . BASE_URL . '?act=chi-tiet-don-hang&don_hang_id=' . $id . '";
            </script>';
        }else{
            echo '<script>
            alert(" Đơn hàng đã xác nhận nên không thể hủy");
            window.location.href = "' . BASE_URL . '?act=chi-tiet-don-hang&don_hang_id=' . $id . '";
            </script>';
        }
        
        // var_dump($id);die;


    }
    public function hoanDonHang(){
            
        
            $id = $_GET["don_hang_id"];
            
   

            $this->modelDonHang->updatedonHang($id,7);
            echo '<script>
            alert(" Hoàn đơn hàng thành công");
            window.location.href = "' . BASE_URL . '?act=chi-tiet-don-hang&don_hang_id=' . $id . '";
            </script>';
    
        
        // var_dump($id);die;


    }
    public function xacNhan(){
        $id = $_GET["don_hang_id"];
        // var_dump($id);die;

        $this->modelDonHang->updatedonHang($id,10);
        echo '<script>
        alert("Xác nhận đơn hàng thành công");
        window.location.href = "' . BASE_URL . '?act=chi-tiet-don-hang&don_hang_id=' . $id . '";
        </script>';

    }

          
}





?>