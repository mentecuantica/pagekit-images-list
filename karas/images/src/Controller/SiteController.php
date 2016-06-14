<?php
/**
 * Author: Yuri Efimov
 * User: octopus
 * Date: 5/16/2016
 * Time: 6:48 AM
 * Filename: SiteController.php
 */

namespace Karas\Images\Controller;
use Pagekit\Application as App;
use Pagekit\Module\Module;
use Karas\Images\Model\Item;
/**
 * Class SiteController
 * @package Karas\Images\Controller
 */
class SiteController
{
    /**
     * @var Module
     */
    protected $portfolio;

    /**
     * Constructor.
     */
    public function __construct()
    {
      //  $this->portfolio = App::module('bixie/portfolio');
    }

    /**
     * @Route("/")
     */
    public function indexAction()
    {
        if (!App::node()->hasAccess(App::user())) {
            App::abort(403, __('Insufficient User Rights.'));
        }

        $images = Item::findAll();
        return [
            '$view' => [
                'title' =>  App::node()->title,
                'name' => 'karas/images/custom-images.php'
            ],
            'images' => $images,
           // 'config' => $this->portfolio->config(),
            'node' => App::node()
        ];
    }


}
