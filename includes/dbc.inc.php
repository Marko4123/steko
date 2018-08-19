<?php
class Dbc {
    private $servername;
    private $username;
    private $password;
    private $dbname;

    protected function connect() {
        $this->servername = "localhost";
        $this->username = "stekobgk_marko";
        $this->password = "cicambas90";
        $this->dbname = "stekobgk_steko-new";

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $conn->set_charset("utf8");
        return $conn;
    }
}
?>