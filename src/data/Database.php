<?php
namespace Server\data;

use mysqli;
use mysqli_result;
use mysqli_stmt;

/**
 * Database class for storing information about a database and modifying it.
 */
class Database
{
    // database information
    public const HOST_NAME = "localhost";

    public const USERNAME = "haiztek";

    public const PASSWORD = "";

    public const DB_NAME = "baby_product";

    // variables for connection and getting sql value
    public mysqli $conn;

    public mysqli_stmt $sql;

    // variables for the table values (in order)
    public string $FIRSTNAME = "";

    public string $MI = "";

    public string $LASTNAME = "";

    public string $BIRTHDATE = "";
    
    public string $SEX = "";

    public string $EMAIL = "";

    public string $PASSWORD = "";

    public string $CONTACT_NUMBER = "";

    public string $ADDRESS = "";

    public string $CITY = "";

    public string $ZIP = "";

    public function set($FIRSTNAME, $MI, $LASTNAME, $SEX, $BIRTHDATE, $EMAIL, $PASSWORD, $CONTACT_NUMBER, $ADDRESS, $CITY, $ZIP): void
    {
        $this->FIRSTNAME = $FIRSTNAME;
        $this->MI = $MI;
        $this->LASTNAME = $LASTNAME;
        $this->BIRTHDATE = $BIRTHDATE;
        $this->SEX = $SEX;
        $this->EMAIL = $EMAIL;
        $this->PASSWORD = $PASSWORD;
        $this->CONTACT_NUMBER = $CONTACT_NUMBER;
        $this->ADDRESS = $ADDRESS;
        $this->CITY = $CITY;
        $this->ZIP = $ZIP;
    }

    public function connect(): void
    {
        $this->conn = new mysqli(Database::HOST_NAME, Database::USERNAME, Database::PASSWORD, Database::DB_NAME) or
        die("Connect failed: %s\n". $this->conn->error);
    }

    public function prepareInsert(): void
    {
        $this->sql = $this->conn->prepare("INSERT INTO costumer
            (FIRSTNAME, MI, LASTNAME, BIRTHDATE, SEX, EMAIL, PASSWORD, CONTACT_NUMBER, ADDRESS, CITY, ZIP)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $this->sql->bind_param(
            'ssssssssssss',
            $this->FIRSTNAME,
            $this->MI,
            $this->LASTNAME,
            $this->BIRTHDATE,
            $this->SEX,
            $this->EMAIL,
            $this->PASSWORD,
            $this->CONTACT_NUMBER,
            $this->ADDRESS,
            $this->CITY,
            $this->ZIP
        );
    }

    /**
     * Gets all the data in database
     * @return bool|mysqli_result An array of all the data in database
     */
    public function getAllData(): mysqli_result|bool
    {
        return $this->conn->query("SELECT * FROM costumer");
    }

    /** Gets the data in array in database by finding the email
     * @param string $value The value to compare
     * @return bool|mysqli_result data results
     */
    public function getData(string $value): bool|mysqli_result
    {
        $stmt = $this->conn->prepare("SELECT * FROM costumer WHERE EMAIL = ?");
        $stmt->bind_param("s", $value);
        $stmt->execute();

        return $stmt->get_result();
    }
}
