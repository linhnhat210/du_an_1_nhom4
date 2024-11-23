<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Danh sách tin tức</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css">
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="assets/css/plugins/jqueryui.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .news-section {
            margin-top: 40px;
        }

        .news-header h1 {
            font-size: 2.8rem;
            margin-bottom: 10px;
            color: #333;
            font-weight: bold;
        }

        .news-header p {
            color: #555;
            font-style: italic;
        }

        .news-list {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: space-between;
        }

        .news-item {
            flex: 1 1 calc(33.333% - 30px);
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease, z-index 0s ease;
        }

        .news-item:hover {
            transform: scale(1.05); /* Phóng to */
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2); /* Tăng bóng đổ */
            border: 1px solid #007bff; /* Thêm viền màu khi hover */
            z-index: 10; /* Đảm bảo mục tin tức được đưa lên trên khi hover */
        }

        .news-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .news-content {
            padding: 20px;
            text-align: center;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .news-content h5 {
            margin: 15px 0;
            font-size: 1.6rem;
            color: #007bff;
            font-weight: 600;
        }

        .news-content h5:hover {
            text-decoration: underline;
        }

        .news-content p {
            color: #555;
            font-size: 1rem;
        }

        .news-content .btn-primary {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .news-content .btn-primary:hover {
            background-color: #0056b3;
            cursor: pointer;
        }

        .news-item a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <!-- Start Header Area -->
    <?php require_once "./views/layout/header.php"; ?>

    <!-- Start News Section -->
    <div class="container news-section">
        <div class="news-header text-center">
            <h1>Danh sách tin tức</h1>
            <p>Xem những bài viết mới nhất từ chúng tôi</p>
        </div>
        <?php if (empty($tinTucs)): ?>
            <div class="alert alert-warning text-center">
                Không có tin tức nào để hiển thị.
            </div>
        <?php else: ?>
            <div class="news-list">
                <?php foreach ($tinTucs as $tinTuc): ?>
                    <div class="news-item">
                        <a href="?act=chi-tiet-tin-tuc&id=<?= $tinTuc['id'] ?>">
                            <img src="<?= BASE_URL . 'uploads/' . $tinTuc['hinh_anh'] ?>" alt="Hình ảnh tin tức">
                        </a>
                        <div class="news-content">
                            <h5>
                                <a href="?act=chi-tiet-tin-tuc&id=<?= $tinTuc['id'] ?>"><?= htmlspecialchars($tinTuc['tieu_de']) ?></a>
                            </h5>
                            <p class="text-truncate"><?= nl2br(htmlspecialchars(substr($tinTuc['noi_dung'], 0, 100))) ?>...</p>
                            <a href="?act=chi-tiet-tin-tuc&id=<?= $tinTuc['id'] ?>" class="btn btn-primary">Xem thêm</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php require_once "./views/layout/footer.php"; ?>

    <!-- JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins/slick.min.js"></script>
    <script src="assets/js/plugins/countdown.min.js"></script>
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <script src="assets/js/plugins/jqueryui.min.js"></script>
    <script src="assets/js/plugins/image-zoom.min.js"></script>
    <script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/plugins/ajaxchimp.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <script src="assets/js/plugins/google-map.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
