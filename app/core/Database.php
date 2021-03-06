<?php

class Database
{
    private $host = DB_HOST;
    private $port = DB_PORT;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $name = DB_NAME;

    private $db;
    private $stmt;

    public function __construct()
    {
        // Data Source Name
        $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->name;

        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            $this->db = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    public function query($sql)
    {
        $this->stmt = $this->db->prepare($sql);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}
