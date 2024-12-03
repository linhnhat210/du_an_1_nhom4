<?php

class GioHang
{
    public $conn;

    // kết nối cơ sở dữ liệu
    public  function __construct()
    {
        $this->conn = connectDB();
    }
    public function getGioHangFromId($nguoi_dung_id)
{
    try {
        $sql = 'SELECT * FROM gio_hangs WHERE nguoi_dung_id = :nguoi_dung_id LIMIT 1';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':nguoi_dung_id' => $nguoi_dung_id]);

        // Trả về bản ghi giỏ hàng hoặc null nếu không tìm thấy
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
        return null;
    }
}


    public function getDetailGioHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_gio_hangs.*, san_phams.ten_san_pham, san_phams.hinh_anh, san_phams.gia_ban, san_phams.gia_khuyen_mai
            FROM chi_tiet_gio_hangs
            INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
            WHERE chi_tiet_gio_hangs.gio_hang_id = :gio_hang_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':gio_hang_id'=>$id]);
            $gioHang = $stmt->fetchAll();
            
            return $gioHang;
        } catch (Exception $e) {
            echo "Lõi" . $e->getMessage();
        }
    }
    public function getDetailSanPhamGioHang($san_pham_id,$id){
        try {
            $sql = 'SELECT chi_tiet_gio_hangs.*, san_phams.ten_san_pham, san_phams.hinh_anh, san_phams.gia_ban, san_phams.gia_khuyen_mai
            FROM chi_tiet_gio_hangs
            INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
            WHERE chi_tiet_gio_hangs.gio_hang_id = :gio_hang_id AND san_pham_id = :san_pham_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':gio_hang_id'=>$id,
                            ':san_pham_id'=>$san_pham_id
                            ]);

            
            return $stmt->fetch();;
        } catch (Exception $e) {
            echo "Lõi" . $e->getMessage();
        }
    }
    public function addGioHang($nguoi_dung_id)
    {
        try {
            $sql = 'INSERT INTO gio_hangs (nguoi_dung_id) VALUES (:nguoi_dung_id)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':nguoi_dung_id' => $nguoi_dung_id]);
    
            // Trả về ID của giỏ hàng vừa được tạo
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    
    
    public function updateSoLuong($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            // var_dump($id);die;
            $sql = 'UPDATE chi_tiet_gio_hangs 
                SET
                    so_luong = :so_luong
                WHERE gio_hang_id = :gio_hang_id AND  san_pham_id = :san_pham_id';
            // var_dump($sql);die;

            $stmt = $this->conn->prepare($sql);
            // var_dump($stmt);die;

            $stmt->execute([
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id,
                ':so_luong' => $so_luong
            ]);

            // Lấy id đơn hàng vừa thêm
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function addDetailGioHang($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            $sql = 'INSERT INTO chi_tiet_gio_hangs (gio_hang_id, san_pham_id, so_luong)
                    VALUES (:gio_hang_id, :san_pham_id, :so_luong)';

            $stmt = $this->conn->prepare($sql);
            // var_dump($gio_hang_id); die;

            $stmt->execute([
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id,
                ':so_luong' => $so_luong
            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function destroySpGioHang($id){
        try {
            $sql = 'DELETE FROM chi_tiet_gio_hangs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function clearCart($nguoi_dung_id)
{
    try {
        // Xóa chi tiết giỏ hàng trước
        $sqlChiTiet = "DELETE FROM chi_tiet_gio_hangs WHERE gio_hang_id IN (
            SELECT id FROM gio_hangs WHERE nguoi_dung_id = :nguoi_dung_id
        )";
        $stmtChiTiet = $this->conn->prepare($sqlChiTiet);
        $stmtChiTiet->execute([':nguoi_dung_id' => $nguoi_dung_id]);

        // Xóa giỏ hàng chính
        $sqlGioHang = "DELETE FROM gio_hangs WHERE nguoi_dung_id = :nguoi_dung_id";
        $stmtGioHang = $this->conn->prepare($sqlGioHang);
        $stmtGioHang->execute([':nguoi_dung_id' => $nguoi_dung_id]);

        return true; // Xóa thành công
    } catch (Exception $e) {
        // Ghi log lỗi nếu cần
        error_log("Lỗi khi xóa giỏ hàng: " . $e->getMessage());
        return false; // Xóa thất bại
    }
}
public function getKhuyenMai($ma_khuyen_mai){
      try {
            $sql = 'SELECT * FROM khuyen_mais WHERE ma_khuyen_mai = :ma_khuyen_mai';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ma_khuyen_mai' => $ma_khuyen_mai
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
}
    public function demSoSP($id) {
        try {
            
            $sql = "SELECT COUNT(*) AS so_luong_san_pham
                    FROM chi_tiet_gio_hangs AS ctgh
                    JOIN gio_hangs AS gh ON ctgh.gio_hang_id = gh.id
                    WHERE gh.nguoi_dung_id = :nguoi_dung_id;";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindPaRam(':nguoi_dung_id',$id);
            $stmt->execute();
            $ketQua = $stmt->fetch();
            // var_dump($ketQua);die;

            return $ketQua['so_luong_san_pham'] ?? 0; // Trả về 0 nếu không có đơn hàng nào
            //code...
        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }
    }
    
       





    
}