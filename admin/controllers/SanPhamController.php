<?php


class SanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct(){
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
        
    }


    // hàm hiển thị danh sách 
    public function index(){
        // lấy dữ liệu người dùng
        $sanPhams = $this->modelSanPham->getAllSanPham();
        // var_dump($sanPhams);
        require_once "./views/sanpham/list_san_pham.php";
    }

    // ham hien thi form them
    public function create(){

        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once "./views/sanpham/add_san_pham.php";
    }

    // ham xu ly form them 
    public function postcreate(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $ten_san_pham = $_POST["ten_san_pham"];
            $danh_muc_id = $_POST["danh_muc_id"];
            $tac_gia = $_POST["tac_gia"];
            $gia_ban = $_POST["gia_ban"];
            $gia_khuyen_mai = $_POST["gia_khuyen_mai"];
            $so_luong = $_POST["so_luong"];
            $ngay_nhap = $_POST["ngay_nhap"];
            $mo_ta = $_POST["mo_ta"];
            $trang_thai = $_POST["trang_thai"];

            // $hinh_anh = $_FILES["hinh_anh"];
            // $img_array = $FILES["img_array"];
            
            // var_dump($trangThai);
        }

        // varlidate
        $errors = [];
        if(empty($ten_san_pham)){
            $errors["ten_san_pham"] = "Vui Lòng Nhập Tên Sản Phẩm";
        }
        if(empty($tac_gia)){
            $errors["tac_gia"] = "Vui Lòng Nhập Tên Tác Giả";
        }
        if(empty($gia_ban)){
            $errors["gia_ban"] = "Vui Lòng Nhập Giá Bán";
        }
        if(empty($so_luong)){
            $errors["so_luong"] = "Vui Lòng Nhập Số Lượng";
        }
        if(empty($mo_ta)){
            $errors["mo_ta"] = "Vui Lòng Nhập Mô Tả";
        }
        if(empty($ngay_nhap)){
            $errors["ngay_nhap"] = "Vui Lòng Chọn Ngày Nhập";
        }


        // Thêm dữ liệu
        if(empty($errors)){
            // nếu không co lỗi thì thêm dữ liệu
            // thêm vào csdl
            $this->modelSanPham->createSanPham($ten_san_pham,$danh_muc_id,$tac_gia,$gia_ban,$gia_khuyen_mai,$so_luong,$ngay_nhap,$mo_ta,$trang_thai);
            unset($_SESSION['errors']);

            header("Location: ?act=san-phams");
            exit();
        }else{
            // nếu có lỗi thì nhập lại
            $_SESSION['errors'] = $errors;
            header("Location: ?act=form-them-san-pham");
            exit();
        }
    }

    // ham hien thi form sua
    public function edit(){
        // lấy id
        $id = $_GET['san_pham_id'];

        // Lây thông tin chi tiết cảu danh mục
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $sanPham = $this->modelSanPham->getDetailData($id);
        // echo $danhMuc["tenDanhMuc"];
        require_once "./views/sanpham/edit_san_pham.php";
    }

//     //ham xu ly form sua
    public function postedit(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST["id"];
            $ten_san_pham = $_POST["ten_san_pham"];
            $danh_muc_id = $_POST["danh_muc_id"];
            $tac_gia = $_POST["tac_gia"];
            $gia_ban = $_POST["gia_ban"];
            $gia_khuyen_mai = $_POST["gia_khuyen_mai"];
            $so_luong = $_POST["so_luong"];
            $ngay_nhap = $_POST["ngay_nhap"];
            $mo_ta = $_POST["mo_ta"];
            $trang_thai = $_POST["trang_thai"];
            
        }

        // varlidate
        $errors = [];
        if(empty($ten_san_pham)){
            $errors["ten_san_pham"] = "Vui Lòng Nhập Tên Sản Phẩm";
        }
        if(empty($tac_gia)){
            $errors["tac_gia"] = "Vui Lòng Nhập Tên Tác Giả";
        }
        if(empty($gia_ban)){
            $errors["gia_ban"] = "Vui Lòng Nhập Giá Bán";
        }
        if(empty($so_luong)){
            $errors["so_luong"] = "Vui Lòng Nhập Số Lượng";
        }
        if(empty($mo_ta)){
            $errors["mo_ta"] = "Vui Lòng Nhập Mô Tả";
        }
        if(empty($ngay_nhap)){
            $errors["ngay_nhap"] = "Vui Lòng Chọn Ngày Nhập";
        }


        // Thêm dữ liệu
        if(!empty($errors)){
            // nếu không co lỗi thì sửa dữ liệu
            // thêm vào csdl
            // nếu có lỗi thì nhập lại
            $_SESSION['errors'] = $errors;
            header("Location:?act=form-sua-san-pham");
            exit();
        }else{
            $this->modelSanPham->editSanPham($id,$ten_san_pham,$danh_muc_id,$tac_gia,$gia_ban,$gia_khuyen_mai,$so_luong,$ngay_nhap,$mo_ta,$trang_thai);
            unset($_SESSION['errors']);
            header("Location:?act=san-phams");
            exit();
        }
    }

    // ham xoa danh muc trong csdl
    public function destroy(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST["san_pham_id"];
            // xóa danh mục
            $this->modelSanPham->deleteSanPham($id);
            header("Location: ?act=san-phams");
            exit();

        }
    }

}







?>