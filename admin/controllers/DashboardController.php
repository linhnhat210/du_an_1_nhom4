<?php

class DashboardController {

    public $modelDashboard;

    public function __construct()
    {
        $this->modelDashboard = new Dashboard();
    }

    public function index() {
        $tongThuNhap = $this->modelDashboard->layTongThuNhapHomNay();
        $soLuongDonHangHomNay = $this->modelDashboard->demSoLuongDonHangHomNay();
        $soLuongKhachHang = $this->modelDashboard->demSoLuongKhachHang();
        
        require_once "./views/dashboard.php";

    }






}