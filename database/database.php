<?php
require_once("config.php");

class Database {
    private $connection;

    /**
     * Get the value of connection
     */ 
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Set the value of connection
     *
     * @return  self
     */ 
    public function setConnection($connection)
    {
        $this->connection = $connection;

        return $this;
    }

    function __construct() {
        $this->openDbConnection();
    }

    public function openDbConnection() {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if($this->connection->connect_errno) {
            die("Database connection failed badly! " . $this->connection->connect_error);
        }

        return $this->connection;
    }

    public function query($sql) {
        $result = $this->connection->query($sql);

        $this->confirmQuery($result);

        return $result;
    }

    // Confirm query
    private function confirmQuery($result) {
        if(!$result) {
            die("Query Failed! " . $this->connection->error);
        }
    }

    // Escape string
    public function escapeString($string) {
        return $this->connection->real_escape_string($string);
    }

    // Insert id
    public function theInsertId() {
        return $this->connection->insert_id;
    }

}

$database = new Database();
?>