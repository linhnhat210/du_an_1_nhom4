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
    public function search()
     {
         // lấy dữ liệu từ yêu cầu (request)
         if($_SERVER["REQUEST_METHOD"] == "POST"){
             $keyword = $_POST['keyword'];
             $KhuyenMaimodel = new KhuyenMai();
             $khuyenMais = $KhuyenMaimodel->searchKhuyenMai($keyword);
 
             // var_dump($trangThai);
         }
 
         
         $this->modelKhuyenMai->searchKhuyenMai($keyword);
 
         // hiển thị kết quả tìm kiếm
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
        if($giam_phan_tram >= 100){
            $errors["giam_phan_tram"] = "Giá trị của mã phải bé hơn 100%";
        }
        if(empty($giam_toi_da)){
            $errors["giam_toi_da"] = "Vui Lòng Nhập Giảm Tối Đa";
        }
        if(empty($ngay_bat_dau)){
            $errors["ngay_bat_dau"] = "Vui Lòng Chọn Ngày Bắt Đầu";
        }
        if($ngay_bat_dau < $today ){
            $errors["ngay_bat_dau"] = "Ngày Bắt Đầu Phải Lớn Hơn Ngày Hôm Nay";
        }
        
        if(empty($ngay_ket_thuc)){
            $errors["ngay_bat_dau"] = "Vui Lòng Chọn Ngày Kết Thúc";
        }
        if($ngay_bat_dau > $ngay_ket_thuc ){
            $errors["ngay_bat_dau"] = "Ngày Kết Thúc Phải Lớn Hơn Ngày Bắt Đầu";
            $errors["ngay_ket_thuc"] = "Ngày Kết Thúc Phải Lớn Hơn Ngày Bắt Đầu";
        }
        if($ngay_bat_dau > $today){
            $trang_thai = 1 ; 
        }
        $_SESSION['errors']=$errors;


        // Thêm dữ liệu
        if(empty($errors)){
            // nếu không co lỗi thì thêm dữ liệu
            // thêm vào csdl
            $this->modelKhuyenMai->createKhuyenMai($ma_khuyen_mai,$giam_phan_tram, $giam_toi_da, $ngay_bat_dau, $ngay_ket_thuc,$trang_thai);
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
        deleteSessionError();

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

            $today = date("Y-m-d");
        
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
        if($giam_phan_tram >= 100){
            $errors["giam_phan_tram"] = "Giá trị của mã phải bé hơn 100%";
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
        if($ngay_bat_dau > $ngay_ket_thuc ){
            $errors["ngay_bat_dau"] = "Ngày Kết Thúc Phải Lớn Hơn Ngày Bắt Đầu";
            $errors["ngay_ket_thuc"] = "Ngày Kết Thúc Phải Lớn Hơn Ngày Bắt Đầu";
        }

        if($ngay_bat_dau > $today){
            $trang_thai = 1 ; 
        } elseif($ngay_bat_dau < $today && $today < $ngay_ket_thuc){
            $trang_thai = 2 ;
        }else{
            $trang_thai = 3 ;
        }


        // Thêm dữ liệu
        if(empty($errors)){
            // nếu không co lỗi thì thêm dữ liệu
            // thêm vào csdl
            $this->modelKhuyenMai->updateKhuyenMai($id, $ma_khuyen_mai,$giam_phan_tram, $giam_toi_da, $ngay_bat_dau, $ngay_ket_thuc,$trang_thai);
            unset($_SESSION['errors']);
            header("Location: ?act=khuyen-mais");
            exit();
        }else{
            // nếu có lỗi thì nhập lại
            $_SESSION['errors'] = $errors;
            $_SESSION['flash'] = true;
            header("Location: ?act=form-sua-khuyen-mai&khuyen_mai_id=$id");
            // unset($_SESSION['errors']);
            exit();
        }
        
    }

    public function destroy() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST["khuyen_mai_id"];
        // xóa danh mục
        $this->modelKhuyenMai->deleteKhuyenMai($id);
        header("Location: ?act=khuyen_mais");
        exit();
            
        }
        
    }
    public function editTrangThai(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST["khuyen_mai_id"];
        // var_dump($id);die;
        $ngay_bat_dau = $_POST["ngay_bat_dau"];
        $ngay_ket_thuc = $_POST["ngay_ket_thuc"];
        $today = date("Y-m-d");
        if($ngay_bat_dau > $today){
            $trang_thai = 1 ; 
        } elseif($ngay_bat_dau < $today && $today < $ngay_ket_thuc){
            $trang_thai = 2 ;
        }else{
            $trang_thai = 3 ;
        }
        // var_dump($trang_thai);die;
        $this->modelKhuyenMai->editKhuyenMai($id,$trang_thai);
        header("Location: ?act=khuyen-mais");
        exit();
        }


    }
}
?>
