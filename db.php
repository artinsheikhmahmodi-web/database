<?php

class db{

    public $connection_database ;
    public function __construct()
    {
        $server = "localhost";
        $username_db = "artinwe2_user_schooldb";
        $password_db = "XW822xBu2sQi2hJw";
        $db_name = "artinwe2_school_db";

        $this->connection_database = 
        new mysqli($server,$username_db,$password_db,$db_name);

        $this->connection_database->set_charset("utf8mb4");


    }
}

?>