<?php
$username = "root";
$password = "";
$host = "localhost:3307";
$database = "dbpos";
$db_link = mysqli_connect($host, $username, $password, $database) or die("ERROR" . mysqli_error($db_link));
if (mysqli_connect_error()) {
    echo "Could not connect to MySql. Please try again";
    exit();
}

class DBController
{
    private $username = "root";
    private $password = "";
    private $host = "localhost:3307";
    private $database = "dbpos";
    private $conn;
    function __construct()
    {
        $this->conn = $this->connectDB();
    }

    function connectDB()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        return $conn;
    }
    function runQuery($query)
    {
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset))
            return $resultset;
    }

    function numRows($query)
    {
        $result  = mysqli_query($this->conn, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}