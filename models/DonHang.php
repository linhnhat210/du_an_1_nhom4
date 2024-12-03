<?php

class DonHang
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function adDonHang( $ma_don_hang,
                $nguoi_dung_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $phuong_thuc_thanh_toan_id,
                $tong_tien_hang,
                $giam_gia,
                $tong_don_hang,
                $ngay_dat,
                $trang_thai_id) {
        try {
            $sql = 'INSERT INTO don_hangs ( ma_don_hang,
                                            nguoi_dung_id,
                                            ten_nguoi_nhan,
                                            email_nguoi_nhan,
                                            sdt_nguoi_nhan,
                                            dia_chi_nguoi_nhan,
                                            ghi_chu,
                                            tong_tien_hang,
                                            giam_gia,
                                            tong_don_hang,
                                            phuong_thuc_thanh_toan_id,
                                            ngay_dat,
                                            
                                            trang_thai_id)
            VALUES (:ma_don_hang,
                    :nguoi_dung_id,
                    :ten_nguoi_nhan,
                    :email_nguoi_nhan,
                    :sdt_nguoi_nhan,
                    :dia_chi_nguoi_nhan,
                    :ghi_chu,
                    :tong_tien_hang,
                    :giam_gia,
                    :tong_don_hang,
                    :phuong_thuc_thanh_toan_id,
                    :ngay_dat,
                    :trang_thai_id)';

            $stmt = $this->conn->prepare($sql);


            $stmt->execute([
                ':ma_don_hang' => $ma_don_hang,
                ':nguoi_dung_id' => $nguoi_dung_id,
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':email_nguoi_nhan' => $email_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':ghi_chu' => $ghi_chu,
                ':tong_tien_hang' => $tong_tien_hang,
                ':giam_gia' => $giam_gia,
                ':tong_don_hang' => $tong_don_hang,
                
                ':phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
                ':ngay_dat' => $ngay_dat,
               
                ':trang_thai_id' => $trang_thai_id
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Lõi" . $e->getMessage();
        }
    }
    public function addChiTietDonHang($don_hang_id,$san_pham_ids,$so_luongs,$gia_san_phams){
        try {
            //code...
              // Duyệt qua từng sản phẩm
        for ($i = 0; $i < count($san_pham_ids); $i++) {
            $san_pham_id = $san_pham_ids[$i];
            $so_luong = $so_luongs[$i];
            $gia_san_pham = $gia_san_phams[$i];
            $thanh_tien = $so_luong * $gia_san_pham;
            

            // Thực hiện câu lệnh insert cho từng sản phẩm
            $sql="INSERT INTO chi_tiet_don_hangs (don_hang_id, san_pham_id, so_luong, don_gia , thanh_tien) 
                                    VALUES (:don_hang_id, :san_pham_id, :so_luong, :don_gia, :thanh_tien)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':don_hang_id', $don_hang_id);
            $stmt->bindParam(':san_pham_id', $san_pham_id);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->bindParam(':don_gia', $gia_san_pham);
            $stmt->bindParam(':thanh_tien', $thanh_tien);

            $stmt->execute();
            
        }
        return true;
        } catch (Exception $e) {
            echo "Lõi" . $e->getMessage();
        }
    }
    public function getAllDonHang($userId){
        try {
            //code...
            $sql = 'SELECT don_hangs.*, 
                            trang_thai_don_hangs.ten_trang_thai
                    FROM don_hangs
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
                    WHERE don_hangs.nguoi_dung_id = :userId
                    ORDER BY don_hangs.id DESC';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    public function getDonHang($id){
            try {
            $sql = 'SELECT * FROM don_hangs WHERE id = :id ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
    
            return $stmt->fetch();; // Trả về mảng rỗng nếu không có dữ liệu
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return [];
        }
    }
        public function getDetailDonHang($id)
    {
        try {
           
            $sql = 'SELECT don_hangs.*,
                            trang_thai_don_hangs.ten_trang_thai,
                            nguoi_dungs.ten_nguoi_dung,
                            nguoi_dungs.email,
                            nguoi_dungs.sdt,
                            nguoi_dungs.avatar,
                            nguoi_dungs.vai_tro,
                            phuong_thuc_thanh_toans.ten_phuong_thuc
            FROM don_hangs
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            INNER JOIN nguoi_dungs ON don_hangs.nguoi_dung_id = nguoi_dungs.id
            INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
            WHERE don_hangs.id = :id';


            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id',$id);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getListSpDonHang($id)
    {
        try {
            $sql = 'SELECT  chi_tiet_don_hangs.*,
                            san_phams.ten_san_pham,
                            san_phams.hinh_anh,
                            san_phams.gia_ban,
                            san_phams.gia_khuyen_mai
                    FROM chi_tiet_don_hangs
                    INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                    WHERE chi_tiet_don_hangs.don_hang_id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id',$id);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getAllTrangThaiDonHang()
    {
        try {
            $sql = 'SELECT * FROM trang_thai_don_hangs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function updatedonHang($id,$tt){
        
        try {
             $ngayHienTai = date('Y-m-d H:i:s');
            if($tt == 7){
                $ngay_nhan = $ngayHienTai;
            }
            $sql = 'UPDATE don_hangs SET trang_thai_id = :tt , ngay_nhan = :ngay_nhan WHERE id=:id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':tt',$tt);
            $stmt->bindParam(':ngay_nhan',$ngay_nhan);

            $stmt->execute();

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }

    }
        public function getEmailNguoiNhan($don_hang_id) {
        $sql = "SELECT email_nguoi_nhan FROM don_hangs WHERE id = :don_hang_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':don_hang_id', $don_hang_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về mảng chứa email
    }
}
