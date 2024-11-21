<?php
class TinTuc
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy danh sách tin tức
    public function getAllTinTuc()
    {
        try {
            $sql = 'SELECT id, tieu_de, noi_dung, hinh_anh, trang_thai FROM tin_tucs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    // Lấy chi tiết tin tức theo ID
    public function getTinTucById($id)
    {
        try {
            $sql = 'SELECT id, tieu_de, noi_dung, hinh_anh, trang_thai FROM tin_tucs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}
