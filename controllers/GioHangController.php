<?php 
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
               
    
                // Lấy chi tiết giỏ hàng
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']) ?: [];
                
              
    
                // Lấy dữ liệu sản phẩm từ POST
                $san_pham_id = isset($_POST['san_pham_id']) ? intval($_POST['san_pham_id']) : 0;
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
                elseif ($so_luong > $so_luong_kho) {
                    // Nếu số lượng đặt lớn hơn số lượng trong kho
                    echo '<script>
                    alert("Số lượng sản phẩm không đủ hàng hoặc đã hết hàng. Vui lòng chọn số lượng nhỏ hơn.");
                    window.location.href = "' . BASE_URL . '?act=gio-hang";
                </script>';
                    
                    die;
                }
    
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
                </script>';
                header("Location: " . BASE_URL);
                die;
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
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

            // Thông tin mặc định
            $ngay_dat = date('Y-m-d');
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
            // var_dump($nguoi_dung_id);die;

            // Tạo mã đơn hàng
            $ma_don_hang = 'DH' . rand(1000, 9999);

            // Thêm thông tin vào cơ sở dữ liệu
            $this->modelDonHang->adDonHang(
                $nguoi_dung_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $ma_don_hang,
                $trang_thai_id
            );

            // Xóa giỏ hàng sau khi đặt hàng thành công
            $this->modelGioHang->clearCart($nguoi_dung_id);

            // Thông báo thành công và chuyển hướng về trang chủ
            echo '<script>
                alert("Đơn hàng của bạn đã được đặt thành công!");
                
            </script>';
            // header("Location: " . BASE_URL );
            die();

        } catch (Exception $e) {
            // Xử lý lỗi nếu xảy ra vấn đề trong quá trình xử lý
            echo '<script>
                alert("Đã xảy ra lỗi khi đặt hàng: ' . $e->getMessage() . '");
                
            </script>';
            // header("Location: " . BASE_URL );
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




    // public function postThanhToan()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // var_dump($_POST);die;

    //         // Lấy ra dữ liệu
    //         $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
    //         $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
    //         $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
    //         $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
    //         $ghi_chu = $_POST['ghi_chu'];
    //         $tong_tien = $_POST['tong_tien'];
    //         $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

    //         $ngay_dat = date('Y-m-d');
    //         $trang_thai_id = 1;

    //         $user = $this->modelNguoiDung->getTaiKhoanFromEmail($_SESSION['user_client']);
    //         $nguoi_dung_id = $user['id'];

    //         $ma_don_hang = 'DH' . rand(1000,9999);

    //         // Thêm thông tin vào db
    //         $this->modelDonHang->adDonHang(
    //             $nguoi_dung_id,
    //             $ten_nguoi_nhan,
    //             $email_nguoi_nhan,
    //             $sdt_nguoi_nhan,
    //             $dia_chi_nguoi_nhan,
    //             $ghi_chu,
    //             $tong_tien,
    //             $phuong_thuc_thanh_toan_id,
    //             $ngay_dat,
    //             $ma_don_hang,
    //             $trang_thai_id
    //         );
    //         // Thông báo nếu chưa đăng nhập
    //         echo '<script>
    //         alert("Đã thêm đơn hàng thành công");
    //     </script>';
    //        die;
    //     }else{
            
    //     }
    // }
}