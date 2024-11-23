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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ngay_lien_he = $_POST['datetime'];
        $trang_thai = $_POST['trang_thai'];
        $ten_khach_hang = $_POST["ten_khach_hang"];
        $email = $_POST["email"];
        $so_dien_thoai = $_POST["so_dien_thoai"];
        $tin_nhan = $_POST["tin_nhan"];
    }

    // Khởi tạo mảng lỗi
    $errors = [];

    // Kiểm tra tên khách hàng
    if (empty($ten_khach_hang)) {
        $errors["ten_khach_hang"] = "Vui lòng nhập tên khách hàng";
    }

    // Kiểm tra email
    if (empty($email)) {
        $errors["email"] = "Vui lòng nhập email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Email không hợp lệ (phải chứa ký tự '@')";
    }

    // Kiểm tra số điện thoại
    if (empty($so_dien_thoai)) {
        $errors["so_dien_thoai"] = "Vui lòng nhập số điện thoại";
    } elseif (!preg_match('/^\d{10}$/', $so_dien_thoai)) {
        $errors["so_dien_thoai"] = "Số điện thoại không hợp lệ";
    }

    // Kiểm tra tin nhắn
    if (empty($tin_nhan)) {
        $errors["tin_nhan"] = "Vui lòng nhập lời nhắn";
    }

    // Nếu có lỗi, lưu vào session và chuyển hướng
    if (empty($errors)) {
        // Xử lý dữ liệu nếu không có lỗi
        $this->modelLienhe->guilienhe($ten_khach_hang, $email, $so_dien_thoai, $tin_nhan, $ngay_lien_he, $trang_thai);
        $_SESSION['lien-he'] = "Gửi liên hệ thành công"; // Gán thông báo vào session
        header("Location: ?act=form-lien-he");
        exit();
    }else{
        $_SESSION['errors'] = $errors;
        header("Location: ?act=form-lien-he");
        exit();
    }
}

}

?>