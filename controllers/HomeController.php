<?php 

class HomeController
{
    public $modelSanPham; 

    public function __construct()
    {
        $this->modelSanPham = new SanPhams();
    }

    public function index()
    {
        require_once "./views/home.php";
    }

    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }

    public function loadMoreProducts()
    {
        // Lấy dữ liệu từ yêu cầu AJAX
        $jsonInput = file_get_contents('php://input');
        $data = json_decode($jsonInput, true);

        $offset = isset($data['offset']) ? (int)$data['offset'] : 0;
        $limit = isset($data['limit']) ? (int)$data['limit'] : 4;

        // Gọi model để lấy thêm sản phẩm
        $products = $this->modelSanPham->getSanPhamWithPagination($offset, $limit);

        // Chuẩn bị dữ liệu phản hồi
        $response = [];
        if (!empty($products)) {
            $response['success'] = true;
            $response['products'] = array_map(function ($product) {
                return [
                    'id' => $product['id'],
                    'name' => $product['ten_san_pham'],
                    'imageUrl' => BASE_URL . $product['hinh_anh'],
                    'detailUrl' => BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $product['id'],
                    'originalPrice' => number_format($product['gia_ban'], 0, ',', '.') . 'đ',
                    'discountPrice' => $product['gia_khuyen_mai'] ? number_format($product['gia_khuyen_mai'], 0, ',', '.') . 'đ' : null,
                ];
            }, $products);
        } else {
            $response['success'] = false;
        }

        // Trả phản hồi dưới dạng JSON
        echo json_encode($response);
    }
}