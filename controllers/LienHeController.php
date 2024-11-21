<?php 

class LienHeControler
{
    public $modelLienhe;
    public function __construct(){
        $this->modelLienhe = new Lienhe();
    }
    public function index() {
        require_once "./views/lienhe/lienhe.php";
    }
    public function guilienhe() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // var_dump($_POST);die;
            $ngay_lien_he = $_POST['datetime'];
            $trang_thai = $_POST['trang_thai'];
            $ten_khach_hang = $_POST["ten_khach_hang"];
            $email = $_POST["email"];
            $so_dien_thoai = $_POST["so_dien_thoai"];
            $tin_nhan = $_POST["tin_nhan"];
        }
        
        // varlidate
        $errors = [];
        
        if(empty($ten_khach_hang)){
            $errors["ten_khach_hang"] = "Vui lòng nhập tên khách hàng";
        }
        if(empty($email)){
            $errors["email"] = "Vui lòng nhập email";
        }
        if(empty($so_dien_thoai)){
            $errors["so_dien_thoai"] = "Vui lòng nhập số điện thoại";
        }
        if(empty($tin_nhan)){
            $errors["tin_nhan"] = "Vui lòng nhập lời nhắn";
        }


        // Thêm dữ liệu
        if(empty($errors)){
            // nếu không co lỗi thì thêm dữ liệu
            // thêm vào csdl
            // var_dump($ngay_lien_he);die;
            $this->modelLienhe->guilienhe($ten_khach_hang,$email,$so_dien_thoai,$tin_nhan,$ngay_lien_he,$trang_thai);
            $_SESSION['success'] = 'Gửi thông tin liên hệ thành công!';
            // unset($_SESSION['errors']);
            header("Location: ?act=form-lien-he");
            exit();
        }else{
            // nếu có lỗi thì nhập lại
            $_SESSION['errors'] = $errors;
            header("Location: ?act=form-lien-he");
            exit();
        }
    }
}