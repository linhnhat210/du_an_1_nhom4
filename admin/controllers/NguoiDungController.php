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
        
            $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);
            // $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);
        
            require_once './views/nguoidung/detai_nguoi_dung.php';
        
            
        }
    }