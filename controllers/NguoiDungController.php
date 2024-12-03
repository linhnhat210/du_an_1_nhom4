<?php
class NguoiDungController{
    public $modelNguoiDung;
    public $modelDonHang;

    public function __construct(){
        $this->modelNguoiDung = new NguoiDungs();
        $this->modelDonHang = new DonHang();
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
                $_SESSION['user_client'] = $user;
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
        unset($_SESSION['errors']);
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

            $date = date("d-m-Y");
            // var_dump($_POST);die;
            // Chuyển đổi ngày sang timestamp để so sánh
            $timestamp_ngay_sinh = strtotime($ngay_sinh);
            $timestamp_today = strtotime($date);
        }

        // varlidate
        $user = $this->modelNguoiDung->checkLogin($email);
        $users = $this->modelNguoiDung->getNguoiDung();



        $errors = [];
        if(empty($ten_nguoi_dung)){
            $errors["ten_nguoi_dung"] = "Vui Lòng Nhập Tên Người Dùng";
        }
        if(empty($email)){
            $errors["email"] = "Vui Lòng Nhập Email";
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Email không hợp lệ (phải chứa ký tự '@')";
        }elseif($user['email']==$email){
            $errors["email"] = "Email đã tồn tại, vui lòng chọn email khác";
        }
        
        if(empty($sdt)){
            $errors["sdt"] = "Vui Lòng Nhập Số Điện Thoại";
        }elseif (!preg_match('/^\d{10}$/', $sdt)) {
        $errors["sdt"] = "Số điện thoại không hợp lệ";
    }
        foreach ($users as $user) {
            if ($user['sdt'] === $sdt) {
                $errors["sdt"] = "Số điện thoại đã tồn tại, vui lòng chọn số điện thoại khác";
                break;
            }
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
        if(empty($ngay_sinh)){
            $errors["ngay_sinh"] = "Vui Lòng Chọn Ngày Sinh";
        } 
        elseif ($timestamp_ngay_sinh > $timestamp_today) {
            $errors["ngay_sinh"] = "Vui lòng chọn ngày sinh không phải là ngày hôm nay hoặc ngày trong tương lai.";
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
            $_SESSION['errors'] = $errors;
            
            // nếu có lỗi thì nhập lại
            header("Location:?act=dang-ky");
            exit();
        }
    }
       public function myAccount(){
        if (isset($_SESSION['user_client'])) {
            $userId = $_SESSION['user_client']['id'];
    
            // Lấy thông tin tài khoản từ ID người dùng
            $userAccount = $this->modelNguoiDung->getTaiKhoanFromEmail($userId);

        require_once './views/taikhoan/my_account.php';
        unset($_SESSION["errors"]);
        } else {
            // Thông báo nếu chưa đăng nhập
            echo '<script>
            alert("Bạn chưa đăng nhập. Vui lòng đăng nhập để tiếp tục.");
        </script>';
        header("Location: " . BASE_URL . '?act=login');
            die;
        }
    }
    public function listDonHang(){
        if (isset($_SESSION['user_client'])) {
            $userId = $_SESSION['user_client']['id'];
    
            // Lấy thông tin tài khoản từ ID người dùng
            $userAccount = $this->modelNguoiDung->getTaiKhoanFromEmail($userId);

                $userId = $_SESSION['user_client']['id'];
        $donHang = $this->modelDonHang->getAllDonHang($userId);
        require_once './views/taikhoan/don_hang.php';
        } else {
            // Thông báo nếu chưa đăng nhập
            echo '<script>
            alert("Bạn chưa đăng nhập. Vui lòng đăng nhập để tiếp tục.");
        </script>';
        header("Location: " . BASE_URL . '?act=login');
            die;
        }
    }
    public function capNhatTaiKhoan(){
        if (isset($_SESSION['user_client'])) {
            $userId = $_SESSION['user_client']['id'];
    
            // Lấy thông tin tài khoản từ ID người dùng
            $userAccount = $this->modelNguoiDung->getTaiKhoanFromEmail($userId);

           if($_SERVER["REQUEST_METHOD"] == "POST"){

                $id = $_POST["id"];
                $ten_nguoi_dung = $_POST["ten_nguoi_dung"];
                $sdt = $_POST["sdt"];
                $dia_chi = $_POST["dia_chi"];
                $ngay_sinh = $_POST["ngay_sinh"];
                $gioi_tinh = $_POST["gioi_tinh"];

                $date = date("d-m-Y");
                // var_dump($_POST);die;
                // Chuyển đổi ngày sang timestamp để so sánh
                $timestamp_ngay_sinh = strtotime($ngay_sinh);
                $timestamp_today = strtotime($date);
                
                $old_file = $_SESSION["user_client"]["avatar"];
                $avatar = $_FILES["avatar"] ?? null;
                // Logic sửa ảnh
                if (isset($avatar) && $avatar['error'] == UPLOAD_ERR_OK) {
                // upload ảnh mới lên
                    $new_file = uploadFile($avatar, './uploads/');
                if (!empty($old_file)){
                    // Nếu có ảnh cũ thì xóa đi
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }
          
            }

            $users = $this->modelNguoiDung->getNguoiDung();
            $errors = [];
             if(empty($ten_nguoi_dung)){
            $errors["ten_nguoi_dung"] = "Vui Lòng Nhập Tên Người Dùng";
        }
        
        
        if(empty($sdt)){
            $errors["sdt"] = "Vui Lòng Nhập Số Điện Thoại";
        }elseif (!preg_match('/^\d{10}$/', $sdt)) {
        $errors["sdt"] = "Số điện thoại không hợp lệ";
        }foreach ($users as $user) {
            if ($user['id'] != $_SESSION['user_client']['id'] && $user['sdt'] === $sdt) {
                $errors["sdt"] = "Số điện thoại đã tồn tại, vui lòng chọn số điện thoại khác";
                break;
            }
        }
        if(empty($dia_chi)){
            $errors["dia_chi"] = "Vui Lòng Nhập Tên Địa Chỉ";
        } 

        if(empty($ngay_sinh)){
            $errors["ngay_sinh"] = "Vui Lòng Chọn Ngày Sinh";
        } 
        elseif ($timestamp_ngay_sinh > $timestamp_today) {
            $errors["ngay_sinh"] = "Vui lòng chọn ngày sinh không phải là ngày hôm nay hoặc ngày trong tương lai.";
        }
        $_SESSION['errors'] = $errors;


         if(empty($errors)){
             // nếu không co lỗi thì thêm dữ liệu
             // thêm vào csdl
             
             $this->modelNguoiDung->updateNguoiDung($id,$ten_nguoi_dung,$sdt,$dia_chi,$gioi_tinh,$ngay_sinh,$new_file);
             $_SESSION["user_client"] = $this->modelNguoiDung->getTaiKhoanFromEmail($id);
             if($_SESSION["user_client"]['vai_tro'] == 1){

                 $_SESSION["user_admin"] = $this->modelNguoiDung->getTaiKhoanFromEmail($id);
             }
            //  var_dump($new_file);die;
            unset($_SESSION['errors']);
             // Thêm thông báo thành công vào session

            
                            echo '<script>
                    alert("Cập nhật thông tin thành công");
                     window.location.href = "' . BASE_URL . '?act=my-account";
                </script>';

        }else{

            
            // nếu có lỗi thì nhập lại
            header("Location:?act=my-account");
            exit();
        }
        } else {
            // Thông báo nếu chưa đăng nhập
            echo '<script>
            alert("Bạn chưa đăng nhập. Vui lòng đăng nhập để tiếp tục.");
        </script>';
        header("Location: " . BASE_URL . '?act=login');
            die;
        }
    
}
        public function doiMatKhau(){
            if (isset($_SESSION['user_client'])) {
            $userId = $_SESSION['user_client']['id'];
    
            // Lấy thông tin tài khoản từ ID người dùng
            $userAccount = $this->modelNguoiDung->getTaiKhoanFromEmail($userId);
            
            require_once "views/taikhoan/doi_mat_khau.php";
                unset($_SESSION['errors']);
                } else {
            // Thông báo nếu chưa đăng nhập
            echo '<script>
            alert("Bạn chưa đăng nhập. Vui lòng đăng nhập để tiếp tục.");
        </script>';
        header("Location: " . BASE_URL . '?act=login');
            die;
        }
        }
        public function postEditMatKhau(){
            if (isset($_SESSION['user_client'])) {
            $userId = $_SESSION['user_client']['id'];
    
            // Lấy thông tin tài khoản từ ID người dùng
            $userAccount = $this->modelNguoiDung->getTaiKhoanFromEmail($userId);
              if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id = $_POST["id"] ;
                $mk_cu = $_POST["mk_cu"] ;
                $mk_moi = $_POST["mk_moi"] ;
                $mk_xn = $_POST["mk_xn"] ;
            
            }
            // var_dump($id);die;
            $user = $this->modelNguoiDung->getTaiKhoanFromEmail($id);
            $errors = [];
            if(empty($mk_cu)){
                $errors["mk_cu"] = "Vui Lòng Nhập Mật Khẩu Hiện Tại";
            }elseif($user["mat_khau"] != $mk_cu){
                $errors["mk_cu"] = "Mật khẩu cũ không chính Xác";
            }else{
                if($mk_moi !=  $mk_xn){
         
                    $errors["mk_xn"] = "Mật khẩu mới và xác nhận phải trùng nhau";
                }elseif($mk_moi == $user["mat_khau"] ){
                    $errors["mk_moi"] = "Mật khẩu mới phải khác mật khẩu hiện tại";
                }
            }
            if(empty($mk_moi)){
                $errors["mk_moi"] = "Vui Lòng Nhập Mật Khẩu Mới";
            }
            if(empty($mk_xn)){
                $errors["mk_xn"] = "Vui Lòng Nhập Xác Nhận Mật Khẩu";
            }
            // var_dump($errors);die;

            $_SESSION["errors"] = $errors;
            if(empty($errors)){
             // nếu không co lỗi thì thêm dữ liệu
             // thêm vào csdl
             
             $this->modelNguoiDung->updateMatKhau($id, $mk_moi);
            echo '<script>
                    alert("Đổi mật khẩu thành công");
                     window.location.href = "'.  BASE_URL . '";
                </script>';
            //  var_dump($new_file);die;
            unset($_SESSION['errors']);
             // Thêm thông báo thành công vào session


            }else{

            
            // nếu có lỗi thì nhập lại
            header("Location:?act=doi-mat-khau");
            exit();
            }
            } else {
            // Thông báo nếu chưa đăng nhập
            echo '<script>
            alert("Bạn chưa đăng nhập. Vui lòng đăng nhập để tiếp tục.");
        </script>';
        header("Location: " . BASE_URL . '?act=login');
            die;
        }

        
        
        }

}