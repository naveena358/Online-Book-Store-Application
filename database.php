<?php
if(!isset($_SESSION))
{
    session_start();
}

class DatabaseConfig {

#   DB connection settings

    private $sDatabaseURL = "localhost";
    private $sDatabaseUserName = "db";
    private $sDatabasePassword = "db";
    private $sDatabaseName = "bookstore";

    function get_sDatabaseURL(){
      return $this->sDatabaseURL;
    }
    function get_sDatabaseUserName(){
      return $this->sDatabaseUserName;
    }
    function get_sDatabasePassword(){
      return $this->sDatabasePassword;
    }
    function get_sDatabaseName(){
      return $this->sDatabaseName;
    }

    function get_db(){
      $dbObj = new mysqli($this->get_sDatabaseURL(),$this->get_sDatabaseUserName(),$this->get_sDatabasePassword(),$this->get_sDatabaseName());
      return $dbObj;
    }
}

function getDBConnection(){
  $dbConf = new DatabaseConfig();
  $dbConn = $dbConf->get_db();
  return $dbConn;

}

//echo getDBConnection();


?>
