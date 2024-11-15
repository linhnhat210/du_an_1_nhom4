<?php

class BinhLuan
{
    public $conn;

    // Kết nối cơ sở dữ liệu
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy tất cả bình luận theo sản phẩm
    public function getAllBinhLuan()
    {
        try {
            $sql = 'SELECT 
                    binh_luans.*, 
                    san_phams.ten_san_pham AS ten_san_pham, 
                    san_phams.hinh_anh AS hinh_anh, 
                    nguoi_dungs.ten_nguoi_dung AS ten_nguoi_dung
                FROM binh_luans
                INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
                INNER JOIN nguoi_dungs ON binh_luans.nguoi_dung_id = nguoi_dungs.id';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }

    // Xóa bình luận
    public function deleteBinhLuan($id)
    {
        try {
            $sql = 'DELETE FROM binh_luans WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);

            return $stmt->execute();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // Lấy chi tiết bình luận
    
    public function getListBinhLuan($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, san_phams.ten_san_pham 
            FROM binh_luans
            INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id',$id);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }


    // Đóng kết nối cơ sở dữ liệu
    public function __destruct()
    {
        $this->conn = null;
    }
}

?>
