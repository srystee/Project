<?php
if (!isset($_SESSION)) {
    session_start();
}

class students
{

    private $db;
    private $tblName = 'studentdetails';
    private $viewName = 'view_studentsdetails';

    public function __construct()
    {
        $this->db = Database::instantiate();
    }

    public function selectData($id = null)
    {
        $id = (int)$id;

        if (empty($id)) {
            return $this->db->select($this->viewName);
        } else {
            $test = $this->db->selectData($this->tblName, '*', ' id =? ', array($id));
            if (count($test)) {
                return $test[0];
            } else {
                return false;
            }
        }
    }

    public function insert()
    {
        $id = mt_rand(101, 9999999);
        $regd = mt_rand(101, 99999);
        $symbol = mt_rand(101, 99999);
        $data = array(
            'id' => $id,
            'name' => ucwords($_POST['txtname']),
            'address' => ucwords($_POST['txtadd']),
            'contact' => ($_POST['txtcontact']),
            'email' => ($_POST['txtemail']),
            'collegeid' => ($_POST['txtcollege']),
            'facultyid' => ($_POST['txtfaculty']),
            'batch' => ($_POST['txtbatch']),
            'regd_number' => $regd,
            'symbol_number' => $symbol,
            'date' => date('Y-m-d'),

        );
        $response = $this->db->insert($this->tblName, $data);
        if ($response) {
            $_SESSION['msg'] = "Student Details Successfully Recorded...";
            header('location:students.php');
        } else {
            $_SESSION['err'] = "Failed to record..";
            header('location:students.php');
        }
    }

    public function update()
    {
        $id = (int)$_GET['sid'];
        $data = array(
            'name' => ucwords($_POST['txtname']),
        );
        $response = $this->db->update($this->tblName, $data, array($id));
        if ($response) {
            $_SESSION['msg'] = "Student Details Successfully Updated...";
            header('location:students.php');
        } else {
            $_SESSION['err'] = "Failed to Updated..";
            header('location:students.php');
        }
    }


    public function delete()
    {
        $id = (int)$_GET['sid'];

        $response = $this->db->delete($this->tblName, 'id =?', array($id));
        if ($response) {
            $_SESSION['msg'] = "Student Details Successfully Deleted...";
            header('location:students.php');
        } else {
            $_SESSION['msg'] = "Failed to Delete...";
            header('location:students.php');
        }
    }

}