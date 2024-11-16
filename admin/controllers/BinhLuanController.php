<?php

class BinhLuanController
{
    public $modelBinhLuan;

    public function __construct()
    {
        $this->modelBinhLuan = new BinhLuan(); // Model xử lý bảng binh_luans
    }

    // Hiển thị danh sách bình luận
    public function index()
    {
        // Lấy danh sách bình luận từ database
        $binhLuans = $this->modelBinhLuan->getAllBinhLuan();
        
        // var_dump($binhLuans['hinh_anh']);die;

        require_once "./views/binhluan/list_binh_luan.php";
    }

    // Chi tiết một bình luận
    public function detailBinhLuan()
    {
        $binh_luan_id = $_GET['id_binh_luan'] ?? null;

        if ($binh_luan_id) {
            $binhLuans = $this->modelBinhLuan->getDetailBinhLuan($binh_luan_id);
            require_once "./views/binhluan/detail_binh_luan.php";
        } else {
            header("Location: ?act=binh-luans");
            exit();
        }
    }

    // Xóa một bình luận
    public function destroy(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id_binh_luan = $_POST['id_binh_luan'] ?? null;
            // var_dump($id_danh_gia);die;
            // xóa danh mục
            $this->modelBinhLuan->deleteBinhLuan($id_binh_luan);
            header("Location: ?act=binh-luans");
            exit();

        }
    }
   
}
