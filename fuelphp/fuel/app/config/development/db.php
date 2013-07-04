<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
//		'connection'  => array(
//            'dsn'        => 'mysql:host=localhost;dbname=fuel_dev',
//            'username'   => 'root',
//            'password'   => 'root',
//            'password'   => 'root',
//    ),

        'type'       => 'mysqli',
        'connection' => array(
            'hostname'   => 'localhost',
            'port'       => '',
            'database'   => 'jenkins',
            'username'   => '自分のユーザー',
            'password'   => '自分のユーザーのパスワード',
            'persistent' => false,
            'compress'   => false,
        ),
        'charset'    => 'utf8',
        'profiling'  => true,
	),
);
