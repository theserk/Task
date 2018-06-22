<?php

namespace AppBundle;

class MySQL
{
    protected $conn;

    public function __construct()
    {
        $this->conn = null;
        $this->conn = mysqli_connect("localhost", "root", "", "task");
        if (!$this->conn)
            die("Error: " . mysqli_connect_error());
    }

    public function runQuery($sql)
    {
        if(!$this->conn)
            die("Error");
        return mysqli_query($this->conn, $sql);
    }
}
