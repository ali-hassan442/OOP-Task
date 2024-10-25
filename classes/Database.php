<?php

class Database {
    private $conn;
    private $host = "localhost";
    private $db_name = "online_shop";
    private $username = "root";
    private $password = "";

    public function getConnection() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

$db = new Database();
$conn = $db->getConnection();
echo "Connected successfully!";
$db->closeConnection();

?>
