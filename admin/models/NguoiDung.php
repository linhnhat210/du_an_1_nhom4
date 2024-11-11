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
    
}