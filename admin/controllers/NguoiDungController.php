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
            // var_dump($listDonHang);die;
            $listBinhLuan = $this->modelNguoiDung->getBinhLuanFromKhachHang($id_khach_hang);
            $listDanhGia = $this->modelNguoiDung->getDanhGiaFromKhachHang($id_khach_hang);
            
            // var_dump($listBinhLuan[0]["hinh_anh"]);die;
        
            require_once './views/nguoidung/detai_nguoi_dung.php';
                   
    }
    public function formLogin(){
            require_once './views/login/form_login_admin.php';
            unset($_SESSION['error']);
            
        
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
                            unset($_SESSION['error']);
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
    public function edit()  {
        $id_khach_hang = $_GET['id_nguoi_dung'];
        $nguoiDung = $this->modelNguoiDung->getDetailNguoiDung($id_khach_hang);
        require_once './views/nguoidung/update_nguoi_dung.php';
    }

    public function postEdit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            // Lấy a dữ liệu cũ của sản phẩm
            $id_nguoi_dung = $_POST['id_nguoi_dung'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $vai_tro = $_POST['vai_tro'] ?? '';

            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];

            if (empty($vai_tro)) {
                $errors['vai_tro'] = 'Vai trò của user';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái của user';
            }
           

            $_SESSION['error'] = $errors;
            // var_dump($errors);die;

            if (empty($errors)) {
                // Nếu ko có lỗi thì tiến hành thêm sản phẩm
                // var_dump('Oke');die;

                $this->modelNguoiDung->updateNguoiDung($id_nguoi_dung,$vai_tro, $trang_thai);

                // var_dump($san_pham_id);die;

                header("Location: ?act=nguoi-dungs");
                exit();
            } else {
                // Trả về form và lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                
                header("Location: ?act=form-sua-nguoi-dung&id_nguoi_dung=" .  $id_nguoi_dung);
                exit();
            }
        }
    }
            
}

    
