<?php
class NguoiDungController{
    public $modelNguoiDung;

    public function __construct(){
        $this->modelNguoiDung = new NguoiDungs();
    }

    

    public function formLogin(){
        require_once './views/taikhoan/login.php';
    
        deleteSessionError();
    
    }
    public function Login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy email và pass gửi lên từ form
            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];
            // var_dump($email);die;

            // Xử lý kiểm tra thông tin đăng nhập
            $user = $this->modelNguoiDung->checkLogin($email);

            if ($user) { // Kiểm tra tài khoản có tồn tại không
    if ($mat_khau === $user['mat_khau']) { // Kiểm tra mật khẩu có đúng không
        if ($user['trang_thai'] == 1) { // Kiểm tra trạng thái tài khoản
            if ($user['vai_tro'] == 2) { // Vai trò người dùng
                // Lưu thông tin vào session
                $_SESSION['user_client'] = $user;
                header("Location: /base_du_an_1/"); // Chuyển đến trang người dùng
                exit();
            } elseif ($user['vai_tro'] == 1) { // Vai trò admin
                $_SESSION['user_admin'] = $user;
                header("Location: /base_du_an_1/admin/"); // Chuyển đến trang admin
                exit();
            } else {
                $_SESSION['error'] = 'Vai trò không hợp lệ';
                $_SESSION['flash'] = true;
                header("Location: ?act=login");
                exit();
            }
        } else {
            $_SESSION['error'] = 'Tài khoản đã bị khóa';
            $_SESSION['flash'] = true;
            header("Location: ?act=login");
            exit();
        }
    } else {
        $_SESSION['error'] = 'Mật khẩu không chính xác';
        $_SESSION['flash'] = true;
        header("Location: ?act=login");
        exit();
    }
} else {
    $_SESSION['error'] = 'Email không tồn tại';
    $_SESSION['flash'] = true;
    header("Location: ?act=login");
    exit();
}

        }
    }
    // ham hien thi form them
     public function dangKy(){
        require_once "./views/taikhoan/form_dang_ky.php";
        deleteSessionError();
    }

    // ham xu ly form them 
    public function postcreate(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $ten_nguoi_dung = $_POST["ten_nguoi_dung"];
            $email = $_POST["email"];
            $sdt = $_POST["sdt"];
            $dia_chi = $_POST["dia_chi"];
            $mat_khau = $_POST["mat_khau"];
            $confirm_mat_khau = $_POST["confirm_mat_khau"];
            $gioi_tinh = $_POST["gioi_tinh"];
            $ngay_sinh = $_POST["ngay_sinh"];
            $trang_thai = 1;
            $vai_tro = 2;
            // var_dump($_POST);die;
        }

        // varlidate
        $user = $this->modelNguoiDung->checkLogin($email);


        $errors = [];
        if(empty($ten_nguoi_dung)){
            $errors["ten_nguoi_dung"] = "Vui Lòng Nhập Tên Người Dùng";
        }
        if(empty($email)){
            $errors["email"] = "Vui Lòng Nhập Email";
        }
        if($user['email']==$email){
            $errors["email"] = "Email đã tồn tại, vui lòng chọn email khác";
        }
        if(empty($sdt)){
            $errors["sdt"] = "Vui Lòng Nhập Số Điện Thoại";
        } 

        if(empty($dia_chi)){
            $errors["dia_chi"] = "Vui Lòng Nhập Tên Địa Chỉ";
        } 

        if(empty($mat_khau)){
            $errors["mat_khau"] = "Vui Lòng Nhập Mật Khẩu";
        } 
        if(empty($confirm_mat_khau)){
            $errors["confirm_mat_khau"] = "Vui Lòng Nhập Xác Nhận Mật Khẩu";
        } 
        if($mat_khau != $confirm_mat_khau){
            $errors["confirm_mat_khau"] = "Xác nhận mật khẩu và mật khẩu phải giống nhau";
        } 
        $_SESSION['errors'] = $errors;



        // Thêm dữ liệu
        if(empty($errors)){
            
            // nếu không co lỗi thì thêm dữ liệu
            // thêm vào csdl
            $this->modelNguoiDung->createNguoiDung($ten_nguoi_dung,$email,$sdt,$dia_chi,$mat_khau,$gioi_tinh,$ngay_sinh,$trang_thai,$vai_tro);
            unset($_SESSION['errors']);
             // Thêm thông báo thành công vào session
            $_SESSION['success'] = 'Đăng ký thành công!';
            
            header("Location: ?act=login");
            exit();
        }else{
            $_SESSION['flash']=true;
            // nếu có lỗi thì nhập lại
            header("Location:?act=dang-ky");
            exit();
        }
    }
}