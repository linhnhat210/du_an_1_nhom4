<?php

class DanhMuclienheController
{

    public $modelLienhe;

    public function __construct()
    {
        $this->modelLienhe = new Lienhe();
    }

    // hàm hiển thị danh sách 
    public function index()
    {
        // lấy dữ liệu người dùng
        $lienHes = $this->modelLienhe->getAllLienhe();
        require_once "./views/danhmuclienhe/list_lien_he.php";
    }

    // hàm tìm kiếm
    public function search()
    {
        // lấy dữ liệu từ yêu cầu (request)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $keyword = $_POST['keyword'];
            $lienHeModel = new LienHe();
            $lienHes = $lienHeModel->searchLienHe($keyword);

            // var_dump($trangThai);
        }

        // tìm kiếm danh mục liên hệ
        $this->modelLienhe->searchLienHe($keyword);

        // hiển thị kết quả tìm kiếm
        require_once "./views/danhmuclienhe/list_lien_he.php";
    }
        public function edit(){
        // lấy id
        $id = $_GET['lien_he_id'];

        // Lây thông tin chi tiết cảu danh mục
        $lienHe = $this->modelLienhe->getDetailData($id);

        // echo $danhMuc["tenDanhMuc"];
        require_once "./views/danhmuclienhe/edit_lien_he.php";
    }
    public function postedit(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST["id"];
            $trang_thai = $_POST["trang_thai"];
            // var_dump($trangThai);
        }

        // varlidate



            $this->modelLienhe->editLienHe($id,$trang_thai);
            header("Location: ?act=lien-hes");
            exit();

    }
}

?>
