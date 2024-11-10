<?php

class Banner 
{
    public $conn;

    // kết nối cơ sở dữ liệu
    public  function __construct()
    {
        $this->conn = connectDB();
    }

    // damh sach danh muc 
    public function getAllBanner(){
        try {
            //code...
            $sql = 'SELECT  * FROM banners';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    public function createBanner($ten_banner,$file_thumb){
        try {
            //code...
            $sql = 'INSERT INTO  banners (ten_banner,hinh_anh)
                    VALUES (:ten_banner,:hinh_anh)';

            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':ten_banner',$ten_banner);
            $stmt->bindParam(':hinh_anh',$file_thumb);


            $stmt->execute();
            // laays id sp vua them
            // return $this->conn->lastInsertId();
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