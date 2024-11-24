<?php

class KhuyenMai {
    public $conn;

    public  function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllKhuyenMai() {
        $sql = "SELECT * FROM khuyen_mais
        ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        
        
        return $stmt->fetchAll();
    }
    public function searchKhuyenMai($keyword)
    {
  $sql = "SELECT * FROM khuyen_mais WHERE ma_khuyen_mai LIKE ?";
  $stmt = $this->conn->prepare($sql);
  $stmt->bindValue(1, "%$keyword%");

  try {
      $stmt->execute();
      $khuyenMais = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $khuyenMais;
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return []; // Return an empty array to avoid errors in the view
  }
    }
      
    
    public function getDetailData($id){
        try {
            //code...
            $sql = 'SELECT * FROM khuyen_mais WHERE id= :id';

            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    
    public function createKhuyenMai($ma_khuyen_mai,$giam_phan_tram, $giam_toi_da, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai) {
        
        $sql = "INSERT INTO khuyen_mais (ma_khuyen_mai,giam_phan_tram, giam_toi_da, ngay_bat_dau, ngay_ket_thuc,trang_thai) 
                  VALUES (:ma_khuyen_mai,:giam_phan_tram, :giam_toi_da, :ngay_bat_dau, :ngay_ket_thuc,:trang_thai)";
        
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':ma_khuyen_mai',$ma_khuyen_mai);
        $stmt->bindParam(':giam_phan_tram',$giam_phan_tram);
        $stmt->bindParam(':giam_toi_da',$giam_toi_da);
        $stmt->bindParam(':ngay_bat_dau',$ngay_bat_dau);
        $stmt->bindParam(':ngay_ket_thuc',$ngay_ket_thuc);
        $stmt->bindParam(':trang_thai',$trang_thai);

        $stmt->execute();
        return true;
    }

    public function updateKhuyenMai($id, $ma_khuyen_mai,$giam_phan_tram, $giam_toi_da, $ngay_bat_dau, $ngay_ket_thuc,$trang_thai) {
        $sql = "UPDATE khuyen_mais SET ma_khuyen_mai = :ma_khuyen_mai,
                                         ngay_bat_dau = :ngay_bat_dau,
                                         ngay_ket_thuc = :ngay_ket_thuc,
                                         giam_phan_tram = :giam_phan_tram,
                                         giam_toi_da = :giam_toi_da,
                                         trang_thai = :trang_thai
                                         WHERE id = :id";
        $stmt = $this->conn->prepare($sql);


        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':ma_khuyen_mai',$ma_khuyen_mai);
        $stmt->bindParam(':giam_phan_tram',$giam_phan_tram);
        $stmt->bindParam(':giam_toi_da',$giam_toi_da);
        $stmt->bindParam(':ngay_bat_dau',$ngay_bat_dau);
        $stmt->bindParam(':ngay_ket_thuc',$ngay_ket_thuc);
        $stmt->bindParam(':trang_thai',$trang_thai);
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

    public function editKhuyenMai($id,$trang_thai) {
        $sql = "UPDATE khuyen_mais SET trang_thai = :trang_thai
                                    WHERE id = :id";
        $stmt = $this->conn->prepare($sql);


        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':trang_thai',$trang_thai);
        $stmt->execute();
        return true;
    }
    public function  __destruct()
    {
        $this->conn = null;
    }
}
?>
