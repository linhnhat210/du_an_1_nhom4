<?php

class BannerController
{

    public $modelBanner;

    public function __construct()
    {
        $this->modelBanner = new Banner();
    }

    // hàm hiển thị danh sách 
    public function index()
    {
        // lấy dữ liệu người dùng
        $Banners = $this->modelBanner->getAllBanner();
        require_once "./views/banners/listbanner.php";
    }
    public function create(){

        require_once "./views/banners/add_banner.php";
        deleteSessionError();
    }

    // ham xu ly form them 
    public function postcreate(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // var_dump($_POST);die;
            $ten_banner = $_POST["ten_banner"] ?? '';


            $hinh_anh = $_FILES["hinh_anh"] ?? NULL;
            // var_dump($hinh_anh);die;

            $file_thumb = uploadFile($hinh_anh,'./uploads/');




            
            // var_dump($trangThai);


        }

        // varlidate
        $errors = [];
        if(empty($ten_banner)){
            $errors["ten_banner"] = "Vui Lòng Nhập Tên Sản Phẩm";
        }
        
        $_SESSION['errors']=$errors;


        // Thêm dữ liệu
        if(empty($errors)){
            // nếu không co lỗi thì thêm dữ liệu
            // thêm vào csdl    
            // var_dump($file_thumb);die;
            $this->modelBanner->createBanner($ten_banner,$file_thumb);
            
            unset($_SESSION['errors']);

            header("Location: ?act=banners");
            exit();
        }else{
            // nếu có lỗi thì nhập lại
            $_SESSION['flash'] = true;
            header("Location: ?act=form-them-banners");
            exit();
        }
    }


   
}

?>
