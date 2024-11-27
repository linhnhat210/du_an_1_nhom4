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
    public function getNguoiDung(){
        try {
            $sql = "SELECT * FROM nguoi_dungs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
             
            return $stmt->fetchAll();; // Trả về toàn bộ thông tin người dùng
    
            
        } catch (Exception $e) {
            return 'Lỗi khi kết nối đến cơ sở dữ liệu: ' . $e->getMessage();
        }
    }
    public function getTaiKhoanFromEmail($id)
    {
        try {
            $sql = 'SELECT * FROM nguoi_dungs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);
            // var_dump($email) ; die;


            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
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
    public function updateNguoiDung($id,$ten_nguoi_dung,$sdt,$dia_chi,$gioi_tinh,$ngay_sinh,$new_file){
        try {
            //code...
  

                  // Cập nhật thông tin người dùng
        $sql = 'UPDATE nguoi_dungs SET 
                ten_nguoi_dung = :ten_nguoi_dung,
                sdt = :sdt,
                dia_chi = :dia_chi,
                gioi_tinh = :gioi_tinh,
                ngay_sinh = :ngay_sinh,
                avatar = :avatar
                WHERE id = :id';

        $stmt = $this->conn->prepare($sql);

        // Gắn các tham số vào câu lệnh SQL
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
        $stmt->bindParam(':sdt', $sdt);
        $stmt->bindParam(':dia_chi', $dia_chi);
        $stmt->bindParam(':gioi_tinh', $gioi_tinh);
        $stmt->bindParam(':ngay_sinh', $ngay_sinh);
        $stmt->bindParam(':avatar', $new_file);

        // Thực thi câu lệnh
        $stmt->execute();

        return true;
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    public function updateMatKhau($id, $mk_moi){
        try {
            //code...
  

                  // Cập nhật thông tin người dùng
        $sql = 'UPDATE nguoi_dungs SET 
                mat_khau = :mat_khau
                WHERE id = :id';

        $stmt = $this->conn->prepare($sql);

        // Gắn các tham số vào câu lệnh SQL
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':mat_khau', $mk_moi);


        // Thực thi câu lệnh
        $stmt->execute();

        return true;
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
}
