<?php

namespace database;

class Sql {
    private static $instance;
    private $conn;

    private $host = 'localhost';
    private $user = 'root';
    private $database = 'laravel_1';
//    private $database = 'purchase_db';
    private $password = '';

    private function __construct() {
        $this->conn = new \mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function close() {
        $this->conn->close();
    }

    public function clone()
    {
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function select(string $sql, ?string $flag = null): array
    {
        $result = $this->conn->query($sql);
        $arr = [];
        if ($flag == 'one') {
            $arr = $result->fetch_assoc();
        } else {
            while ($row = $result->fetch_assoc())
            {
                $arr[] = $row;
            }
        }
        return $arr;
    }

    public function save(string $sql)
    {
        $this->conn->query($sql);
    }
}
