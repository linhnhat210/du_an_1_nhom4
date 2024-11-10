<?php

class Lienhe 
{
    public $conn;

    // kết nối cơ sở dữ liệu
    public  function __construct()
    {
        $this->conn = connectDB();
    }
    public function guilienhe($ten_khach_hang,$email,$so_dien_thoai,$tin_nhan,$ngay_lien_he,$trang_thai){
        try {
            //code...
            $sql = "INSERT INTO lien_hes (ten_khach_hang, email, so_dien_thoai, tin_nhan, ngay_lien_he, trang_thai)
                     VALUES (:ten_khach_hang, :email, :so_dien_thoai, :tin_nhan, :ngay_lien_he, :trang_thai)";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':ten_khach_hang',$ten_khach_hang);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':so_dien_thoai',$so_dien_thoai);
            $stmt->bindParam(':tin_nhan',$tin_nhan);
            $stmt->bindParam(':ngay_lien_he',$ngay_lien_he);
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