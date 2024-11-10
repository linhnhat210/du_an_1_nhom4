<?php 
require_once 'models/Tintuc.php';
class TintucController
{
    public function index() {
        require_once "./views/tintuc/danh_sach_tin_tuc.php";
    }
    public $modelTinTuc;

    public function __construct(){
        $this->modelTinTuc = new Tintuc();
    }

    // Hàm hiển thị danh sách tin tức trên trang client
    public function getAllTintuc(){
        $tinTucs = $this->modelTinTuc->getAllTinTuc();
        require_once './views/client/tintuc_list.php';
    }

    // Hàm hiển thị chi tiết một tin tức trên trang client
    public function show(){
        $id = $_GET['tin_tuc_id'];
        $tinTuc = $this->modelTinTuc->getDetailData($id);
        require_once './views/client/tintuc_detail.php';
    }

}