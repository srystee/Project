<?php

class Database
{

    private $con;
    private static $instance = null;

    private function __construct()
    {
        $this->openConnection();
    }

    public function openConnection()
    {
        try {
            $this->con = new PDO('mysql:host=127.0.0.1; dbname=sms_notification', 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function instantiate()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function insert($tableName = "", $data = array())
    {
        $sql = "INSERT INTO " . $tableName . ' (';
        $sql .= implode(',', array_keys($data)) . ') VALUES ( ?';
        for ($i = 1; $i < count($data); $i++) {
            $sql .= ", ?";
        }
        $sql .= ")";
        $stmt = $this->con->prepare($sql);      // build query;
        try {
            $stmt->execute(array_values($data));
            return $this->con->lastInsertId();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function update($tableName, $data = array(), $bind = array())
    {
        $columns = array_keys($data);       // to retrieve the column name
        $arrayValues = array_values($data); // to retrive the values

        $sql = "update  " . $tableName . ' set  ';
        $sql .= implode('=?, ', $columns);
        $sql .= "=?  where id = ?";
        $stmt = $this->con->prepare($sql);      // build query;
        try {
            $stmt->execute(array_merge($arrayValues, $bind));
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function delete($table, $criteria = "", array $bind = array())
    {
        $sql = "DELETE FROM " . $table . ' WHERE ' . $criteria;
        $stmt = $this->con->prepare($sql);
        try {
            $stmt->execute($bind);
            return true;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function select($tableName = "", $columName = "*", $criteria = "", $bind = array())
    {
        $query = "select " . $columName . " from " . $tableName . "  order by date desc ";

        if (!empty($criteria)) {
            //id =? AND email = ?
            $query .= " WHERE " . $criteria;
        }
        $stmt = $this->con->prepare($query);
        $stmt->execute($bind);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    public function selectData($tableName = "", $columName = "*", $criteria = "", $bind = array())
    {
        $query = "select " . $columName . " from " . $tableName;
        if (!empty($criteria)) {
            $query .= " WHERE " . $criteria;
        }
//        echo $query;
//        die;

        $stmt = $this->con->prepare($query);
        $stmt->execute($bind);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    public function countProject($tableName)
    {
        $query = "select count(*) from " . $tableName;
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $number_of_rows = $stmt->fetchColumn();
        return $number_of_rows;
    }

    public function countStatus($tableName = "", $status = "")
    {
        $query = "select count(*) from " . $tableName . " where  status=?  ";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, $status);
        $stmt->execute();
        $number_of_rows = $stmt->fetchColumn();
        return $number_of_rows;
    }


    public function totalCost($tableName = "", $columName = "*")
    {
        $query = "select sum(" . $columName . ") as amount from " . $tableName . " where status='Pending' or status='Working' or status='Completed'";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    public function monthlyReport($tableName = "", $columName = "*")
    {
        $query = "select sum(" . $columName . ") as amount from " . $tableName . " where  MONTH(DATE)= " . date('m') . " AND  status='Pending' or MONTH(DATE)= " . date('m') . " AND status='Working' or MONTH(DATE)= " . date('m') . " AND status='Completed'";

        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    public function monthlyCollection($tableName = "", $columName = "*")
    {
        $query = "select sum(" . $columName . ") as amount from " . $tableName . " where  MONTH(DATE)= " . date('m');
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    public function netCollection($tableName = "", $columName = "*")
    {
        $query = "select sum(" . $columName . ") as amount from " . $tableName;

        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    public function adminLogin($tableName = "", $username = "", $password = "")
    {
        $query = "select * from " . $tableName . " where  username=? and password=? ";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $password);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }


    public function updatePwd($tableName, $data = array(), $bind = array())
    {
        $columns = array_keys($data);       // to retrieve the column name
        $arrayValues = array_values($data); // to retrive the values

        $sql = "update  " . $tableName . ' set  ';
        $sql .= implode('=?, ', $columns);
        $sql .= "=?  where username = ?";

        $stmt = $this->con->prepare($sql);      // build query;
        try {
            $stmt->execute(array_merge($arrayValues, $bind));
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}

$db = Database::instantiate();
