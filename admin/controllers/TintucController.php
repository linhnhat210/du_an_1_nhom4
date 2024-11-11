<?php

class TintucController
{
    public $modelTinTuc;

    public function __construct(){
        $this->modelTinTuc = new TinTuc();
    }

    // Hàm hiển thị danh sách tin tức
    public function index(){
        $tinTucs = $this->modelTinTuc->getAllTinTuc();
        require_once "./views/tintuc/list_tin_tuc.php";
    }

    // Hàm hiển thị form thêm tin tức
    public function create(){
        require_once "./views/tintuc/add_tin_tuc.php";
        deleteSessionError();
    }

    // Hàm xử lý form thêm tin tức
    public function postcreate(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tieu_de = $_POST["tieu_de"];
            
            $noi_dung = $_POST["noi_dung"];
            $hinh_anh = $_FILES["hinh_anh"];
            $trang_thai = $_POST["trang_thai"];
            $file_thumb = uploadFile($hinh_anh,'./uploads/');
            // Xử lý lỗi nhập liệu
            $errors = [];
            if (empty($tieu_de)) {
                $errors["tieu_de"] = "Vui lòng nhập tiêu đề tin tức.";
            }
            if (empty($noi_dung)) {
                $errors["noi_dung"] = "Vui lòng nhập nội dung tin tức.";
            }

            // Nếu không có lỗi, tiến hành thêm dữ liệu
            if (empty($errors)) {
                // var_dump($_POST);die;
                // Thực hiện lưu ảnh nếu có ảnh tải lên
                $this->modelTinTuc->createTinTuc($tieu_de, $noi_dung,  $trang_thai,$file_thumb);
                unset($_SESSION['errors']);
                header("Location: ?act=tin-tucs");
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: ?act=form-them-tin-tuc");
                exit();
            }
        }
    }

    // Hàm hiển thị form sửa tin tức
    public function edit(){
        $id = $_GET['tin_tuc_id'];
        $tinTuc = $this->modelTinTuc->getDetailData($id);
        require_once "./views/tintuc/edit_tin_tuc.php";
        deleteSessionError();
    }

    // Hàm xử lý form sửa tin tức
    public function postedit(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $tieu_de = $_POST["tieu_de"];
            $noi_dung = $_POST["noi_dung"];
            $trang_thai = $_POST["trang_thai"];
            $hinh_anh = $_FILES["hinh_anh"]["name"];

            $errors = [];
            if (empty($tieu_de)) {
                $errors["tieu_de"] = "Vui lòng nhập tiêu đề tin tức.";
            }
            if (empty($noi_dung)) {
                $errors["noi_dung"] = "Vui lòng nhập nội dung tin tức.";
            }

            if (empty($errors)) {
                if (!empty($hinh_anh)) {
                    move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], "./uploads/" . $hinh_anh);
                }
                $this->modelTinTuc->editTinTuc($id, $tieu_de, $noi_dung, $hinh_anh, $trang_thai);
                unset($_SESSION['errors']);
                header("Location: ?act=tin-tucs");
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: ?act=form-sua-tin-tuc");
                exit();
            }
        }
    }

    // Hàm xóa tin tức trong cơ sở dữ liệu
    public function destroy(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["tin_tuc_id"];
            $this->modelTinTuc->deleteTinTuc($id);
            header("Location: ?act=tin-tucs");
            exit();
        }
    }
}

?>
