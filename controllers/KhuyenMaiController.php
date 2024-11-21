<?php 

class KhuyenMaiController
{

    public $modelKhuyenMai;

    public function __construct(){
        $this->modelKhuyenMai = new KhuyenMai();
    }

    // Hàm hiển thị danh sách 
    public function index(){
        $khuyenMais = $this->modelKhuyenMai->getKhuyenmai();
        require_once './views/khuyenmai/form_khuyen_mai.php';
    }

}