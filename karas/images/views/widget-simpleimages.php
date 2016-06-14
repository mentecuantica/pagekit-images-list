<?php
/**
 * Date: 6/12/2016 12:27 AM
 * Filename: ${FILE_NAME}
 * @var $view \Pagekit\View\View;
 * @var $params array
 * @var $app \Pagekit\Application
 * @var $this \Pagekit\View\PhpEngine
 * @var $intl \Pagekit\Intl\IntlModule
 * @var $theme \Pagekit\Module\Module
 */

?><!--<section id="gallery">
        <?php /*foreach ($images as $image):*/ ?>
            <? /* if ($image['checked']==true): */ ?>
            <img src="/<? /*=$image['src']*/ ?>" alt="<? /*=$image['title']*/ ?>" width="150" />
                <? /* endif; */ ?>
        <?php /*endforeach; */ ?>

</section>-->
<script>
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
            directionNav: true,
            animationLoop: false,
            slideShow: true,
            itemWidth: 200,
            slideshowSpeed: 2000,
            animationSpeed: 1000,
            itemMargin: 15,
            // asNavFor: '#portfolio_slider'
        });
    });
    $(document).ready(function () {
        $('ul.slides').magnificPopup({
            type: 'image',
            delegate: 'a'
        });
    });
</script>
<section id="gallery-cached" class="slider">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carousel" class="flexslider">
                    <ul class="slides">
                        <?php foreach ($images as $image): ?>
                            <? if ($image['checked'] == TRUE): ?>
                                <li>
                                <a href="<?= $image['src'] ?>" class="zooma">
                                    <img src="<?= $view->image('url', [
                                        $image,
                                        $sizes
                                    ]) ?>" alt="<?= $image['title'] ?>"/>
                                </a>
                        </li>
                            <? endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
