<?php

class KhuyenMai
{
    public $conn;

    // kết nối cơ sở dữ liệu
    public  function __construct()
    {
        $this->conn = connectDB();
    }
     // Hàm kết nối cơ sở dữ liệu
    
    // damh sach
    public function getKhuyenmai() {
        try {
            $sql = 'SELECT * FROM khuyen_mais WHERE trang_thai = 2';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
    
            $result = $stmt->fetchAll();
            return $result ?: []; // Trả về mảng rỗng nếu không có dữ liệu
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return [];
        }
    }
    
}