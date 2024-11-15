<?php 

    class NguoiDungController
    {
        public $modelNguoiDung;
        public $modelDonHang;
        public function __construct(){
            $this->modelNguoiDung = new NguoiDung();
            $this->modelDonHang =new DonHang();
        }


        // hàm hiển thị danh sách 
        public function index(){
            // lấy dữ liệu người dùng
            $nguoiDungs = $this->modelNguoiDung->getAllNguoiDung();
            // var_dump($danhMucs);
            require_once "./views/nguoidung/list_nguoi_dung.php";
        }
                 // hàm tìm kiếm
         // hàm tìm kiếm
    public function search()
    {
        // lấy dữ liệu từ yêu cầu (request)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $keyword = $_POST['keyword'];
            $NguoiDungModel = new NguoiDung();
            $nguoiDungs = $NguoiDungModel->searchNguoiDung($keyword);
            // var_dump($keyword);die;

            // var_dump($trangThai);
        }

    
        $this->modelNguoiDung->searchNguoiDung($keyword);

        // hiển thị kết quả tìm kiếm
        require_once "./views/nguoidung/list_nguoi_dung.php";
    }

        public function getDetail(){

            $id_khach_hang = $_GET['id_nguoi_dung'];
            $nguoiDung = $this->modelNguoiDung->getDetailNguoiDung($id_khach_hang);
        
            $listDonHang = $this->modelNguoiDung->getDonHangFromKhachHang($id_khach_hang);
            // $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);
        
            require_once './views/nguoidung/detai_nguoi_dung.php';
                   
    }
    public function formLogin(){
            require_once './views/login/form_login_admin.php';
        
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
                         $user;
                        // var_dump($_SESSION['error']); die;
            

            }
                
        
        
    }
            
}

    
