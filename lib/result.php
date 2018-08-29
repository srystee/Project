<?php
if (!isset($_SESSION)) {
    session_start();
}

class result
{

    private $db;
    private $tblName = 'results';
    private $viewName = 'view_resultdetails';

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
        $data = array(
            'date' => date('Y-m-d'),
            'facultyid' => ($_POST['txtfaculty']),
            'semester' => ($_POST['txtsem']),
        );

        $response = $this->db->insert($this->tblName, $data);
        if ($response) {
            $_SESSION['msg'] = "Result Notice Successfully Recorded...";
            header('location:result.php');
        } else {
            $_SESSION['err'] = "Failed to record..";
            header('location:result.php');
        }
    }

    public function delete()
    {
        $id = (int)$_GET['rid'];

        $response = $this->db->delete($this->tblName, 'id =?', array($id));
        if ($response) {
            $_SESSION['msg'] = "Result Notice Successfully Deleted...";
            header('location:result.php');
        } else {
            $_SESSION['msg'] = "Failed to Delete...";
            header('location:result.php');
        }
    }

}