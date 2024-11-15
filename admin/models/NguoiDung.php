<?php

class NguoiDung
{
    public $conn;

    // kết nối cơ sở dữ liệu
    public  function __construct()
    {
        $this->conn = connectDB();
    }

    // damh sach danh muc 
    public function getAllNguoiDung(){
        try {
            //code...
            $sql = 'SELECT * FROM nguoi_dungs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    public function getDetailNguoiDung($id){
        try {
            $sql = 'SELECT * FROM nguoi_dungs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
     // Tìm kiếm 

    public function getDonHangFromKhachHang($id_khach_hang){
        try {
            
            $sql="SELECT don_hangs.id, don_hangs.ma_don_hang, don_hangs.nguoi_dung_id, don_hangs.ten_nguoi_nhan,
                         don_hangs.email_nguoi_nhan, don_hangs.sdt_nguoi_nhan, don_hangs.dia_chi_nguoi_nhan, 
                         don_hangs.ngay_dat, don_hangs.tong_tien, don_hangs.ghi_chu, 
                         don_hangs.phuong_thuc_thanh_toan_id, don_hangs.trang_thai_id, 
                         trang_thai_don_hangs.ten_trang_thai
                         FROM don_hangs
                         JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
                         WHERE don_hangs.nguoi_dung_id = :nguoi_dung_id;";


            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':nguoi_dung_id' => $id_khach_hang
            ]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();

        } catch (Exception $e) {
            //throw $th;
        }





     }
    public function searchNguoiDung($keyword)
    {
  $sql = "SELECT * FROM nguoi_dungs WHERE ten_nguoi_dung LIKE ?  OR email LIKE ? OR sdt LIKE ? ";
  $stmt = $this->conn->prepare($sql);
  $stmt->bindValue(1, "%$keyword%");
  $stmt->bindValue(2, "%$keyword%");
  $stmt->bindValue(3, "%$keyword%");

  try {
      $stmt->execute();
      $nguoiDungs = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $nguoiDungs;
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return []; // Return an empty array to avoid errors in the view
  }
    }

    
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