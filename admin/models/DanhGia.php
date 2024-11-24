<?php

class DanhGia
{
    public $conn;

    // Kết nối cơ sở dữ liệu
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy tất cả bình luận theo sản phẩm
    public function getAllDanhGia()
    {
        try {
            $sql = 'SELECT 
                    danh_gias.*, 
                    san_phams.ten_san_pham AS ten_san_pham, 
                    san_phams.hinh_anh AS hinh_anh, 
                    nguoi_dungs.ten_nguoi_dung AS ten_nguoi_dung
                FROM danh_gias
                INNER JOIN san_phams ON danh_gias.san_pham_id = san_phams.id
                INNER JOIN nguoi_dungs ON danh_gias.nguoi_dung_id = nguoi_dungs.id';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    public function searchDanhGia($keyword){
            $sql = "SELECT 
                    danh_gias.*, 
                    san_phams.ten_san_pham AS ten_san_pham, 
                    san_phams.hinh_anh AS hinh_anh, 
                    nguoi_dungs.ten_nguoi_dung AS ten_nguoi_dung
                FROM danh_gias
                INNER JOIN san_phams ON danh_gias.san_pham_id = san_phams.id
                INNER JOIN nguoi_dungs ON danh_gias.nguoi_dung_id = nguoi_dungs.id
                WHERE danh_gias.danh_gia LIKE ?
               OR danh_gias.diem_danh_gia LIKE ?
               OR date(danh_gias.ngay_danh_gia) LIKE ?
               OR san_phams.ten_san_pham LIKE ?
               OR nguoi_dungs.ten_nguoi_dung LIKE ?
            ORDER BY danh_gias.id DESC";
    
    $stmt = $this->conn->prepare($sql);

    // Gán từ khóa tìm kiếm cho tất cả các điều kiện
    $stmt->bindValue(1, "%$keyword%", PDO::PARAM_STR);
    $stmt->bindValue(2, "%$keyword%", PDO::PARAM_STR);
    $stmt->bindValue(3, "%$keyword%", PDO::PARAM_STR);
    $stmt->bindValue(4, "%$keyword%", PDO::PARAM_STR);
    $stmt->bindValue(5, "%$keyword%", PDO::PARAM_STR);

    try {
        $stmt->execute();
        // Lấy tất cả kết quả tìm kiếm
        $binhLuans = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $binhLuans;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
    }

    // Xóa bình luận
    public function deleteDanhGia($id)
    {
        try {
            $sql = 'DELETE FROM danh_gias WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // Lấy chi tiết bình luận
    
    // public function getListBinhLuan($id)
    // {
    //     try {
    //         $sql = 'SELECT binh_luans.*, san_phams.ten_san_pham 
    //         FROM binh_luans
    //         INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id';

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindParam(':id',$id);
    //         $stmt->execute();

    //         return $stmt->fetchAll();
    //     } catch (Exception $e) {
    //         echo "lỗi" . $e->getMessage();
    //     }
    // }


    // Đóng kết nối cơ sở dữ liệu
    public function __destruct()
    {
        $this->conn = null;
    }
}

?>
