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
    
}