<?php 

    class NguoiDungController
    {
        public $modelNguoiDung;

        public function __construct(){
            $this->modelNguoiDung = new NguoiDung();

        }
            public function formLogin(){
            require_once './views/taikhoan/form_login.php';
        
            deleteSessionError();
        
        }
        public function login() {

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // lấy mail và pass gửi từ form 
        
                $email = $_POST['email'];
                $mat_khau = $_POST['mat_khau'];
        
                
                
                // xử lý kiểm tra thông tin đăng nhập 
                
                $user = $this->modelNguoiDung->checkLogin($email);
                
                // var_dump($user['avatar']);die;
                

            if ($user['email'] == $email ) {
                // Kiểm tra mật khẩu
                // if (password_verify($mat_khau, $user['mat_khau'])) {
                if ($mat_khau === $user['mat_khau']) {
                    // Kiểm tra vai trò và trạng thái
                    if ($user['vai_tro'] == 1) {
                        if ($user['trang_thai'] == 1) {
                            $_SESSION['user_admin'] = $user;
                            header("Location: /base_du_an_1/admin/" );
                            exit;
                        }else{
                            $_SESSION['error'] = 'Tài khoản đã bị cấm';
                            $_SESSION['flash'] = true ;
                            header("Location:?act=login-admin");
                            exit;
            
                        }
                    }else{
                        $_SESSION['error'] = 'Tài khoản không có quyền đăng nhập';
                        $_SESSION['flash'] = true ;
                        header("Location:?act=login-admin");
                        exit;
                    }
                }else{
                    $_SESSION['error'] = 'Mật khẩu không chính xác';
                        $_SESSION['flash'] = true ;
                        header("Location:?act=login-admin");
                        exit;
                }
            }else{
                $_SESSION['error'] = 'Email không tồn tại';
                        $_SESSION['flash'] = true ;
                        header("Location:?act=login-admin");
                        exit;
            }


            
                    
            

                   
                        // lỗi thì lưu lỗi vào session
                         
                        // var_dump($_SESSION['error']); die;
            

            }
                
        
        
    }

}
