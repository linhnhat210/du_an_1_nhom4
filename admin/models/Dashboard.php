<?php

class Dashboard 
{
    public $conn;

    // kết nối cơ sở dữ liệu
    public  function __construct()
    {
        $this->conn = connectDB();
    }



     public function layTongThuNhapHomNay() {

        try {
            //code...
            $ngayHienTai = date('Y-m-d'); // Lấy ngày hiện tại
            $sql = "SELECT SUM(tong_tien) AS tong_thu_nhap FROM don_hangs WHERE DATE(ngay_dat) = :ngay_hien_tai";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['ngay_hien_tai' => $ngayHienTai]);

            $ketQua = $stmt->fetch();
            return $ketQua['tong_thu_nhap'] ?? 0; // Trả về 0 nếu không có đơn hàng nào
        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();
        }
        
    }
    public function demSoLuongDonHangHomNay() {
        try {
            
            $ngayHienTai = date('Y-m-d'); // Ngày hiện tại
            $sql = "SELECT COUNT(*) AS so_luong_don_hang FROM don_hangs WHERE DATE(ngay_dat) = :ngay_hien_tai";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['ngay_hien_tai' => $ngayHienTai]);
            $ketQua = $stmt->fetch();

            return $ketQua['so_luong_don_hang'] ?? 0; // Trả về 0 nếu không có đơn hàng nào
            //code...
        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }
    }
    public function demSoLuongKhachHang() {
        try {
            
            $sql = "SELECT COUNT(*) AS so_luong_khach_hang FROM nguoi_dungs";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $ketQua = $stmt->fetch();

            return $ketQua['so_luong_khach_hang'] ?? 0; // Trả về 0 nếu không có đơn hàng nào
            //code...
        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }
    }


    







    // huy ket noi csdl
    public function  __destruct()
    {
        $this->conn = null;
    }
}




?>