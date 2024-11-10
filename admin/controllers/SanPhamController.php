
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
    // serach
    public function search()
    {
        // lấy dữ liệu từ yêu cầu (request)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $keyword = $_POST['keyword'];
            $sanPhamModel = new SanPham();
            $sanPhams = $sanPhamModel->searchSanPham($keyword);

            // var_dump($trangThai);
        }

        // tìm kiếm danh mục liên hệ
        $this->modelSanPham->searchSanPham($keyword);

        // hiển thị kết quả tìm kiếm
        require_once "./views/sanpham/list_san_pham.php";
    }
        

    // ham hien thi form them
    public function create(){

        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once "./views/sanpham/add_san_pham.php";
        deleteSessionError();
    }

    // ham xu ly form them 
    public function postcreate(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $ten_san_pham = $_POST["ten_san_pham"] ?? '';
            $danh_muc_id = $_POST["danh_muc_id"] ?? '';
            $tac_gia = $_POST["tac_gia"] ?? '';
            $gia_ban = $_POST["gia_ban"] ?? '';
            $gia_khuyen_mai = $_POST["gia_khuyen_mai"] ?? '';
            $so_luong = $_POST["so_luong"] ?? '';
            $ngay_nhap = $_POST["ngay_nhap"] ?? '';
            $mo_ta = $_POST["mo_ta"];
            $trang_thai = $_POST["trang_thai"] ?? '';

            $hinh_anh = $_FILES["hinh_anh"] ?? NULL;

            $file_thumb = uploadFile($hinh_anh,'./uploads/');


            $img_array = $_FILES["img_array"];




            
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
        $_SESSION['errors']=$errors;


        // Thêm dữ liệu
        if(empty($errors)){
            // nếu không co lỗi thì thêm dữ liệu
            // thêm vào csdl
            $san_pham_id = $this->modelSanPham->createSanPham($ten_san_pham,$danh_muc_id,$tac_gia,$gia_ban,$gia_khuyen_mai,$so_luong,$ngay_nhap,$mo_ta,$trang_thai,$file_thumb);
            if(!empty($img_array['name'])){
                
                foreach ($img_array['name'] as $key => $value){
                    $file = [
                    'name' => $img_array['name'][$key],
                    'type' => $img_array['type'][$key],
                    'tmp_name' => $img_array['tmp_name'][$key],
                    'error' => $img_array['error'][$key],
                    'size' => $img_array['size'][$key]
                    ];
                    $link_hinh_anh = uploadFile($file,'./uploads/');
                    $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id,$link_hinh_anh);
                }
                
            }
            unset($_SESSION['errors']);

            header("Location: ?act=san-phams");
            exit();
        }else{
            // nếu có lỗi thì nhập lại
            $_SESSION['flash'] = true;
            header("Location: ?act=form-them-san-pham");
            exit();
        }
    }

    // ham hien thi form sua
    public function edit(){
        // lấy id
        $id = $_GET['san_pham_id'];

        // Lây thông tin chi tiết cảu danh mục
        $sanPham = $this->modelSanPham->getDetailData($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $listSanPham = $this->modelSanPham->getListAnhSanPham($id);
        // echo $danhMuc["tenDanhMuc"];
        // var_dump($sanPham);die;
        require_once "./views/sanpham/edit_san_pham.php";
        deleteSessionError();
    }

    public function postedit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);die();
            // Lấy ra dl
            // Lấy ra dữ liệu của sản phẩm
            $id = $_POST['id'] ?? '';
            // Truy vấn 
            // $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            // $old_file = $sanPhamOld['hinh_anh']; // Lấy ảnh cũ để phục vụ cho sửa ảnh

            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_ban = $_POST['gia_ban'] ?? '';
            $gia_khuyen_mai = isset($_POST['gia_khuyen_mai']) && $_POST['gia_khuyen_mai'] !== '' ? $_POST['gia_khuyen_mai'] : null;
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $id = $_POST["id"];


            $tac_gia = $_POST["tac_gia"];
  



            $mo_ta = $_POST["mo_ta"];

            // Đặt giá trị mặc định cho các trường
            $danh_muc_id =  $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            $mo_ta = $_POST['mo_ta'];

            // $hinh_anh = $_FILES['hinh_anh'] ?? null;

            // Tạo 1 mảng trống để chứa dl
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($tac_gia)) {
                $errors['tac_gia'] = 'Tên tasc giar không được để trống';
            }
            if (empty($gia_ban)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Vui lòng chọn danh mục sản phẩm';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái sản phẩm';
            }

            $_SESSION['errors'] = $errors;

            // Logic sửa ảnh
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                // upload file ảnh mới lên
                $new_file = uploadFile($hinh_anh, '../uploads/');
                if (!empty($old_file)) { // Nếu có ảnh cũ thì xóa đi
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }

            // Nếu k có lỗi thì sửa sản phẩm
            if (empty($errors)) {
                $this->modelSanPham->editSanPham($id,$ten_san_pham,$danh_muc_id,$tac_gia,$gia_ban,$gia_khuyen_mai,$so_luong,$ngay_nhap,$mo_ta,$trang_thai);
                // Tạo thông báo xóa thành công
                $_SESSION['messInfo'] = 'Sửa sản phẩm thành công!';
                header("Location: ?act=san-phams");
                exit();
            } else {
                // trả lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("Location:   ?act=form-sua-san-pham&san_pham_id=$id");
                exit();
            }
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