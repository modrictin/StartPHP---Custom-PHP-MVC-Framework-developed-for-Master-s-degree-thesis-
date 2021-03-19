<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 3/15/2021
 */

namespace app\core\db;


class Database
{
    public \PDO $pdo;

    public function __construct(array $config)
    {
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
        $appliedMigrations = [];
        $this->createMigrationsTable();
        $alreadyAppliedMigrations = $this->getApplietMigrations();

        $files = scandir(Application::$ROOT_DIR . '/migrations');

        $migrationsToApply = array_diff($files, $alreadyAppliedMigrations);
        foreach ($migrationsToApply as $migration) {
            if ($migration !== '.' && $migration !== '..') {
                require_once Application::$ROOT_DIR . '/migrations/' . $migration;
                $className = pathinfo($migration, PATHINFO_FILENAME);
                $object = new $className();
                $this->log('Trying to apply migration: ' . $migration);
                $object->up();
                $this->log('Migration successfully applied: ' . $migration);
                $appliedMigrations[] = $migration;
            }
        }
        if (!empty($appliedMigrations)) {
            $this->saveMigrations($appliedMigrations);
        } else {
            $this->log('All migrations already applied');
        }
        exit;
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
                                    id INT AUTO_INCREMENT PRIMARY KEY,
                                    migration VARCHAR(255),
                                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
                                    )ENGINE = INNODB;");
    }

    private function getApplietMigrations()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    private function saveMigrations(array $migrations)
    {
        $imploded = implode(',', array_map(fn($m) => "('$m')", $migrations));
        $stmt = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES " . $imploded);
        $stmt->execute();
    }

    protected function log($message)
    {
        echo '[' . date('Y-m-d H:i:s') . ']' . $message . PHP_EOL;
    }

    public function prepare($sql)
    {

        return $this->pdo->prepare($sql);

    }

}