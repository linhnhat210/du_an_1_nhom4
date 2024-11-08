<?php

class SanPham
{
    public $conn;

    // kết nối cơ sở dữ liệu
    public  function __construct()
    {
        $this->conn = connectDB();
    }

    // damh sach san pham
    public function getAllSanPham (){
        try {
            //code...
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
                    FROM san_phams
                    LEFT JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }

    //thêm sản phẩm
    public function createSanPham($ten_san_pham,$danh_muc_id,$tac_gia,$gia_ban,$gia_khuyen_mai,$so_luong,$ngay_nhap,$mo_ta,$trang_thai){
        try {
            //code...
            $sql = 'INSERT INTO  san_phams (ten_san_pham,danh_muc_id,tac_gia,gia_ban,gia_khuyen_mai,so_luong,ngay_nhap,mo_ta,trang_thai)
                    VALUES (:ten_san_pham,:danh_muc_id,:tac_gia,:gia_ban,:gia_khuyen_mai,:so_luong,:ngay_nhap,:mo_ta,:trang_thai)';

            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':ten_san_pham',$ten_san_pham);
            $stmt->bindParam(':danh_muc_id',$danh_muc_id);
            $stmt->bindParam(':tac_gia',$tac_gia);
            $stmt->bindParam(':gia_ban',$gia_ban);
            $stmt->bindParam(':gia_khuyen_mai',$gia_khuyen_mai);
            $stmt->bindParam(':so_luong',$so_luong);
            $stmt->bindParam(':ngay_nhap',$ngay_nhap);
            $stmt->bindParam(':mo_ta',$mo_ta);
            $stmt->bindParam(':trang_thai',$trang_thai);


            $stmt->execute();

            return true;
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }

    // xóa danh mục
     public function deleteSanPham($id){
        try {
            //code...
            $sql = 'DELETE FROM san_phams WHERE id= :id';

            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return true;
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    // sửa danh mục
    // lấy thông tin chi tiết
    public function getDetailData($id){
        try {
            //code...
            $sql = 'SELECT * FROM san_phams WHERE id= :id';

            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    public function editSanPham($id,$ten_san_pham,$danh_muc_id,$tac_gia,$gia_ban,$gia_khuyen_mai,$so_luong,$ngay_nhap,$mo_ta,$trang_thai){
        try {
            //code...
            var_dump('abc');
            $sql = 'UPDATE  san_phams SET ten_san_pham = :ten_san_pham ,
                                          danh_muc_id = :danh_muc_id ,
                                          tac_gia = :tac_gia ,
                                          gia_ban = :gia_ban ,
                                          gia_khuyen_mai = :gia_khuyen_mai ,
                                          so_luong = :so_luong ,
                                          ngay_nhap = :ngay_nhap ,
                                          mo_ta = :mo_ta ,
                                          trang_thai = :trang_thai 
                                          WHERE id= :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':ten_san_pham',$ten_san_pham);
            $stmt->bindParam(':danh_muc_id',$danh_muc_id);
            $stmt->bindParam(':tac_gia',$tac_gia);
            $stmt->bindParam(':gia_ban',$gia_ban);
            $stmt->bindParam(':gia_khuyen_mai',$gia_khuyen_mai);
            $stmt->bindParam(':so_luong',$so_luong);
            $stmt->bindParam(':ngay_nhap',$ngay_nhap);
            $stmt->bindParam(':mo_ta',$mo_ta);
            $stmt->bindParam(':trang_thai',$trang_thai);

            $stmt->execute();

            return true;
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }



    // huy ket noi csdl
    public function  __destruct()
    {
        $this->conn = null;
    }
}




?>