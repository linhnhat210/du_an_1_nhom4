<?php

class donHang
{
    public $conn;

    // kết nối cơ sở dữ liệu
    public  function __construct()
    {
        $this->conn = connectDB();
    }

    // damh sach danh muc 
    public function getAllDonHang(){
        try {
            //code...
            $sql = 'SELECT don_hangs.*, 
                            trang_thai_don_hangs.ten_trang_thai
                    FROM don_hangs
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
                    ORDER BY don_hangs.id DESC';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    public function searchDonHang($keyword){

    $sql = "SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai
            FROM don_hangs
            LEFT JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            WHERE don_hangs.ma_don_hang LIKE ? 
               OR don_hangs.ten_nguoi_nhan LIKE ? 
               OR don_hangs.email_nguoi_nhan LIKE ?
               OR don_hangs.sdt_nguoi_nhan LIKE ?
               OR don_hangs.ngay_dat LIKE ?
               OR don_hangs.tong_tien LIKE ?
               OR trang_thai_don_hangs.ten_trang_thai LIKE ?
            ORDER BY don_hangs.id DESC";
    
    $stmt = $this->conn->prepare($sql);

    // Gán từ khóa tìm kiếm cho tất cả các điều kiện
    $stmt->bindValue(1, "%$keyword%", PDO::PARAM_STR);
    $stmt->bindValue(2, "%$keyword%", PDO::PARAM_STR);
    $stmt->bindValue(3, "%$keyword%", PDO::PARAM_STR);
    $stmt->bindValue(4, "%$keyword%", PDO::PARAM_STR);
    $stmt->bindValue(5, "%$keyword%", PDO::PARAM_STR);
    $stmt->bindValue(6, "%$keyword%", PDO::PARAM_STR);
    $stmt->bindValue(7, "%$keyword%", PDO::PARAM_STR);

    try {
        $stmt->execute();
        // Lấy tất cả kết quả tìm kiếm
        $donHangs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $donHangs;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
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


   

   
    public function updateDonHang($id, $ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_id)
    {
        try {
            $ngayHienTai = date('Y-m-d H:i:s');
            if($trang_thai_id == 7){
                $ngay_nhan = $ngayHienTai;
            }
            // var_dump($id);die;
            $sql = 'UPDATE don_hangs SET
            ten_nguoi_nhan = :ten_nguoi_nhan,
            sdt_nguoi_nhan = :sdt_nguoi_nhan,
            email_nguoi_nhan = :email_nguoi_nhan,
            dia_chi_nguoi_nhan = :dia_chi_nguoi_nhan,
            ghi_chu = :ghi_chu,
            trang_thai_id = :trang_thai_id,
            ngay_nhan = :ngay_nhan
            WHERE id = :id';
            // var_dump($sql);die;

            $stmt = $this->conn->prepare($sql);
            // var_dump($stmt);die;
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':ten_nguoi_nhan',$ten_nguoi_nhan);
            $stmt->bindParam(':sdt_nguoi_nhan',$sdt_nguoi_nhan);
            $stmt->bindParam(':email_nguoi_nhan',$email_nguoi_nhan);
            $stmt->bindParam(':dia_chi_nguoi_nhan',$dia_chi_nguoi_nhan);
            $stmt->bindParam(':ghi_chu',$ghi_chu);
            $stmt->bindParam(':trang_thai_id',$trang_thai_id);
            $stmt->bindParam(':ngay_nhan',$ngay_nhan);
           

            $stmt->execute();

            // Lấy id đơn hàng vừa thêm
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }



    public function getDonHangFromKhachHang($id)
    {
        try {
            $sql = 'SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai
            FROM don_hangs
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            WHERE don_hangs.tai_khoan_id = :id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id',$id);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    


    // thêm danh mục
//     public function createDanhMuc($ten_danh_muc,$trang_thai){
//         try {
//             //code...
//             $sql = 'INSERT INTO  danh_mucs (ten_danh_muc,trang_thai)
//                     VALUES (:ten_danh_muc, :trang_thai)';

//             $stmt = $this->conn->prepare($sql);

//             $stmt->bindParam(':ten_danh_muc',$ten_danh_muc);
//             $stmt->bindParam(':trang_thai',$trang_thai);

//             $stmt->execute();

//             return true;
            
//         } catch (PDOException $e) {
//             echo 'Lỗi: '. $e->getMessage();
//         }
//     }

//     // xóa danh mục
//      public function deleteDanhMuc($id){
//         try {
//             //code...
//             $sql = 'DELETE FROM danh_mucs WHERE id= :id';

//             $stmt = $this->conn->prepare($sql);
            
//             $stmt->bindParam(':id', $id);

//             $stmt->execute();

//             return true;
            
//         } catch (PDOException $e) {
//             echo 'Lỗi: '. $e->getMessage();
//         }
//     }
//     // sửa danh mục
//     // lấy thông tin chi tiết
//     public function getDetailData($id){
//         try {
//             //code...
//             $sql = 'SELECT * FROM danh_mucs WHERE id= :id';

//             $stmt = $this->conn->prepare($sql);
            
//             $stmt->bindParam(':id', $id);

//             $stmt->execute();

//             return $stmt->fetch();
            
//         } catch (PDOException $e) {
//             echo 'Lỗi: '. $e->getMessage();
//         }
//     }
//     public function editDanhMuc($id,$ten_danh_muc,$trang_thai){
//         try {
//             //code...
//             $sql = 'UPDATE  danh_mucs SET ten_danh_muc = :ten_danh_muc , trang_thai = :trang_thai WHERE id= :id';

//             $stmt = $this->conn->prepare($sql);

//             $stmt->bindParam(':id',$id);
//             $stmt->bindParam(':ten_danh_muc',$ten_danh_muc);
//             $stmt->bindParam(':trang_thai',$trang_thai);

//             $stmt->execute();

//             return true;
            
//         } catch (PDOException $e) {
//             echo 'Lỗi: '. $e->getMessage();
//         }
//     }



//     // huy ket noi csdl
//     public function  __destruct()
//     {
//         $this->conn = null;
//     }
}




?>