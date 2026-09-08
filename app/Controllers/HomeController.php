<?php
declare(strict_types=1);

final class HomeController
{
    public function index(string $projectRoot): void
    {
        $phpVersion = PHP_VERSION;
        $dbStatus = $this->databaseStatus($projectRoot . '/config/db.php');
        require $projectRoot . '/views/home.php';
    }

    private function databaseStatus(string $configFile): string
    {
        if (!is_file($configFile)) {
            return 'Не подключена (требуется настройка config/db.php)';
        }

        try {
            $config = require $configFile;
            if (!is_array($config)) {
                throw new RuntimeException('Database configuration must return an array.');
            }

            foreach (['host', 'dbname', 'user', 'password', 'charset'] as $key) {
                if (!isset($config[$key]) || !is_string($config[$key])) {
                    throw new RuntimeException('Invalid database configuration field: ' . $key);
                }
            }

            $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s',
                $config['host'], $config['dbname'], $config['charset']);
            new PDO($dsn, $config['user'], $config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_TIMEOUT => 5,
            ]);

            return 'Успешное подключение к MySQL (PDO)!';
        } catch (Throwable $exception) {
            // Do not expose connection details or credentials to visitors.
            error_log('Database readiness check failed: ' . get_class($exception));
            return 'База данных недоступна. Проверьте config/db.php и доступность MySQL.';
        }
    }
}
