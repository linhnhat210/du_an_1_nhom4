<?php
// Kết nối trực tiếp đến cơ sở dữ liệu
try {
    $dsn = 'mysql:host=localhost;dbname=du_an_1;charset=utf8'; // Thay 'ten_csdl' bằng tên cơ sở dữ liệu của bạn
    $username = 'root'; // Thay 'root' bằng tên người dùng MySQL của bạn
    $password = ''; // Thay '' bằng mật khẩu MySQL của bạn
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage());
}

// Lấy ID từ URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Kiểm tra ID hợp lệ
if ($id <= 0) {
    echo "Tin tức không hợp lệ.";
    exit;
}

// Truy vấn chi tiết tin tức từ database
$query = "SELECT * FROM tin_tucs WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$tinTuc = $stmt->fetch(PDO::FETCH_ASSOC);

// Kiểm tra xem tin tức có tồn tại không
if (!$tinTuc) {
    echo "Không tìm thấy tin tức.";
    exit;
}
?>

<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Chi tiết tin tức</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
</head>

<body>
    

    <div class="container mt-4">
        <h1><?php echo htmlspecialchars($tinTuc['tieu_de']); ?></h1>
        <img src="uploads/<?php echo htmlspecialchars($tinTuc['hinh_anh']); ?>" alt="Hình ảnh tin tức" class="img-fluid" />
        <div>
            <p><?php echo nl2br(htmlspecialchars($tinTuc['noi_dung'])); ?></p>
        </div>
    </div>

    <?php require_once "./views/layout/footer.php"; ?>

    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
</body>

</html>
