<?php
namespace Composer\Bin\data;
use mysqli;

/**
 * Database class for storing information about a database
 */
class Database
{

    public const HOST_NAME = "localhost";

    public const USERNAME = "haiztek";

    public const PASSWORD = "";

    public const DB_NAME = "baby_product";

    public const DB_TABLE_NAME = "costumer";

    // variables for connection and getting sql value
    public $conn = "";

    public $sql = "";

    // variables for the table values (in order)
    public $FIRSTNAME = "";

    public $MI = "";

    public $LASTNAME = "";

    public $SEX = "";

    public $BIRTHDATE = "";

    public $EMAIL = "";

    public $PASSWORD = "";

    public $CONTACT_NUMBER = "";

    public $ADDRESS = "";

    public $CITY = "";

    public $ZIP = "";

    public function __construct() { /** TODO: EMPTY */}

    public function set($FIRSTNAME, $MI, $LASTNAME, $SEX, $BIRTHDATE, $EMAIL, $PASSWORD, $CONTACT_NUMBER, $ADDRESS, $CITY, $ZIP)
    {
        $this->FIRSTNAME = $FIRSTNAME;
        $this->MI = $MI;
        $this->LASTNAME = $LASTNAME;
        $this->SEX = $SEX;
        $this->BIRTHDATE = $BIRTHDATE;
        $this->EMAIL = $EMAIL;
        $this->PASSWORD = $PASSWORD;
        $this->CONTACT_NUMBER = $CONTACT_NUMBER;
        $this->ADDRESS = $ADDRESS;
        $this->CITY = $CITY;
        $this->ZIP = $ZIP;
    }

    public function connect()
    {
        $this->conn = new mysqli(Database::HOST_NAME, Database::USERNAME, Database::PASSWORD, Database::DB_NAME) or
        die("Connect failed: %s\n". $this->conn->error);
    }

    public function insert()
    {
        $this->sql = "INSERT INTO Database::DB_TABE_NAME 
            (`FIRSTNAME`, `MI`, `LASTNAME`, `BIRTHDATE`, `SEX`, `EMAIL`, `PASSWORD`, `CONTACT_NUMBER`, `ADDRESS`, `CITY`, `ZIP`) 
            VALUES ($this->FIRSTNAME, $this->MI, $this->LASTNAME, $this->SEX, $this->BIRTHDATE, $this->EMAIL, $this->PASSWORD, $this->CONTACT_NUMBER, $this->ADDRESS, $this->CITY, $this->ZIP)
        ";
    }

    public function print()
    {
        /** This is for debugging purposes only */
        echo "<div class='col-12'>
            YOUR INPUT: <br/>
            $this->FIRSTNAME <br/>
            $this->LASTNAME <br/>
            $this->EMAIL
        </div>";
    }
}
