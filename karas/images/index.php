<?php
use Pagekit\Application as App;
use Karas\Images\ImageHelper;
//use Karas\Images\Event\RouteListener;

/*
 * This array is the module definition.
 * It's used by Pagekit to load your extension and register all things
 * that your extension provides (routes, menu items, php classes etc)
 */
return [

    'name'        => 'images',

    /*
    * Define the type of this module.
    * Has to be 'extension' here. Can be 'theme' for a theme.
    */
    'type'        => 'extension',

    /*
    * Main entry point. Called when your extension is both installed and activated.
    * Either assign an closure or a string that points to a PHP class.
    * Example: 'main' => 'Pagekit\\Hello\\HelloExtension'
     *  'main' => 'Bixie\\Breadcrumbs\\BreadcrumbsModule',
    */
  /*  'main'        => function (\Pagekit\Application $app) {

    },*/

    'main' => 'Karas\\Images\\ImagesModule',

    /*
    * Register all namespaces to be loaded.
    * Map from namespace to folder where the classes are located.
    * Remember to escape backslashes with a second backslash.
    */
    'autoload'    => [

        'Karas\\Images\\' => 'src'

    ],

    /*
   * Define nodes. A node is similar to a route with the difference
   * that it can be placed anywhere in the menu structure. The
   * resulting route is therefore determined on runtime.
   */
   /* 'nodes'       => [

        'images' => [
            // The name of the node route
            'name' => '@imagesFront',
            // Label to display in the backend

            'label' => 'images',
            // The controller for this node. Each controller action will be mounted

            'controller' => 'Karas\\Images\\Controller\\SiteController',

            // A unique node that cannot be deleted, resides in "Not Linked" by default
            'protected'  => TRUE,
            'frontpage'  => TRUE
        ]

    ],*/

    /**
     * @todo Specify backend controllers
     */
    'routes'      => [

       '/images'       => [
            'name'       => '@images',
            'controller' => 'Karas\\Images\\Controller\\AdminImagesController'
        ],

    /*    '/images/admin' => [
            'name'       => '@images/admin',
            'controller' => [
                'controller' => 'Karas\\Images\\Controller\\AdminImagesController'
            ]
        ],*/
        '/api/images'   => [
            'name'       => '@images/api',
            'controller' => 'Karas\\Images\\Controller\\ImagesApiController'
        ]

    ],

    /**
     * shortcuts
     */ /*
    'resources'   => [

        'karas/images:'      => '',
        'views:karas/images' => 'views'

    ],*/

    /*
 * Define permissions.
 * Will be listed in backend and can then be assigned to certain roles.
 */
    'permissions' => [

        // Unique name.
        // Convention: extension name and speaking name of this permission (spaces allowd)

        'images: manage images' => [
            'title' => 'Manage images'
        ]

    ],

    'menu'     => [

        'images' => [
            'label'    => 'Images',
            // Icon to display
            'icon'     => 'images:icon.svg',
            'url'      => '@images/settings',
            // Optional: Limit access to roles which have specific permission assigned
            'access'   => 'images: manage images',
            //  'active' => '@images/images*',
            'priority' => 20


            // Optional: Expression to check if menu item is active on current url
            // 'active' => '@hello*'

        ],
        'images: settings' => [

            // Parent menu item, makes this appear on 2nd level
            'parent' => 'images',

            // See above
            'label'  => 'Settings',
            'icon'   => 'images:icon.svg',
            'url'    => '@images/settings',
            'access' => 'system: manage settings'
        ],
        'images: panel'    => [

            // Parent menu item, makes this appear on 2nd level
            'parent' => 'images',

            // See above
            'label'  => 'Фотографии',
            'icon'   => 'hello:icon.svg',
            'url'    => '@images/admin'
            // 'access' => 'hello: manage hellos'
        ],

    ],

    /*
 * Link to a settings screen from the extensions listing.
 */
    'settings' => '@images/admin/settings',

    /**
     * Widgets and their configs
     */
    'widgets'  => [

        'widgets/simpleimages.php'

    ],

    /*
 * Default module configuration.
 * Can be overwritten by changed config during runtime.
 */
    'config' => [
        'folder'=>'/storage/image-set',
        'sizes'=>['height'=>150,'width'=>200],
        'createThumbs'=>true,
        'cache_path' => str_replace(App::path(), '', App::get('path.cache') . '/simpleimage'),
        'gallery'=>[],


    ],

    /**
     * Listen following events
     *
     */
    'events' => [

        'boot' => function ($event, \Pagekit\Application $app) {
           // $app->subscribe(new RouteListener);
            $app->extend('view', function ($view) use ($app) {
                return $view->addHelper(new ImageHelper($app));
            });

        },

        'package.enable' => function ($event, $package) use ($app) {
            /*if ($package->getType() === 'pagekit-theme') {
                $new = $app->config($package->get('module'));
                $old = $app->config($app['theme']->name);
                $assigned = [];


            }*/
        },
        'view.scripts' => function ($event, $scripts) {
          //  $scripts->register('hello-link', 'images:app/bundle/link.js', '~panel-link');
          //  $scripts->register('hello-dashboard', 'images:app/bundle/dashboard.js', '~dashboard');

        }
    ]

];
