<?php

class DanhGiaController
{
    public $modelDanhGia;

    public function __construct()
    {
        $this->modelDanhGia = new DanhGia(); // Model xử lý bảng binh_luans
    }

    // Hiển thị danh sách bình luận
    public function index()
    {
        // Lấy danh sách bình luận từ database
        $danhGias = $this->modelDanhGia->getAllDanhGia();
        
        // var_dump($binhLuans['hinh_anh']);die;

        require_once "./views/danhgia/list_danh_gia.php";
    }

    // Chi tiết một bình luận
    
     public function destroy(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id_danh_gia = $_POST['id_danh_gia'] ?? null;
            // var_dump($id_danh_gia);die;
            // xóa danh mục
            $this->modelDanhGia->deleteDanhGia($id_danh_gia);
            header("Location: ?act=danh-gias");
            exit();

        }
    }

    // Xóa một bình luận

}
