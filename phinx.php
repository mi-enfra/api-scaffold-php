<?php
try {
    $env = \Dotenv\Dotenv::create(__DIR__ . '/private/');
    $env->load();
    $env->required([
        'ENVIRONMENT',
    ]);
} catch (\Exception $e) {
    error_log($e);
    exit();
}

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/database/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/database/seeds'
    ],
    'environments' => [
        'default_migration_table' => '_phinx_logs',
        'default_database' => 'local',
        'local' => [
            'adapter' => 'mysql',
            'host' => $_ENV['DB_HOST'],
            'name' => $_ENV['DB_BASE'],
            'user' => $_ENV['DB_USER'],
            'pass' => $_ENV['DB_PASS'],
            'port' => '3306',
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
