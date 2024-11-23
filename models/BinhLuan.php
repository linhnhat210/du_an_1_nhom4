<?php

class BinhLuan 
{
    public $conn;

    // kết nối cơ sở dữ liệu
    public  function __construct()
    {
        $this->conn = connectDB();
    }

    public function dangBinhLuan($noi_dung,$nguoi_dung,$san_pham_id){
        try {
            //code...
            // var_dump('abc');die;
            $ngay_binh_luan =date('Y-m-d H:i:s');
            $sql = 'INSERT INTO  binh_luans (nguoi_dung_id,san_pham_id,noi_dung,ngay_binh_luan)
                    VALUES (:nguoi_dung_id,:san_pham_id,:noi_dung,:ngay_binh_luan)';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':nguoi_dung_id',$nguoi_dung);
            $stmt->bindParam(':san_pham_id',$san_pham_id);
            $stmt->bindParam(':noi_dung',$noi_dung);
            $stmt->bindParam(':ngay_binh_luan',$ngay_binh_luan);

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