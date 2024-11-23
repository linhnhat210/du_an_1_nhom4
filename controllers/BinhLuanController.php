<?php 

class BinhLuanController
{

    public $modelBinhLuan;


    


    public function __construct(){
        $this->modelBinhLuan = new BinhLuan();

    }

    public function postBinhLuan(){
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // var_dump($_POST);die;
        // Kiểm tra nếu user chưa đăng nhập
        $noi_dung = $_POST['noi_dung'];
        $san_pham_id = $_POST['san_pham_id'];
        if (!isset($_SESSION['user_client'])) {
        echo '<script>alert("Bạn cần đăng nhập để bình luận!"); window.location.href="?act=login";</script>';
        exit();
    }
    }
     $this->modelBinhLuan->dangBinhLuan($noi_dung,$_SESSION['user_client']['id'],$san_pham_id);
     
    //   echo '<script>alert("Đăng bình luận thành công!")</script>';
     header("Location:" .BASE_URL ."?act=chi-tiet-san-pham&id_san_pham=" . $san_pham_id);
     exit();
    
    


}
}


?>