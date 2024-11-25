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
}
