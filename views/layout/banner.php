<?php
$Banners = (new BannerController())->index();

?>
       
       
       <section class="slider-area">
        <?php foreach ($Banners as $banner): ?>
            <div class="hero-slider-active slick-arrow-style ">
                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="<?= $banner['hinh_anh']; ?>">
                       
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- single slider item start -->

               
        </section>