<?php

class Tintuc
{
    public $conn;

    // Kết nối cơ sở dữ liệu
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy danh sách tất cả tin tức
    public function getAllTinTuc(){
        try {
            $sql = 'SELECT * FROM tin_tucs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Thêm tin tức
    public function createTinTuc($tieu_de, $noi_dung,  $trang_thai,$file_thumb){
        try {
            $sql = 'INSERT INTO tin_tucs (tieu_de, noi_dung, hinh_anh, trang_thai)
                    VALUES (:tieu_de, :noi_dung, :hinh_anh, :trang_thai)';
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':hinh_anh', $file_thumb);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Xóa tin tức
    public function deleteTinTuc($id){
        try {
            $sql = 'DELETE FROM tin_tucs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Lấy thông tin chi tiết của một tin tức
    public function getDetailData($id){
        try {
            $sql = 'SELECT * FROM tin_tucs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Sửa tin tức
    public function editTinTuc($id, $tieu_de, $noi_dung, $hinh_anh, $trang_thai){
        try {
            $sql = 'UPDATE tin_tucs SET tieu_de = :tieu_de, noi_dung = :noi_dung, hinh_anh = :hinh_anh, trang_thai = :trang_thai WHERE id = :id';
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':hinh_anh', $hinh_anh);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Hủy kết nối cơ sở dữ liệu
    public function __destruct()
    {
        $this->conn = null;
    }
}

?>
