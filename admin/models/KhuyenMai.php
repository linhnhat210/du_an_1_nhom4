<?php

class KhuyenMai {
    public $conn;

    public  function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllKhuyenMai() {
        $sql = "SELECT * FROM khuyen_mais";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        
        
        return $stmt->fetchAll();
    }
    
    public function createKhuyenMai($ma_khuyen_mai,$giam_phan_tram, $giam_toi_da, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai) {
        
        $sql = "INSERT INTO khuyen_mais (ma_khuyen_mai,giam_phan_tram, giam_toi_da, ngay_bat_dau, ngay_ket_thuc) 
                  VALUES (:ma_khuyen_mai,:giam_phan_tram, :giam_toi_da, :ngay_bat_dau, :ngay_ket_thuc)";
        
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':ma_khuyen_mai',$ma_khuyen_mai);
        $stmt->bindParam(':giam_phan_tram',$giam_phan_tram);
        $stmt->bindParam(':giam_toi_da',$giam_toi_da);
        $stmt->bindParam(':ngay_bat_dau',$ngay_bat_dau);
        $stmt->bindParam(':ngay_ket_thuc',$ngay_ket_thuc);

        $stmt->execute();
        return true;
    }

    public function updateKhuyenMai($id, $ma_khuyen_mai,$giam_phan_tram, $giam_toi_da, $ngay_bat_dau, $ngay_ket_thuc) {
        $sql = "UPDATE khuyen_mais SET ma_khuyen_mai = :ma_khuyen_mai,
                                         ngay_bat_dau = :ngay_bat_dau,
                                         ngay_ket_thuc = :ngay_ket_thuc,
                                         giam_phan_tram = :giam_phan_tram,
                                         giam_toi_da = :giam_toi_da
                                         WHERE id = :id";
        $stmt = $this->conn->prepare($sql);


        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':ma_khuyen_mai',$ma_khuyen_mai);
        $stmt->bindParam(':giam_phan_tram',$giam_phan_tram);
        $stmt->bindParam(':giam_toi_da',$giam_toi_da);
        $stmt->bindParam(':ngay_bat_dau',$ngay_bat_dau);
        $stmt->bindParam(':ngay_ket_thuc',$ngay_ket_thuc);
        $stmt->execute();
        return true;
    }

    public function deleteKhuyenMai($id) {
        $sql = "DELETE FROM khuyen_mais WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return true;
    }

    public function updateStatus() {
        $today = date('Y-m-d');
        $this->conn->query("UPDATE khuyen_mais SET trang_thai = 'Chưa có hiệu lực' WHERE ngay_bat_dau > '$today'");
        $this->conn->query("UPDATE khuyen_mais SET trang_thai = 'Có hiệu lực' WHERE ngay_bat_dau <= '$today' AND ngay_ket_thuc >= '$today'");
        $this->conn->query("UPDATE khuyen_mais SET trang_thai = 'Hết hiệu lực' WHERE ngay_ket_thuc < '$today'");
    }
    public function  __destruct()
    {
        $this->conn = null;
    }
}
?>
