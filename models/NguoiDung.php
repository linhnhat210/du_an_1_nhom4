<?php
class NguoiDung {
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
}
