<?php


class KhuyenMaiController {
    public $modelKhuyenMai;
    public function __construct(){
        $this->modelKhuyenMai = new KhuyenMai();
    }


    public function index() {
        $khuyenMais = $this->modelKhuyenMai->getAllKhuyenMai();
        require_once "./views/khuyenmai/list_khuyen_mai.php";
    }
    
    public function create() {
        require_once './views/khuyenmai/add_khuyen_mai.php';
        deleteSessionError();
        
    }
    public function postcreate() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            $ma_khuyen_mai = $_POST["ma_khuyen_mai"];
            $giam_phan_tram = $_POST["giam_phan_tram"];
            $giam_toi_da = $_POST["giam_toi_da"];
            $ngay_bat_dau = $_POST["ngay_bat_dau"];
            $ngay_ket_thuc = $_POST["ngay_ket_thuc"];
            $today = date("Y-m-d");
            if($today)
        
            // var_dump($trangThai);
        }

        // varlidate
        $errors = [];
        if(empty($ma_khuyen_mai)){
            $errors["ma_khuyen_mai"] = "Vui Lòng Nhập Mã Khuyên Mãi";
        }
        if(empty($giam_phan_tram)){
            $errors["giam_phan_tram"] = "Vui Lòng Nhập % Giảm Giá";
        }
        if(empty($giam_toi_da)){
            $errors["giam_toi_da"] = "Vui Lòng Nhập Giảm Tối Đa";
        }
        if(empty($ngay_bat_dau)){
            $errors["ngay_bat_dau"] = "Vui Lòng Chọn Ngày Bắt Đầu";
        }
        if(empty($ngay_ket_thuc)){
            $errors["ngay_bat_dau"] = "Vui Lòng Chọn Ngày Kết Thúc";
        }


        // Thêm dữ liệu
        if(empty($errors)){
            // nếu không co lỗi thì thêm dữ liệu
            // thêm vào csdl
            $this->modelKhuyenMai->createKhuyenMai($ma_khuyen_mai,$giam_phan_tram, $giam_toi_da, $ngay_bat_dau, $ngay_ket_thuc);
            unset($_SESSION['errors']);
            header("Location: ?act=khuyen-mais");
            exit();
        }else{
            // nếu có lỗi thì nhập lại
            $_SESSION['flash'] = true;
            header("Location:?act=form-them-khuyen-mai");
            exit();
        }
        
    }

    public function edit() {
        $id = $_GET['khuyen_mai_id'];

        // Lây thông tin chi tiết cảu danh mục
        $khuyenMai = $this->modelKhuyenMai->getDetailData($id);


        require_once './views/khuyenmai/edit_khuyen_mai.php';
    }
    public function postedit() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST['id'];
            $ma_khuyen_mai = $_POST["ma_khuyen_mai"];
            $giam_phan_tram = $_POST["giam_phan_tram"];
            $giam_toi_da = $_POST["giam_toi_da"];
            $ngay_bat_dau = $_POST["ngay_bat_dau"];
            $ngay_ket_thuc = $_POST["ngay_ket_thuc"];
        
            // var_dump($trangThai);
        }

        // varlidate
        $errors = [];
        if(empty($ma_khuyen_mai)){
            $errors["ma_khuyen_mai"] = "Vui Lòng Nhập Mã Khuyên Mãi";
        }
        if(empty($giam_phan_tram)){
            $errors["giam_phan_tram"] = "Vui Lòng Nhập % Giảm Giá";
        }
        if(empty($giam_toi_da)){
            $errors["giam_toi_da"] = "Vui Lòng Nhập Giảm Tối Đa";
        }
        if(empty($ngay_bat_dau)){
            $errors["ngay_bat_dau"] = "Vui Lòng Chọn Ngày Bắt Đầu";
        }
        if(empty($ngay_ket_thuc)){
            $errors["ngay_bat_dau"] = "Vui Lòng Chọn Ngày Kết Thúc";
        }


        // Thêm dữ liệu
        if(empty($errors)){
            // nếu không co lỗi thì thêm dữ liệu
            // thêm vào csdl
            $this->model->updateKhuyenMai($id, $ma_khuyen_mai,$giam_phan_tram, $giam_toi_da, $ngay_bat_dau, $ngay_ket_thuc);
            unset($_SESSION['errors']);
            header("Location: ?act=khuyen-mais");
            exit();
        }else{
            // nếu có lỗi thì nhập lại
            $_SESSION['errors'] = $errors;
            header("Location: ?act=form-sua-khuyen-mai&khuyen_mai_id=$id");
            exit();
        }
        
    }

    public function destroy($id) {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST["khuyen_mai_id"];
        // xóa danh mục
        $this->modelKhuyenMai->deleteKhuyenMai($id);
        exit();
            
        }
        
    }
    public function updateStatus() {
        $this->model->updateStatus();

        header("Location: ?act=khuyen-mais");
    }
}
?>
