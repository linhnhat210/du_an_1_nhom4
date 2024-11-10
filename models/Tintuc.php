<?php

class Tintuc
{
    private $conn;

    // Khởi tạo kết nối cơ sở dữ liệu
    public function __construct()
    {
        $this->conn = $this->connectDB();
    }

    // Hàm kết nối cơ sở dữ liệu
    private function connectDB()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=du_an_1", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    // Lấy danh sách tất cả tin tức
    public function getAllTinTuc()
    {
        try {
            $sql = 'SELECT * FROM tin_tucs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Lấy thông tin chi tiết của một tin tức
    public function getDetailData($id)
    {
        try {
            $sql = 'SELECT * FROM tin_tucs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Thêm tin tức
    public function createTinTuc($tieu_de, $noi_dung, $trang_thai, $hinh_anh)
    {
        try {
            $sql = 'INSERT INTO tin_tucs (tieu_de, noi_dung, hinh_anh, trang_thai)
                    VALUES (:tieu_de, :noi_dung, :hinh_anh, :trang_thai)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':hinh_anh', $hinh_anh);
            $stmt->bindParam(':trang_thai', $trang_thai);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Sửa tin tức
    public function editTinTuc($id, $tieu_de, $noi_dung, $trang_thai, $hinh_anh)
    {
        try {
            $sql = 'UPDATE tin_tucs SET tieu_de = :tieu_de, noi_dung = :noi_dung, hinh_anh = :hinh_anh, trang_thai = :trang_thai WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':hinh_anh', $hinh_anh);
            $stmt->bindParam(':trang_thai', $trang_thai);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Xóa tin tức
    public function deleteTinTuc($id)
    {
        try {
            $sql = 'DELETE FROM tin_tucs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Đóng kết nối
    public function __destruct()
    {
        $this->conn = null;
    }
}

?>
