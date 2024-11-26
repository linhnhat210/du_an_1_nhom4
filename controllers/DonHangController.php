<?php 

class DonHangController


{
    public $modelDonHang;
    public function __construct(){
        $this->modelDonHang = new DonHang();
    }


   public function chiTietDonHang(){
        $don_hang_id = $_GET["don_hang_id"];


         // Lấy ra thông tin đơn hàng ở bảng don_hangs
        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);
        // var_dump($donHang);die;

        // Lấy danh sách sản phẩm đã đặt của đơn hàng ở bảng chi_tiet_don_hangs
        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);
        // var_dump($sanPhamDonHang);die;

        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        require_once './views/donhang/chi_tiet_don_hang.php';
    }
}





?>