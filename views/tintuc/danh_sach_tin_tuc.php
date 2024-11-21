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
</head>

<body>
    <!-- Start Header Area -->
    <?php require_once "./views/layout/header.php"; ?>

    <div class="container mt-4">
    <h1 class="mb-4 text-center">Danh sách tin tức</h1>

    <?php if (empty($tinTucs)): ?>
        <div class="alert alert-warning text-center">
            Không có tin tức nào để hiển thị.
        </div>
    <?php else: ?>
        <div class="row">
            <?php foreach ($tinTucs as $tinTuc): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="?act=chi-tiet-tin-tuc&id=<?= $tinTuc['id'] ?>">
                            <img class="card-img-top" src="<?= BASE_URL . 'uploads/' . $tinTuc['hinh_anh'] ?>" alt="Hình ảnh tin tức">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <a href="?act=chi-tiet-tin-tuc&id=<?= $tinTuc['id'] ?>" class="text-dark"><?= htmlspecialchars($tinTuc['tieu_de']) ?></a>
                            </h5>
                            <p class="card-text text-truncate"><?= nl2br(htmlspecialchars(substr($tinTuc['noi_dung'], 0, 100))) ?>...</p>
                            <a href="?act=chi-tiet-tin-tuc&id=<?= $tinTuc['id'] ?>" class="btn btn-primary mt-2">Xem thêm</a>
                        </div>
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
