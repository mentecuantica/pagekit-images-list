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

?>
<script>
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
            directionNav: true,
            animationLoop: false,
            slideShow: true,
            itemWidth: 150,
            minItems: 6,
            maxItems: 6,
            slideshowSpeed: 2000,
            animationSpeed: 1000,
            itemMargin: 5,
            // asNavFor: '#portfolio_slider'
        });

        $('ul.slides').magnificPopup({type: 'image',
            delegate:'a'});
    });

</script>
<section id="gallery-cached" class="slider">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-box">
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
    </div>
</section>
