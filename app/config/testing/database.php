<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 12/24/2014
 * Time: 4:11 PM
 */

return array(
    'default' => 'sqlite',
    'connections' => array(
        'sqlite' => array(
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => ''
        ),
    )
);