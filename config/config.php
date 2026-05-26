<?php

$config = [
    'db_host' => 'localhost',
    'db_name' => 'cotton_industry',
    'db_user' => 'root',
    'db_password' => '',
    'jwt_secret' => 'your-super-secret-jwt-key-change-in-production',
    'base_url' => 'http://localhost/web_application/',
    'upload_path' => __DIR__ . '/../public/uploads/products/',
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => 587,
    'smtp_user' => 'your-email@gmail.com',
    'smtp_password' => 'your-app-password',
    'from_email' => 'noreply@cotton.com',
    'admin_email' => 'admin@cotton.com',
];

return $config;
