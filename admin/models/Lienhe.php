<?php

class Lienhe 
{
    public $conn;

    // kết nối cơ sở dữ liệu
    public  function __construct()
    {
        $this->conn = connectDB();
    }

    // damh sach danh muc 
    public function getAllLienhe(){
        try {
            //code...
            $sql = 'SELECT  * FROM lien_hes';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }


      // Tìm kiếm theo tên người dùng, số điện thoại hoặc email
      public function searchLienHe($keyword)
      {
    $sql = "SELECT * FROM lien_hes WHERE ten_khach_hang LIKE ? OR so_dien_thoai LIKE ? OR email LIKE ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, "%$keyword%");
    $stmt->bindValue(2, "%$keyword%");
    $stmt->bindValue(3, "%$keyword%");

    try {
        $stmt->execute();
        $lienHes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lienHes;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return []; // Return an empty array to avoid errors in the view
    }
      }
         public function getDetailData($id){
        try {
            //code...
            $sql = 'SELECT * FROM lien_hes WHERE id= :id';

            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    public function editLienHe($id,$trang_thai){
        try {
            //code...
            $sql = 'UPDATE  lien_hes SET  trang_thai = :trang_thai WHERE id= :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':trang_thai',$trang_thai);

            $stmt->execute();

            return true;
            
        } catch (PDOException $e) {
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