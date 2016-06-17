<?php

namespace Karas\Images;

use Pagekit\Application as App;
use Pagekit\Module\Module;
/**
 * Class ImagesModule
 * @package Karas\Images
 */
class ImagesModule extends Module
{

    protected $images;

    /**
     * {@inheritdoc}
     */
    public function main(App $app)
    {

        $this->images = ['porno.jpeg','porno1.jpeg'];

        /**
         * Add smth to all pages ???
         */
        $app->extend('view', function ($view) {
            return $view->addGlobal('images', $this);
        });

    }

    /**
     * @return bool|string
     */
    public function getCachepath () {
        $folder = App::path() .'/'.App::module('images')->config('cache_path');
        if (file_exists($folder) && is_writable($folder)) { //all fine, quick return
            return $folder;
        }
        //try to create user-folder
        App::file()->makeDir($folder, 0755);
        if (!file_exists($folder)) {
            //create default folder
            $folder = $this->app['path.cache'] . '/portfolio';
            if (!file_exists($folder)) {
                App::file()->makeDir($folder, 0755);
            }
        }
        if (!file_exists($folder) || !is_writable($folder)) { //give up
            return false;
        }
        return $folder;
    }







    /**
     * @param $folder
     *
     * @return array
     */
    public static function getImagesFromFolder($folder)
    {
        $images = [];
        $c = new ImageHelper(app());
        $thumbSizes = App::module('images')->config('sizes');

        $folder = trim($folder, '/');
        $pttrn = '/\.(jpg|jpeg|gif|png)$/i';
        $dir = App::path();

        if (!$files = glob($dir . '/' . $folder . '/*')) {
            return [];
        }

        foreach ($files as $img) {

            // extension filter
            if (!preg_match($pttrn, $img)) {
                continue;
            }

            $filename = basename($img);
            $data = [];

            $data['filename'] = $filename;
            $data['crc'] = crc32($filename);
            $data['src'] = $folder . '/' . basename($img);

            // remove extension
            $data['title'] = preg_replace('/\.[^.]+$/', '', $data['filename']);

            // remove leading number
            $data['title'] = preg_replace('/^\d+\s?+/', '', $data['title']);

            // remove trailing numbers
            $data['title'] = preg_replace('/\s?+\d+$/', '', $data['title']);

            // replace underscores with space and add capital
            $data['title'] = ucfirst(trim(str_replace('_', ' ', $data['title'])));
            $data['checked'] = false;
            $data['url_cached']= $c->url($data, $thumbSizes );

            $images[] = $data;
        }

        return $images;
    }
}
