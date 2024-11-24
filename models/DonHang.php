<?php

class DonHang
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function adDonHang(
        $ma_don_hang,
        $nguoi_dung_id,
        $ten_nguoi_nhan,
        $email_nguoi_nhan,
        $sdt_nguoi_nhan,
        $dia_chi_nguoi_nhan,
        $ghi_chu,
        $tong_tien,
        $phuong_thuc_thanh_toan_id,
        $ngay_dat,
       
        $trang_thai_id
    ) {
        try {
            $sql = 'INSERT INTO don_hangs ( ma_don_hang,
                                            nguoi_dung_id,
                                            ten_nguoi_nhan,
                                            email_nguoi_nhan,
                                            sdt_nguoi_nhan,
                                            dia_chi_nguoi_nhan,
                                            ghi_chu,
                                            tong_tien,
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
                    :tong_tien,
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
                ':tong_tien' => $tong_tien,
                ':phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
                ':ngay_dat' => $ngay_dat,
               
                ':trang_thai_id' => $trang_thai_id
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Lõi" . $e->getMessage();
        }
    }
}
