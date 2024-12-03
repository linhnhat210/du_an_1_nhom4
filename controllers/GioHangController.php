<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 
class GioHangController {
    public $modelGioHang;
    public $modelNguoiDung;
    public $modelDonHang;
    public $modelSanPham;
    public function __construct(){
        $this->modelGioHang = new GioHang();
        $this->modelNguoiDung = new NguoiDungs();
        $this->modelDonHang = new DonHang();
        $this->modelSanPham = new SanPhams();
    }

    
    public function addGioHang()
    {
        // Kiểm tra nếu là yêu cầu POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Kiểm tra nếu người dùng đã đăng nhập
            if (isset($_SESSION['user_client'])) {
                $userId = $_SESSION['user_client']['id'];

    
                // Lấy thông tin tài khoản từ ID người dùng
                $userAccount = $this->modelNguoiDung->getTaiKhoanFromEmail($userId);
                if (!$userAccount || !isset($userAccount['id'])) {
                    echo '<script>alert("Không tìm thấy tài khoản. Vui lòng thử lại.");</script>';
                    die;
                }
    
                // Lấy thông tin giỏ hàng
                $gioHang = $this->modelGioHang->getGioHangFromId($userAccount['id']);
                if (!$gioHang) {
                    // Nếu giỏ hàng chưa tồn tại, tạo mới
                    $gioHangId = $this->modelGioHang->addGioHang($userAccount['id']);
                    $gioHang = ['id' => $gioHangId];
                }
                // var_dump($gioHang); die;
               
    
                // Lấy chi tiết giỏ hàng
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']) ?: [];
                
                
                
              
    
                // Lấy dữ liệu sản phẩm từ POST
                $san_pham_id = isset($_POST['san_pham_id']) ? intval($_POST['san_pham_id']) : 0;
                $chiTietGioHangCuaSanPham = $this->modelGioHang->getDetailSanPhamGioHang($san_pham_id,$gioHang['id']) ?: [];
                $so_luong = isset($_POST['so_luong']) ? intval($_POST['so_luong']) : 0;
             
                // Lấy số lượng sản phẩm hiện có trong kho từ cơ sở dữ liệu

                $so_luong_kho = $this->modelSanPham->getSoLuongSanPham($san_pham_id);

                // Kiểm tra dữ liệu sản phẩm hợp lệ
                if ($san_pham_id <= 0 || $so_luong <= 0) {
                    echo '<script>alert("Dữ liệu không hợp lệ. Vui lòng thử lại.");;
                    window.location.href = "' . BASE_URL . '?act=gio-hang";
                    </script>';
                    die;
                }
                elseif ($so_luong + $chiTietGioHangCuaSanPham["so_luong"] > $so_luong_kho ) {
                    // Nếu số lượng đặt lớn hơn số lượng trong kho
                    echo '<script>
                    alert("Số lượng sản phẩm không đủ hàng hoặc đã hết hàng. Vui lòng chọn số lượng nhỏ hơn.");
                    window.location.href = "' . BASE_URL . '?act=gio-hang";
                </script>';
                    
                    die;
                }

                // var_dump($so_luong); die;
    
                // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
                $productExists = false;
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] === $san_pham_id) {
                        // Cập nhật số lượng sản phẩm nếu đã tồn tại
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $productExists = true;
                        break;
                    }
                }
    
                // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
                if (!$productExists) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }
    
                // Chuyển hướng về trang giỏ hàng
                header("Location: " . BASE_URL . '?act=gio-hang');
            } else {
                // Thông báo nếu chưa đăng nhập
                echo '<script>
                    alert("Bạn chưa đăng nhập. Vui lòng đăng nhập để tiếp tục.");
                     window.location.href = "' . BASE_URL . '?act=login";
                </script>';
                
            }
        }
    }
    

    public function gioHang()
    {
        if (isset($_SESSION['user_client'])) {
            $id = $_SESSION['user_client']["id"];
            // var_dump($id);
            $mail = $this->modelNguoiDung->getTaiKhoanFromEmail($id);

            // Lấy dữ liệu giỏ hàng của người dùng
            // var_dump($mail['id']);die;
            $gioHang = $this->modelGioHang->getGioHangFromId($mail['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            // var_dump($chiTietGioHang);die;

            require_once './views/giohang/gio_hang.php';
        } else {
            header("Location: " . BASE_URL . '?act=login');
        }
    }

    public function DeleteSpGioHang()
    {
        $id = $_GET['id_san_pham_gio_hang'];
        $gioHang = $this->modelGioHang->getDetailGioHang($id);

        // var_dump($id); die;

        if (!$gioHang) {
            $this->modelGioHang->destroySpGioHang($id);
        }

        header("Location: ?act=gio-hang");
        exit();
    }
    public function thanhToan()
    {
        if (isset($_SESSION['user_client'])) {
            $userId = $_SESSION['user_client']['id'];
    
            // Lấy thông tin tài khoản từ ID người dùng
            $userAccount = $this->modelNguoiDung->getTaiKhoanFromEmail($userId);
           

            // Lấy dữ liệu giỏ hàng của người dùng
            // var_dump($mail['id']);die;
            $gioHang = $this->modelGioHang->getGioHangFromId($userAccount['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($userAccount['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            // var_dump($chiTietGioHang);die;
            
            require_once './views/giohang/thanh_toan.php';
            unset($_SESSION["errors"]);
        } else {
            // Thông báo nếu chưa đăng nhập
            echo '<script>
            alert("Bạn chưa đăng nhập. Vui lòng đăng nhập để tiếp tục.");
        </script>';
        header("Location: " . BASE_URL . '?act=login');
            die;
        }
    }
        public function thanhToanKhuyenMai(){

            $ma_khuyen_mai = $_POST["khuyen_mai"];
            $khuyen_mai = $this->modelGioHang->getKhuyenMai($ma_khuyen_mai);
            
            if(empty($khuyen_mai)){
                $_SESSION["errors"] = "Mã khuyến mãi sai, vui lòng nhập lại";
                header("Location: " . BASE_URL . '?act=thanh-toan');
            }elseif($khuyen_mai["trang_thai"] == 1){
                  $_SESSION["errors"] = "Mã khuyến mãi chưa có hiệu lực, vui lòng dùng lại sau";
                header("Location: " . BASE_URL . '?act=thanh-toan');
            }
            elseif($khuyen_mai["trang_thai"] == 3){
                  $_SESSION["errors"] = "Mã khuyến mãi hết hiệu lực, vui lòng nhập mã mới";
                header("Location: " . BASE_URL . '?act=thanh-toan');
            }if(empty($ma_khuyen_mai)){
                $_SESSION["errors"] = "Vui lòng nhập mã khuyến mãi";
                header("Location: " . BASE_URL . '?act=thanh-toan');
            }
            





            if (isset($_SESSION['user_client'])) {
            $userId = $_SESSION['user_client']['id'];
    
            // Lấy thông tin tài khoản từ ID người dùng
            $userAccount = $this->modelNguoiDung->getTaiKhoanFromEmail($userId);
           

            // Lấy dữ liệu giỏ hàng của người dùng
            // var_dump($mail['id']);die;
            $gioHang = $this->modelGioHang->getGioHangFromId($userAccount['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($userAccount['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            // var_dump($chiTietGioHang);die;

            require_once './views/giohang/thanh_toan.php';
        } else {
            // Thông báo nếu chưa đăng nhập
            echo '<script>
            alert("Bạn chưa đăng nhập. Vui lòng đăng nhập để tiếp tục.");
        </script>';
        header("Location: " . BASE_URL . '?act=login');
            die;
        }
    }
    public function postThanhToan()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            // Lấy ra dữ liệu từ form
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'] ?? ''; // Ghi chú có thể không bắt buộc
            $tong_tien_hang = $_POST['don_gia'] ?? 0;
            $giam_gia = $_POST['giam_gia'] ?? 0;
            $tong_don_hang = $_POST['thanh_tien'] ?? 0;
            
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];
            

            // Thông tin mặc định
            $ngay_dat = date("Y-m-d H:i:s"); // Kết quả: 2024-11-25 12:45:30 (ví dụ)

            $trang_thai_id = 1; // Mặc định trạng thái đơn hàng là "đang xử lý"

           
            $userId = $_SESSION['user_client']['id'];
    
            // Lấy thông tin tài khoản từ ID người dùng
            $userAccount = $this->modelNguoiDung->getTaiKhoanFromEmail($userId);
            if (!$userAccount) {
                echo '<script>
                    alert("Không tìm thấy tài khoản. Vui lòng thử lại.");
                </script>';
                die();
            }
            $nguoi_dung_id = $userAccount['id'];
            
            $san_pham_ids = $_POST["san_pham_id"];
            $so_luongs = $_POST['so_luong'];
            $gia_san_phams = $_POST['gia_san_pham'];

            
            // Tạo mã đơn hàng
            $ma_don_hang = 'DH' . rand(1000, 9999);


            $gio_hang_id = $this->modelGioHang->getGioHangFromId($nguoi_dung_id);
         
            
            for ($i = 0; $i < count($san_pham_ids); $i++) {
            $san_pham_id = $san_pham_ids[$i];
            $spTrongGio[$i] = $this->modelGioHang->getDetailSanPhamGioHang($san_pham_id, $gio_hang_id['id']);
            $so_luong_kho[$i] = $this->modelSanPham->getSoLuongSanPham($san_pham_id);



            if ($spTrongGio[$i]["so_luong"] > $so_luong_kho[$i]) {
            echo '<script>
            alert("' . $spTrongGio[$i]["ten_san_pham"] . ' đã hết hàng, vui lòng chọn sản phẩm khác");
            window.location.href = "' . BASE_URL . '?act=gio-hang";
            </script>';
            die;
        }
    }
     
            
            

            // Thêm thông tin vào cơ sở dữ liệu
            $don_hang_id = $this->modelDonHang->adDonHang( $ma_don_hang,
                $nguoi_dung_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $phuong_thuc_thanh_toan_id,
                $tong_tien_hang,
                $giam_gia,
                $tong_don_hang,
                $ngay_dat,
                $trang_thai_id);

            $this->modelDonHang->addChiTietDonHang($don_hang_id,$san_pham_ids,$so_luongs,$gia_san_phams);


            
            
            // trừ số lượng sau khi đặt thành công
            for ($i = 0; $i < count($san_pham_ids); $i++) {
                $san_pham_id = $san_pham_ids[$i];
                $spTrongGio[$i] = $this->modelGioHang->getDetailSanPhamGioHang($san_pham_id, $gio_hang_id['id']);
                $so_luong_kho[$i] = $this->modelSanPham->getSoLuongSanPham($san_pham_id);
                $so_luong_moi = $so_luong_kho[$i] - $spTrongGio[$i]['so_luong'];
    
            $this->modelSanPham->updateSoLuong($san_pham_id,$so_luong_moi);
            
            
            
        }
        // Xóa giỏ hàng sau khi đặt hàng thành công
        $this->modelGioHang->clearCart($nguoi_dung_id);
        
 $email_nguoi_nhan = $this->modelDonHang->getEmailNguoiNhan($don_hang_id)['email_nguoi_nhan'] ?? null;;
            // var_dump($email_nguoi_nhan);
            // exit;
                $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'vanvan56329@gmail.com';                     //SMTP username
                $mail->Password   = 'mirl eyld eutu hzvv';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                
                $mail->setFrom('vanvan56329@gmail.com', 'Hệ Thống Đặt Hàng');
                $mail->addAddress($email_nguoi_nhan); // Gửi đến email người nhận
                

                    $title = 'Mail xác nhận đặt hàng';
                    $content = 'Bạn vừa đặt 1 đơn hàng' . $ma_don_hang;

                
                
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $title;
                $mail->Body    = $content;
            
            
                $mail->send();
                // Thông báo thành công và chuyển hướng về trang chủ

                header("Location: " . BASE_URL."?act=thong-bao&id_don_hang=" . $don_hang_id  );
                die();
                echo 'Gửi mail thành công';
            } catch (Exception $e) {
                echo "Gửi mail thất bại. Mailer Error: {$mail->ErrorInfo}";
            }

        } catch (Exception $e) {
            // Xử lý lỗi nếu xảy ra vấn đề trong quá trình xử lý
            echo '<script>
                alert("Đã xảy ra lỗi khi đặt hàng: ' . $e->getMessage() . '");
                
            </script>';
            header("Location: " . BASE_URL);
            die();
        }
    } else {
        // Nếu không phải POST request
        echo '<script>
            alert("Yêu cầu không hợp lệ. Vui lòng thử lại.");
            
        </script>';
        header("Location: ?act=gio-hang");
        die();
    }
}











public function thongBao(){
    $don_hang_id = $_GET["id_don_hang"] ?? 0;
    $don_hang = $this->modelDonHang->getDonHang($don_hang_id);

    
    require_once "views/giohang/thong_bao.php";
}
public function demSoSP($id){
    $soLuongSP = $this->modelGioHang->demSoSP($id);
    return $soLuongSP;
}



}
