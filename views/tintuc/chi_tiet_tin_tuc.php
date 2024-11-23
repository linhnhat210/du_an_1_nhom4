<?php
// Kết nối trực tiếp đến cơ sở dữ liệu
try {
    $dsn = 'mysql:host=localhost;dbname=du_an_1;charset=utf8';
    $username = 'root';
    $password = '';
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage());
}

// Lấy ID từ URL và xác thực
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id || $id <= 0) {
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
    <title>Chi tiết tin tức - <?= htmlspecialchars($tinTuc['tieu_de']) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .news-detail-section {
            margin-top: 40px;
        }
        .news-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .news-header h1 {
            font-size: 2.8rem;
            color: #333;
        }
        .news-header img {
            max-height: 400px;
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .news-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
        }
        .back-link {
            margin-top: 20px;
            display: inline-block;
            color: #007bff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php require_once "./views/layout/header.php"; ?>

    <!-- Nội dung chi tiết tin tức -->
    <div class="container news-detail-section">
        <div class="news-header">
            <h1><?= htmlspecialchars($tinTuc['tieu_de']); ?></h1>
            <img src="<?= 'uploads/' . htmlspecialchars($tinTuc['hinh_anh']); ?>" 
                 alt="Hình ảnh tin tức" 
                 class="img-fluid">
        </div>
        <div class="news-content">
            <p><?= nl2br(htmlspecialchars($tinTuc['noi_dung'])); ?></p>
        </div>
    </div>

    <!-- Footer -->
    <?php require_once "./views/layout/footer.php"; ?>

    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
</body>

</html>
