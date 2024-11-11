<?php


class TrangThaiController
{
    public $modelTrangThai;
    public function __construct(){
        $this->modelTrangThai = new TrangThai();
    }


    // hàm hiển thị danh sách 
    public function index(){
        // lấy dữ liệu người dùng
        $trangThais = $this->modelTrangThai->getAllTrangThai();
        // var_dump($danhMucs);
        require_once "./views/trangthaidonhang/list_trang_thai_don_hang.php";
    }

    // ham hien thi form them
    public function create(){
        require_once "./views/trangthaidonhang/add_trang_thai_don_hang.php";
    }

    // ham xu ly form them 
    public function postcreate(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $ten_trang_thai = $_POST["ten_trang_thai"];
            
            // var_dump($trangThai);
        }

        // varlidate
        $errors = [];
        if(empty($ten_trang_thai)){
            $errors["ten_trang_thai"] = "Vui Lòng Nhập Tên Trạng Thái";
        }


        // Thêm dữ liệu
        if(empty($errors)){
            // nếu không co lỗi thì thêm dữ liệu
            // thêm vào csdl
            $this->modelTrangThai->createTrangThai($ten_trang_thai);
            unset($_SESSION['errors']);
            header("Location: ?act=trang-thai-don-hangs");
            exit();
        }else{
            // nếu có lỗi thì nhập lại
            $_SESSION['errors'] = $errors;
            header("Location:?act=form-them-trang-thai-don-hang");
            exit();
        }
    }

    

   
    

    // ham xoa danh muc trong csdl
    public function destroy(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST["trang_thai_id"];
            // xóa danh mục
            $this->modelTrangThai->deleteTrangThai($id);
            header("Location: ?act=trang-thai-don-hangs");
            exit();

        }
    }

}







?>