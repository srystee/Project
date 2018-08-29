<?php
if (!isset($_SESSION)) {
    session_start();
}

class faculty
{

    private $db;
    private $tblName = 'faculty';

    public function __construct()
    {
        $this->db = Database::instantiate();
    }

    public function selectData($id = null)
    {
        $id = (int)$id;

        if (empty($id)) {
            return $this->db->select($this->tblName);
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
            'name' => strtoupper($_POST['txtname']),
        );

        $response = $this->db->insert($this->tblName, $data);
        if ($response) {
            $_SESSION['msg'] = "Faculty Successfully Recorded...";
            header('location:faculty.php');
        } else {
            $_SESSION['err'] = "Failed to record..";
            header('location:faculty.php');
        }
    }

    public function update()
    {
        $id = (int)$_GET['fid'];
        $data = array(
            'name' => strtoupper($_POST['txtname']),
        );
        $response = $this->db->update($this->tblName, $data, array($id));
        if ($response) {
            $_SESSION['msg'] = "Faculty Details Successfully Updated...";
            header('location:faculty.php');
        } else {
            $_SESSION['err'] = "Failed to Updated..";
            header('location:faculty.php');
        }
    }


    public function delete()
    {
        $id = (int)$_GET['fid'];

        $response = $this->db->delete($this->tblName, 'id =?', array($id));
        if ($response) {
            $_SESSION['msg'] = "Faculty Details Successfully Deleted...";
            header('location:faculty.php');
        } else {
            $_SESSION['msg'] = "Failed to Delete...";
            header('location:faculty.php');
        }
    }

}