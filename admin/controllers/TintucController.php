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

       //hàm tìm kiếm
    public function search(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $keyword = $_POST['keyword'];
            $modelTinTuc = new Tintuc();
            $tinTucs = $modelTinTuc->searchTinTuc($keyword);

            // var_dump($trangThai);
        }

        $this->modelTinTuc->searchTinTuc($keyword);

        require_once "./views/tintuc/list_tin_tuc.php";
    }


    // Hàm hiển thị form thêm tin tức
    public function create(){
        require_once "./views/tintuc/add_tin_tuc.php";
         unset($_SESSION['errors']);
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
            $_SESSION['errors'] = $errors;

            // Nếu không có lỗi, tiến hành thêm dữ liệu
            if (empty($errors)) {
                // var_dump($_POST);die;
                // Thực hiện lưu ảnh nếu có ảnh tải lên
                $this->modelTinTuc->createTinTuc($tieu_de, $noi_dung,  $trang_thai,$file_thumb);
                unset($_SESSION['errors']);
                header("Location: ?act=tin-tucs");
                exit();
            } else {
             
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
        unset($_SESSION['errors']);
    }

    // Hàm xử lý form sửa tin tức
    public function postedit(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $tieu_de = $_POST["tieu_de"];
            $noi_dung = $_POST["noi_dung"];
            $trang_thai = $_POST["trang_thai"];
            $hinh_anh = $_FILES["hinh_anh"];

            $sanPhamOld = $this->modelTinTuc->getDetailData($id);
            $old_file = $sanPhamOld['hinh_anh']; // Lấy ảnh cũ để phục vụ cho sửa ảnh

            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                // upload file ảnh mới lên
                $new_file = uploadFile($hinh_anh, './uploads/');
            if (!empty($old_file)) { // Nếu có ảnh cũ thì xóa đi
                deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }
            
            $errors = [];
            if (empty($tieu_de)) {
                $errors["tieu_de"] = "Vui lòng nhập tiêu đề tin tức.";
            }
            if (empty($noi_dung)) {
                $errors["noi_dung"] = "Vui lòng nhập nội dung tin tức.";
            }
            $_SESSION['errors'] = $errors;
            
            if (empty($errors)) {
                // var_dump($new_file);die;
                
                $this->modelTinTuc->editTinTuc($id, $tieu_de, $noi_dung, $hinh_anh, $trang_thai, $new_file);
                unset($_SESSION['errors']);
                header("Location: ?act=tin-tucs");
                exit();
            } else {
                
                header("Location: ?act=form-sua-tin-tuc&tin_tuc_id=" . $id);
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
