<?php 

class envloader
{
    public function __construct()
    {
        require_once __DIR__ . '../../vendor/autoload.php';
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '../../');
        $dotenv->load();
    }
}

