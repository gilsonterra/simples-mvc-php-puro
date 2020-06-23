<?php

namespace Model;

abstract class AbstractModel
{
    private static $connection;

    private static function getConnection()
    {
        if (!isset(self::$connection)) {
            $connection = getenv('DB_CONNECTION', 'mysql');
            $user = getenv('DB_USERNAME', 'teste');
            $password = getenv('DB_PASSWORD', 'teste');
            $host = getenv('DB_HOST', 'localhost');
            $dbname = getenv('DB_DATABASE', 'localhost');
            $dsn = sprintf('%s:host=%s;dbname=%', $connection, $host, $dbname);

            self::$connection = new \PDO($dsn, $user, $password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$connection->setAttribute(\PDO::ATTR_CASE, \PDO::CASE_LOWER);
            self::$connection->query(sprintf("use %s", $dbname));
        }

        return self::$connection;
    }

    protected function get($sql, $params = array())
    {
        $stmt = self::getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    protected function fetch($sql, $params = array())
    {
        $stmt = self::getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    protected function save($sql, $params = array())
    {
        try {
            $stmt = self::getConnection()->prepare($sql);

            $data = array();
            foreach ($params as $key => $value) {
                $data[':' . $key] = $value;
            }
            
            $stmt->execute($data);
            return array(
                'rows' => $stmt->rowCount(),
                'success' => true,
                'message' => 'executado com successo!'
            );
        } catch (\Exception $e) {
            return array(
                'rows' => 0,
                'success' => false,
                'message' => $e->getMessage()
            );
        }
    }
}
