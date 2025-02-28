<?php

class TrangThai 
{
    public $conn;

    // kết nối cơ sở dữ liệu
    public  function __construct()
    {
        $this->conn = connectDB();
    }

    // damh sach danh muc 
    public function getAllTrangThai(){
        try {
            //code...
            $sql = 'SELECT  * FROM trang_thai_don_hangs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
         // Tìm kiếm
      public function searchTrangThaiDonHang($keyword)
      {
    $sql = "SELECT * FROM trang_thai_don_hangs WHERE ten_trang_thai LIKE ? ";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, "%$keyword%");

    try {
        $stmt->execute();
        $trangThais = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $trangThais;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return []; // Return an empty array to avoid errors in the view
    }
      }
    // thêm danh mục
    public function createTrangThai($ten_trang_thai){
        try {
            //code...
            $sql = 'INSERT INTO  trang_thai_don_hangs (ten_trang_thai)
                    VALUES (:ten_trang_thai)';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':ten_trang_thai',$ten_trang_thai);
           

            $stmt->execute();

            return true;
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }

    // xóa danh mục
     public function deleteTrangThai($id){
        try {
            //code...
            $sql = 'DELETE FROM trang_thai_don_hangs WHERE id= :id';

            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return true;
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    // // sửa danh mục
    // // lấy thông tin chi tiết
    // public function getDetailData($id){
    //     try {
    //         //code...
    //         $sql = 'SELECT * FROM danh_mucs WHERE id= :id';

    //         $stmt = $this->conn->prepare($sql);
            
    //         $stmt->bindParam(':id', $id);

    //         $stmt->execute();

    //         return $stmt->fetch();
            
    //     } catch (PDOException $e) {
    //         echo 'Lỗi: '. $e->getMessage();
    //     }
    // }
    // public function editDanhMuc($id,$ten_danh_muc,$trang_thai){
    //     try {
    //         //code...
    //         $sql = 'UPDATE  danh_mucs SET ten_danh_muc = :ten_danh_muc , trang_thai = :trang_thai WHERE id= :id';

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindParam(':id',$id);
    //         $stmt->bindParam(':ten_danh_muc',$ten_danh_muc);
    //         $stmt->bindParam(':trang_thai',$trang_thai);

    //         $stmt->execute();

    //         return true;
            
    //     } catch (PDOException $e) {
    //         echo 'Lỗi: '. $e->getMessage();
    //     }
    // }



    // // huy ket noi csdl
    // public function  __destruct()
    // {
    //     $this->conn = null;
    // }
}




?>