<?php
class NguoiDungs {
    private $conn;

    // Kết nối cơ sở dữ liệu
    public function __construct() {
        $this->conn = connectDB(); // Hàm connectDB() phải được định nghĩa trước
    }

    // Kiểm tra thông tin đăng nhập
   public function checkLogin($email) {
        try {
            $sql = "SELECT * FROM nguoi_dungs WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
             
            return $stmt->fetch();; // Trả về toàn bộ thông tin người dùng
    
            
        } catch (Exception $e) {
            return 'Lỗi khi kết nối đến cơ sở dữ liệu: ' . $e->getMessage();
        }
    }
    public function createNguoiDung($ten_nguoi_dung,$email,$sdt,$dia_chi,$mat_khau,$gioi_tinh,$ngay_sinh,$trang_thai,$vai_tro){
        try {
            //code...
            $ngay_tao = date('Y-m-d H:i:s');
            // var_dump('abc');die;
            $sql = 'INSERT INTO  nguoi_dungs (ten_nguoi_dung,email,sdt,dia_chi,mat_khau,gioi_tinh,ngay_sinh,trang_thai,vai_tro,ngay_tao)
                    VALUES (:ten_nguoi_dung, :email, :sdt, :dia_chi, :mat_khau, :gioi_tinh, :ngay_sinh,:trang_thai,:vai_tro,:ngay_tao)';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':ten_nguoi_dung',$ten_nguoi_dung);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':sdt',$sdt);
            $stmt->bindParam(':dia_chi',$dia_chi);
            $stmt->bindParam(':mat_khau',$mat_khau);
            $stmt->bindParam(':gioi_tinh',$gioi_tinh);
            $stmt->bindParam(':ngay_sinh',$ngay_sinh);
            $stmt->bindParam(':trang_thai',$trang_thai);
            $stmt->bindParam(':vai_tro',$vai_tro);
            $stmt->bindParam(':ngay_tao',$ngay_tao);

            $stmt->execute();
            return true;
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
}
