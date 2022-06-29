<?php

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/app/src/Migrations',
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_environment' => 'production',
        'production' => [
            'adapter' => 'mysql',
            'host' => 'db',
            'name' => 'dbname',
            'user' => 'dbuser',
            'pass' => 'dbpwd',
            'port' => 3306,
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
