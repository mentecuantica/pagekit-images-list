<?php
use Karas\Images\ImageHelper;
use Pagekit\Application as App;

/**
 * Simplest widget config
 */

return [

    'name' => 'widget-simpleimages',

    'label'  => 'Картинки для галереи',
    'events' => [

        'view.styles' => function ($event, $styles) use ($app) {
            $app->view()->style('widget-simpleimages12', 'images:assets/css/flexslider.css');
            $app->view()->style('widget-simpleimages22', 'images:assets/css/magnific-popup.css');
        },
        'view.scripts' => function ($event, $scripts) use ($app) {

            $app->view()->script('widget-simpleimages', 'images:js/jquery.flexslider-min.js', ['jquery']);
            $app->view()->script('widget-simpleimages1', 'images:js/jquery.magnific-popup.min.js', ['jquery']);
  
        }

    ],
    'render' => function ($widget) use ($app) {

        $config = App::module('images')->config();

        $gallery = [];
        if (isset($config['gallery'])) {
            $gallery = $config['gallery'];
        }

        return $app->view()->render('images:views/widget-simpleimages.php', [
            'widget' => $widget,
            'sizes'  => $config['sizes'],
            'images' => $gallery
        ]);

    }

];
