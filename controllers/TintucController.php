<?php
require_once 'models/Tintuc.php';

class TintucController
{
    private $tinTucModel;

    public function __construct()
    {
        $this->tinTucModel = new TinTuc();
    }

    // Hiển thị danh sách tin tức
    public function index()
    {
        $tinTucs = $this->tinTucModel->getAllTinTuc();

        

        require_once 'views/tintuc/danh_sach_tin_tuc.php';
    }

    // Hiển thị chi tiết tin tức
    public function chiTiet()
    {
        $id = $_GET['id'] ?? null;

        if (!$id || !is_numeric($id)) {
            echo "ID không hợp lệ.";
            return;
        }

        $tinTuc = $this->tinTucModel->getTinTucById($id);


        require_once 'views/tintuc/chi_tiet_tin_tuc.php';
    }
}
