<?php

require_once(__DIR__ . '/env.php');

// Database connection requirements
$mariadb_dsn = getenv('DB_DSN') . 'dbname=' . getenv('DB_NAME');

return [
    'class' => 'yii\db\Connection',
    'dsn' => $mariadb_dsn,
    'username'  => getenv('DB_USERNAME'),
    'password'  => getenv('DB_PASSWORD'),
    'charset'   => getenv('DB_CHARSET'),

    // Enable schema cache? True or False
    'enableSchemaCache' => getenv('DB_SCHEMA_ENABLE_CACHE'),

    // Duration of schema cache (if enabled)
    'schemaCacheDuration' => getenv('DB_SCHEMA_CACHE_DURATION'),

    // Cache component used to store schema information
    'schemaCache' => getenv('DB_SCHEMA_CACHE_NAME')
];
