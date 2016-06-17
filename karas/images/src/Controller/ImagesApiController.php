<?php
/**
 * Author: Yuri Efimov
 * User: octopus
 * Date: 5/16/2016
 * Time: 5:02 AM
 * Filename: ImagesApiController.php
 */

namespace Karas\Images\Controller;
use Karas\Images\ImagesModule;
use Pagekit\Application as App;

/**
 * @Access("images: manage images")
 */
class ImagesApiController {
    

    /**
     * @Route("/", methods="GET")
     */
    public function indexAction($folder = '')
    {
        return ImagesModule::getImagesFromFolder($folder);
    }


    /**
     * @Route("/cleanConfigGallery", methods="POST")
     */
    public function cleanConfigGalleryAction()
    {
        $module = App::module('images');
        $config = $module->config();

        App::config('images')->set('gallery',[]);


        return ['message' => 'success','currentConfig'=>App::config('images')];
    }
}