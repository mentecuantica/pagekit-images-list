<?php
/**
 * Apperead that config option is enought to store selected images
 * also it's almost autosaveable in admin via VUE.js
 *
 * So - no tables for this plugin, and no ORM usages
 *
 * Left for example
 */


return [

    /*
     * Installation hook.
     */
    'install' => function ($app) {

        $util = $app['db']->getUtility();

      /*  if ($util->tableExists('@karas_images') === false) {
            $util->createTable('@karas_images', function ($table) {
                $table->addColumn('id', 'integer', ['unsigned' => true, 'length' => 10, 'autoincrement' => true]);
                $table->addColumn('name', 'string', ['length' => 255, 'default' => '']);
                $table->setPrimaryKey(['id']);
            });
        }*/

    },

    /*
     * Enable hook
     *
     */
    'enable' => function ($app) {

    },

    /*
     * Uninstall hook
     *
     */
    'uninstall' => function ($app) {

        // remove the config
        $app['config']->remove('images');

        $util = $app['db']->getUtility();
/*
        if ($util->tableExists('@karas_images')) {
            $util->dropTable('@karas_images');
        }*/

    },

    /*
     * Runs all updates that are newer than the current version.
     *
     */
    'updates' => [

        '0.5.0' => function ($app) {

        },

        '0.9.0' => function ($app) {

        },

    ],

];