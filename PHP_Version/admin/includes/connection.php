<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$host = '127.0.0.1';
$db   = 'm_soft20181_n0813926';
$user = 'n0813926';
$pass = '6tdboidF';
$charset = 'utf8mb4';

$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db";
try {
     $connection = new \PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>