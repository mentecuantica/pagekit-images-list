<?php
/**
 * Author: Yuri Efimov
 * User: octopus
 * Date: 5/16/2016
 * Time: 5:00 AM
 * Filename: ItemsController.php
 */

namespace Karas\Images\Controller;
use Karas\Images\ImagesModule;
use Pagekit\Application as App;
/**
 * Class ItemsController
 * @package Karas\Controller
 */

/**
 * @Access(admin=true)
 */
class AdminImagesController {

    public function indexAction($id = 0)
    {
        return [
            '$view' => [
                'title' => __('Images'),
                'name'  => 'images:views/admin/index.php'
            ],
            '$data' => [
                'config' => App::module('images')->config()
            ]
        ];
    }


    public function adminAction($id = 0)
    {

        $config = App::module('images')->config();

        $imagesFolder = $config['folder'];

        $images = ImagesModule::getImagesFromFolder($imagesFolder);


        
        if (isset($config['gallery'])) {
            $gallery = $config['gallery'];

            foreach ($gallery as $checkedImage) {
                foreach ($images as $key=>$image) {
                    if ($image['crc']==$checkedImage['crc']) {
                        $images[$key]['checked'] = true;
                    }
                }

            }

           // $image1 = $images[0];
           // $gallery1 = $gallery[0];


        }

        return [
            '$view' => [
                'title' => __('Images'),
                'name'  => 'images:views/admin/admin.php'
            ],
            '$data' => [
                'config' => $config,
                'images' => $images,
            ]
        ];
    }

    public function settingsAction()
    {
        return [
            '$view' => [
                'title' => __('images Settings'),
                'name'  => 'images:views/admin/settings.php'
            ],
            '$data' => [
                'config' => App::module('images')->config()
            ]
        ];
    }
}